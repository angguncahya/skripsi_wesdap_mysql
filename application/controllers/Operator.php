<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        $this->load->library('csvimport');
    }

    public function index()
    {
        $this->load->view('operator.php');
    }

    // showing detail operator
	public function detail_operator()
	{
		$this->load->view('operator.php');
    }

}
  