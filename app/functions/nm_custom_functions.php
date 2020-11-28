<?php

    function en_custom(){
        return 'en_custom FUNCTION';
    }

    function guardarImagen($nombre){
        $target_path = './assets/uploads/';
        $tmp_name = $_FILES["imagen"]['tmp_name'];
        if (!file_exists($target_path)){
            mkdir($target_path, 0777, true);
        }

        if (is_dir($target_path) && is_uploaded_file($tmp_name)){
            $img_file = $nombre;
            $img_type = $_FILES["imagen"]['type'];
            if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png")))
            {
                if (move_uploaded_file($tmp_name, $target_path . $img_file))
                {
                    return true;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }