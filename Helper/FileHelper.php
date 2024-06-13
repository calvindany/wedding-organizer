<?php
    function InputFile($file) {
        $file_name = $file['name'];
        $tmp_file_name = $file['tmp_name'];
        $file_size = $file['size'];
        $error = $file['error'];
        $file_type = explode('/', $file['type']);

        $exact_file_type = strtolower( $file_type[count($file_type) - 1] );

        $supported_file_type = array("jpeg", "jpg", "png");

        if(in_array($exact_file_type, $supported_file_type)) {

        }
    }