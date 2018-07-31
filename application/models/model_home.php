<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_home extends CI_Model{

  function __construct(){
    parent:: __construct();
    $this->load->database();
  }
  
  public function count_data(){
    $this->db->select('COUNT(*) byk');
    $this->db->from('data_sample a');
    $this->db->join('ds_data b', 'b.ds_id=a.ds_id');
    return $this->db->get()->result();
  }

}

?>
