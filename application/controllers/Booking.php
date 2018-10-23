<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        // $this
        //     ->add_external_css(
        //         array(
        //             base_url("/{$this->settings->themes_folder}/default/css/materialize.css")
        //         )
        //     ) 
        //     ->add_external_js(
        //         base_url("/{$this->settings->themes_folder}/default/js/materialize.js")
                
        //     );


        $this->load->library('pagination');
        $this->load->helper('url');
    }


    /**
	 * Default
     */
	function index()
	{
        // setup page header data
        $this->set_title(sprintf(lang('welcome title'), $this->settings->site_name));

        $data = $this->includes;


        $this->load->model('properties_model');
        // set content data
        $content_data = array(
          
            'villages' => $this->properties_model->get_all_villages(),
           
        );


        // load views
        $data['content'] = $this->load->view('booking', $content_data, TRUE);
		$this->load->view($this->template, $data);
    }

    function loadProperties()
    {
        $params['limit'] = 5;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $this->load->model('properties_model');
         $data['properties'] = $this->properties_model->get_all();
        // // // set content data

         echo json_encode($data['properties']);
     
        exit;

    }


    function loadVillages()
    {
        $params['limit'] = 5;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $this->load->model('properties_model');
        $data['villages'] = $this->properties_model->get_all_villages();
        // // // set content data

        echo json_encode($data['villages']);

        exit;

    }

    function hey()
    {
      
        echo "hey";

        exit;
    }


}
