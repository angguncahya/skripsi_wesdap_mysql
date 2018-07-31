<?php
    require('CSVHandler.php');
    require('ExcelHandler.php');

    class DataHandler{
        private $data = array();
        private $file;

        public function __construct(){
            //Empty Constructor
        }

        public function setData($data){
            $this->data = $data;
            return $this;
        }

        public function download($tipe='csv', $file_name='data'){
            if( $tipe == 'csv' ){
                CSVHandler::download($this->data, $file_name);
            }else{
                ExcelHandler::download($this->data, $file_name);
            }
        }

        public function setFile($file_path){
            $file = mime_content_type($file_path);
            $mime = explode('/', $file);

            if( $mime[0] == 'text' ){
                $this->file = new CSVHandler();
            }else{
                $this->file = new ExcelHandler();
            }
            $this->file->set_file_path($file_path);

            return $this;
        }

        public function extract(){
            $this->data = $this->file->extract();
            return $this;
        }

        public function getData(){
            return $this->data;
        }

        public function normalization(){

            function is_not_null($val){
                return !is_null($val);
            }
            
            foreach($this->data as $k => $data){
                $data = array_filter($data, 'is_not_null');
                $this->data[$k] = $data;
            }
            return $this;
        }

        public function isDataValid($max_rows = -1){
            $this->normalization();
	    	$i		= 1;
            $pjg    = -1;
            
            $out['success'] = true;
            foreach($this->data as $data){
                if( $pjg!=-1 && $pjg!=count($data) ){
                    $out['success'] = false;
                    $out['message'] = "There is different column length! On line : ".$i;
                    break;
                }
                $pjg = count( $data );
                if( $i >= $max_rows && $max_rows != -1 ){
                    $out['success'] = false;
                    $out['message'] = "Maximum data limit exceeded. Only ".$max_rows." line allowed!";
                    break;
                }
                $i++;
            }
            
            return $out;
        }
    }