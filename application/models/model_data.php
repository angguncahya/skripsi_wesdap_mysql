<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data extends CI_Model{

  function __construct(){
    parent:: __construct();
    $this->load->database();
  }
  
  function tambah($tabelName,$data){
    $this->db->insert($tabelName,$data);
    $hasil = $this->db->insert_id();
    return $hasil;
  }

  function tambah_detail($tabelName,$data){
    $hasil = $this->db->insert($tabelName,$data);
    return $hasil;
  }

  public function get_data1(){
    $tes = $this->db->query("select * from data_sample a,ds_data b  where a.ds_id = b.ds_id ");
    //$tos = $tes->row();
    return $tes->result();
    //return $tes;
  }

  public function delete($id)
  {
    $data = $this->db->query("DELETE a.*, b.* FROM data_sample a, ds_data b WHERE a.ds_id = ".$id." AND  b.ds_id = ".$id." ");
    //$data = $this->db->query("delete a.*, b.* from data_sample a join ds_data b on a.ds_id = b.ds_id where a.ds_id = ".$id);
  // $this->db->where('ds_id', $id);
  // $this->db->delete('data_sample');
  }

  public function get_data2($id){
    $tes = $this->db->query("select * from data_sample join ds_data on data_sample.ds_id = ds_data.ds_id where data_sample.ds_id = ".$id);
    //$tos = $tes->row();
    return $tes->result();
    //return $tes;
  }

  public function count_data(){
    $this->db->select('COUNT(*) byk');
    $this->db->from('data_sample a');
    $this->db->join('ds_data b', 'b.ds_id=a.ds_id');
    return $this->db->get()->result();
  }

  public function update($ds_id, $data){
    $this->db->where('ds_id', $ds_id);
    $this->db->update('data_sample', $data);
  }


}
?>
