<?php

class Model_history extends CI_Model{

	function __construct(){
    parent:: __construct();
    $this->load->database();
  }

	public function save($data){
		$this->db->insert('history', $data);
		return $this->db->insert_id();
	}

	public function getDetail($history_id){
		return $this->db->select('*')
		->from('history')
		->where('id', $history_id)
		->limit('5')
		->get()
		->row();
	}

	public function getAll(){
		return $this->db->select('operator_id, time, id')
		->from('history')
		->order_by('id', 'desc')
		->limit('30')
		->get()
		->result();
	}

}