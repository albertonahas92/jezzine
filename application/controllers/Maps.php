<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

      
            $custome_js=
            array(
   
                base_url("/{$this->settings->themes_folder}/default/js/maps.js")

            )
        ;

    }


    /**
	 * Default
     */
	function index()
	{
        // setup page header data
        $this->set_title(sprintf(lang('welcome title'), $this->settings->site_name));

        $data = $this->includes;

     

        // set content data
        $content_data = array(
         
          
        );

        // load views
        $data['content'] = $this->load->view('maps', $content_data, TRUE);
		$this->load->view($this->template, $data);
    }
    

    
     function loadPOIs()
     {
  
         $section = $this->input->post('id');



         $this->load->model('Pois_model');
         $pois = $this->Pois_model->get_all($section);
         // set content data

         // echo json_encode($data['properties']);
         display_json($pois);
         exit;
     }

         function loadSections()
    {
        $this->load->model('Sections_model');
        $sections = $this->Sections_model->get_all_for_maps();
        // set content data

        // echo json_encode($data['properties']);
        display_json($sections);
        exit;
    }


     function loadTrails()
 {
       $id = $this->input->post('id');

     $this->load->model('HikingTrails_model');
     $trails = $this->HikingTrails_model->get_all_for_map($id);
     // set content data

     // echo json_encode($data['properties']);
     display_json($trails);
     exit;
 }


     


}
