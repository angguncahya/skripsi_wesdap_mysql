<?php
    interface FileHandler{
        static function download(array $data, $file_name);

        public function extract();

        public function set_file_path($file_path);
    }