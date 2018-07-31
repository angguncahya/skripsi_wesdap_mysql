<?php
	class Tablehandler{

		public function getDataColumn($data, $num){
			$ret = array();
			foreach($data as $d){
				array_push($ret, $d[$num]);
			}

			return $ret;
		}

	}