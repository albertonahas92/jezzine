<?php defined('BASEPATH') OR exit('No direct script access allowed');

class HikingTrails extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

      
    }


    /**
	 * Default
     */
	function index()
	{
        // setup page header data
        $this->set_title(sprintf(lang('welcome title'), $this->settings->site_name));

        $data = $this->includes;

       
        $this->load->model('HikingTrails_model');
        $sections = $this->HikingTrails_model->get_all();



        // set content data
        $content_data = array(
         
            'sections'=> $sections['results']
        );

        // load views
        $data['content'] = $this->load->view('hiking_trails', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}

 function loadHikingTrails()
    {
     

        $this->load->model('HikingTrails_model');
        $trails = $this->HikingTrails_model->get_all();
        // set content data

        // echo json_encode($data['properties']);
        display_json( $trails);
        exit;
    }


}
