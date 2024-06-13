<?php
    include __DIR__ . '/../Config/FileUploadStatus.php';

    function InputFile($file) {
        try {
            $file_name = $file['name'];
            $tmp_file_name = $file['tmp_name'];
            $file_size = $file['size'];
            $error = $file['error'];
            $file_type = explode('/', $file['type']);
    
            $exact_file_type = strtolower( $file_type[count($file_type) - 1] );
    
            $supported_file_type = array("jpeg", "jpg", "png");
    
            if(!in_array($exact_file_type, $supported_file_type)) {
                return $FILE_EXTENSION_FORBID;
            }
    
            if($error >= 1) {
                return $ERROR_WHILE_RECIEVE;
            }
    
            if($file_size >= 3000000) {
                return $FILE_SIZE_EXCEDED;
            }
    
            $new_file_name = uniqid('', true) . "." . $exact_file_type;
    
            $file_path = "/Public/Uploads/" . $new_file_name;
    
            $save_destination = __DIR__ . "/.." . $file_path;
    
            move_uploaded_file($tmp_file_name, $save_destination);
    
            return $file_path;
        } catch (Exception $ex) {
            return $ERROR_WHILE_UPLOAD;
        }
    }