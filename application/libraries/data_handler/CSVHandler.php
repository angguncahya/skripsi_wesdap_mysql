<?php
    require_once('FileHandler.php');

    class CSVHandler implements FileHandler{
        private $file_path;

        static function download(array $data, $file_name){
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="'.$file_name.'.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');

            $file_path = realpath(dirname(__FILE__).'/empty_file/csv.csv');

            $out = fopen('php://output', 'w');
            foreach($data as $dat){
                fputcsv($out, $dat);
            }
            fclose($out);
        }

        public function extract(){
            $file	= fopen($this->file_path, "r");
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
	    	return $data;
        }

        public function set_file_path($file_path){
            $this->file_path = $file_path;
        }

    }