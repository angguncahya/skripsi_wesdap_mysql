<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Calculation extends CI_Model{

  function __construct(){
    parent:: __construct();
    $this->load->database();
  }

  public function getDetail($ds_id){
    return $this->db->select('*')
      ->from('ds_data')
      ->where('ds_id', $ds_id)
      ->get()
      ->row();
  }

  public function save($data){
    $this->db->insert('history', $data);
    return $this->db->insert_id();
  }

  public function get_data1(){
    $tes = $this->db->query("select * from data_sample a,ds_data b  where a.ds_id = b.ds_id ");
    //$tos = $tes->row();
    return $tes->result();
    //return $tes;
  }

  public function get_data2($id){
    $tes = $this->db->query("select * from data_sample join ds_data on data_sample.ds_id = ds_data.ds_id where data_sample.ds_id = ".$id);
    //$tos = $tes->row();
    return $tes->result();
    //return $tes;
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
?>
