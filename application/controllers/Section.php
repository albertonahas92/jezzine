<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends Public_Controller {

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

        $type=$_GET['type'];
        $this->load->model('sections_model');
        $sections = $this->sections_model->get_all_by_type($type);



        // set content data
        $content_data = array(
         
            'sections'=> $sections['results']
        );

        // load views
        $data['content'] = $this->load->view('section', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}

}
