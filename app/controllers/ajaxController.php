<?php

    class ajaxController extends Controller{
        
        public function __construct(){
        }

        public function index(){
            if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_FILES["imagen"]) && $_POST["bee"] == "templ@"){
                    
                    $imagen = $_FILES["imagen"];

                    $post = new postModel();
                    $nombre = rand(). "_" . $_FILES["imagen"]['name'];
                    $post->imagen = UPLOADS . $nombre;
                    $post->titulo = $_POST["titulo"];
                    $post->descripcion = $_POST["descripcion"];
                    guardarImagen($nombre);
                    $post->add();
                    json_output(json_build(200, $post));

                }else{
                    json_output(json_build(400, null));
                }
            }else{
                json_output(json_build(400, null));
            }
            
        }

        public function all(){
            $post = new postModel();
            $data = $post->all();
            json_output(json_build(200, $data));
        }

    }
