<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculation extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        $this->load->model('model_calculation');
        $this->load->library('csvimport');
    }

    // sending curl to connect the django program 
    private function api_curl($data){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "http://localhost:8000/calc/?ver=".date("YmdHis"),
            CURLOPT_USERAGENT => 'Mahasiswa.id',
            CURLOPT_POST => 1,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_POSTFIELDS => $data,
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        return $resp;
    }

    // send the data to django program
    public function calculation()
	{
        $this->load->library('tablehandler');

        if( !empty($_POST) ){
            $dataId = $this->input->post('select');
            $col1 = $this->input->post('select1');
            $col2 = $this->input->post('select2');

            $dataCurl = array(
                'a' => array(
                    'head' => 'Variable A',
                    'body' => array()
                ),
                'b' => array(
                    'head' => 'Variable B',
                    'body' => array()
                )
            );

            # Hard Code, Bad Code
            # Case => Pengurangan
            # Get Data

            $data = $this->model_calculation->getDetail($dataId);
            $data = $data->dsd_detail;
            $data = json_decode($data);
            $data = $data->body;

            # Get Data for Variable A
            $dataCurl['a']['body'] = $this->tablehandler->getDataColumn($data, $col1);
            # Get Data for Variable B
            $dataCurl['b']['body'] = $this->tablehandler->getDataColumn($data, $col2);

            //print_r($dataCurl);

            $POST['operator'] = 'pengurangan'; #route to django folder
            $POST['data']     = json_encode($dataCurl);

            # API Call with Curl
            $curl = $this->api_curl($POST);

            # Result
            $res = json_decode($curl);

            # Save History
            $sv['operator_id']  = 1; #HARD CODE
            $sv['graph']        = json_encode($res->graph);
            $sv['tables']       = json_encode($res->result->table);
            $history_id = $this->model_calculation->save($sv);

            redirect('history/index/'.$history_id);
            die();
        }

        $data['data'] = $this->model_calculation->get_data1(); 
		$this->load->view('calculation.php', $data);
    }
    
    // showing the head of dataset that already been choosen
	public function pilihKolom(){
        $id = $this->input->get("ds_id");
        $rs = $this->model_calculation->get_data2($id);
        foreach($rs as $value){
            $detail = $value->dsd_detail;
            $fix_detail = json_decode($detail);
        }
        $head = $fix_detail->head;
        foreach($head as $i => $h){
            echo '<option value="'.$i.'">'.$h.'</option>';
        }
    }
    public function result()
    {

        $data['histories'] = $this->model_calculation->getAll();
        $this->load->view('result', $data);
    }
    public function result_calculation()
    {
        //$id=39;
        //$id = $this->input->get('id');
        //$data['detail'] = $this->model_calculation->get_data2($id);
        //print_r($data);die;
        $this->load->view('result_calculation.php');
    }
}
