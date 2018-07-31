<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        $this->load->model('model_home');
        $this->load->library('session');
	}

	public function index()
	{
		$data=$this->model_home->count_data();
		$this->load->view('home', $data);
	}
}
