<?php

class History extends CI_Controller{

	public function index($id = 0){
		$this->load->model('model_history');

		$history = $this->model_history->getDetail($id);
		$tables  = $history->tables;
		$tables  = json_decode($tables);
		$data['tables'] = $tables;
		$data['length'] = count($tables->body[0]);
		$this->load->view('result_calculation', $data);
	}

}