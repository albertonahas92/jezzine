<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

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
        $custome_css =
                array(
           
                    // base_url("/{$this->settings->themes_folder}/default/css/fullcalendar.css"),
                    // base_url("/{$this->settings->themes_folder}/default/css/fullcalendar.print.css"),
                    base_url("/{$this->settings->themes_folder}/default/css/mycalendar.css")
                )
                ;
            $custome_js=
            array(
               
                // base_url("/{$this->settings->themes_folder}/default/js/jquery-ui.custom.min.js"),
                // base_url("/{$this->settings->themes_folder}/default/js/fullcalendar.js"),
                base_url("/{$this->settings->themes_folder}/default/js/mycalendar.js")

            )
        ;


        $this->load->model('calendarEvents_model');
        $sections = $this->calendarEvents_model->get_all();



        // set content data
        $content_data = array(
         
            'sections'=> $sections['results'],
            'custom_js'=> $custome_js,
            'custom_css' => $custome_css
        );

        // load views
        $data['content'] = $this->load->view('calendar', $content_data, TRUE);
		$this->load->view($this->template, $data);
    }


    function loadCalendarEvents()
    {
     

        $this->load->model('calendarEvents_model');
        $data['events'] = $this->calendarEvents_model->get_all();
        // set content data

        // echo json_encode($data['properties']);
        display_json($data['events']);
        exit;
    }

}
