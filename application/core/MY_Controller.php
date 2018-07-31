<?php
	defined('BASEPATH') or die('Tidak dapat diakses langsung!');

	class MY_Controller extends CI_Controller{

        protected function upload($file_name, $upload_path, $types='gif|png|jpg', $max_size = 2048){
            $config['upload_path']    = $upload_path;
            $config['allowed_types']  = $types;
            $config['max_size']       = $max_size;
            $config['encrypt_name']   = true;
            $config['max_filename']   = 40;
  
            $this->load->library('upload', $config);
  
            if( !$this->upload->do_upload($file_name) ){
              return false;
            }else{
              return $this->upload->data();
            }
          }

          protected function create_directory($path, $mode = 0777){
            if( !file_exists($path) ){
              mkdir($path, $mode);
            }
          }
    }