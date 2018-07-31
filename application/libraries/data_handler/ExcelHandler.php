<?php
    require_once('FileHandler.php');

    require dirname(__FILE__).'/../vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    
    class ExcelHandler implements FileHandler{

        private $file_path;

        static function download(array $data, $file_name){
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet()
            ->fromArray($data,NULL,'A1');

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
            header('Content-type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="'.$file_name.'.xlsx"');
            $writer->save('php://output');
        }

        public function extract(){
            /**  Identify the type of $inputFileName  **/
            $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($this->file_path);
            /**  Create a new Reader of the type that has been identified  **/
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($this->file_path);

            $worksheet = $spreadsheet->getActiveSheet();
            $arr = array();
            foreach ($worksheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);
                $new_arr = array();
                foreach ($cellIterator as $cell) {
                    array_push($new_arr, $cell->getValue());
                }
                array_push($arr, $new_arr);
            }

            return $arr;
        }

        public function set_file_path($file_path){
            $this->file_path = $file_path;
        }
    }