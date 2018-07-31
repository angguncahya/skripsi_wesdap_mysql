<?php
	/*
		Class Name	: JSON to Graphic
		Creator		: Noval Bintang
		Date 		: 01 Oct 2017
	*/

	class Jtg {

		public $data;

		public function setData($json = ""){
			$this->data	= json_decode($json);
		}

		public function getData(){
			return $this->data;
		}

		public function mergeData($json = ""){
			if( empty($this->data) ){
				$this->data	= (array)json_decode($json);
			}else{
				$this->data	= array_merge_recursive($this->data, (array)json_decode($json));
			}
		}

		public function to_table(){
			require_once(__DIR__.'/json_convert_lib/Create_table.php');
			$data	= $this->data;

			return new Create_table($data);
		}

	}