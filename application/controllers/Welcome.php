<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the language file
        $this->lang->load('welcome');
    }


    /**
	 * Default
     */
	function index()
	{
        // setup page header data
        $this->set_title(sprintf(lang('welcome title'), $this->settings->site_name));

        $data = $this->includes;


        $this->load->model('slider_model');
        $sliders= $this->slider_model->get_all();


        $this->load->model('quotes_model');
        $quotes = $this->quotes_model->get_all();

        $this->load->model('events_model');
        $events = $this->events_model->get_all();

        $this->load->model('calendarevents_model');
        $calendar_event = $this->calendarevents_model->get_by_date();

        // set content data
        $content_data = array(
            // 'welcome_message' => $this->settings->welcome_message[$this->session->language],
            'sliders'=> $sliders['results'],        
                'quotes'=> $quotes['results'],
                'events'=> $events['results'],
                'calendar_event'=> $calendar_event['results']
        );

        // load views
        $data['content'] = $this->load->view('welcome', $content_data, TRUE);
		$this->load->view($this->template, $data);
    }


    function sendMail()
    {
        $to=  $this->input->get('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'albertonahas92@gmail.com', // change it to yours
            'smtp_pass' => 'alberto397', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => true
        );

        $message = 'hey';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('albertonahas92@gmail.com'); // change it to yours
        $this->email->to($to);// change it to yours
        $this->email->subject('TEST');
        $this->email->message($message);
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }

    }

}
