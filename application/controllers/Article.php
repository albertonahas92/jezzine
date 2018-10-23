<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Public_Controller {

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

        $id=$_GET['id'];
        $this->load->model('sections_model');
        $article = $this->sections_model->get_by_id($id);
        $object = $article['results'];

        // $this->load->model('upcomings_model');
        // $upcomings = $this->upcomings_model->get_all_by_section($id);

           $this->load->model('CalendarEvents_model');
        $upcomings = $this->CalendarEvents_model->get_all_by_date();


        $this->load->model('ads_model');
        $ads = $this->ads_model->get_all_by_section($id);



        // set content data
        $content_data = array(
         
            'article'=> $article['results'],
            'upcomings'=> $upcomings['results'],
            'ads'=> $ads['results']
        );

        // load views
        $data['content'] = $this->load->view('article', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}

}
