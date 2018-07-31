<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        $this->load->model('model_data');
        $this->load->library('session');
	}

	// for upload data
	public function index()
	{
		$this->load->view('upload.php');
		
	}

	public function upload_data()
	{
		$this->load->view('upload.php');
		
	}

	// upload data and sweetalert
	public function input_dataset(){

		$this->form_validation->set_error_delimiters("", ",");
		$this->form_validation->set_rules('ds_name', 'data sample name', 'required|max_length[50]');
		$this->form_validation->set_rules('ds_description', 'data description', 'required|max_length[300]');

		$out['success']	= false;

		if( $this->form_validation->run() != false ){

			//print_r($_POST);
			//print_r($_FILES);

			// Upload the file
			$directory	= FCPATH.'uploads/';
			$this->create_directory($directory);

			$directory	= $directory.'/data/';
			$this->create_directory($directory);

			$upload 	= $this->upload('dataset_file', $directory, 'csv');

			$file_path = $directory.$upload['file_name'];

			//extract the file
			$file	= fopen($file_path, "r");
	    	$data	= array();

	    	while(!feof($file)){
				$getcsv	= fgetcsv($file);
				if( count($getcsv) <= 1 ){
					break;
				}
	    		if( $getcsv != false ){
                    if( count($getcsv) == 0 ){
                        break;
                    }
	    			array_push($data, $getcsv);
				}
	    	}

	    	fclose($file);
	    	
	    	$head = $data[0];
	    	
	    	$nonhead = array_shift($data);
	    	$detail = array("body" => $data, "head" => $head);
			
			$ins['ds_name']	= $this->input->post('ds_name');
			$ins['ds_description']	= $this->input->post('ds_description');
			$ins['ds_created_time']	= date("Y-m-d H:i:s");
			$ins['ds_row']	= count($data);
			
			$out['ds_id']	= $this->model_data->tambah('data_sample', $ins);

			$in['ds_id']	= $out['ds_id'];
			$in['dsd_tipe']	= 1;
			$in['dsd_detail']	= json_encode($detail);

			$out['dsd_id']	= $this->model_data->tambah_detail('ds_data', $in);

			$out['success']	= true;
  		
			//Sweetalert
			if ($out['ds_id']){
				$this->session->set_flashdata('success', TRUE);
				$data['data'] = $this->model_data->get_data1();
				redirect("Data/detail_data?id=".$in['ds_id']);
			}
			else{
				$this->session->set_flashdata('fail', TRUE);
				redirect("Data/");
			}
		}

	}

	// showing dataset list
	public function dataset()
	{
		$data['data'] = $this->model_data->get_data1();
		//print_r($data); die;
		$this->load->view('dataset.php', $data);
	}

	// function to delete the dataset
	public function delete()
	{
		$id = $this->input->post('id');
		$this->model_data->delete($id);	
		
		
	}

	// showing the dataset detail
	public function detail_data()
	{  
		
		$id = $this->input->get('id');
		$data['detail'] = $this->model_data->get_data2($id);
		foreach($data['detail'] as $value){
			$detail = $value->dsd_detail;
			$fix_detail = json_decode($detail);
		}

		$data['head'] = $fix_detail->head;
		$data['body'] = $fix_detail->body;
		//print_r($data); die;
		$this->load->view('detail_dataset.php', $data);

	}

	// COBA COBA
	public function coba(){
		$ds_id = 4;
		$data = $this->model_data->count_data($ds_id);
		print_r($data);
		return $data;
	}
	
}
