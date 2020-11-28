<?php

    class postModel extends Model{

        public $id;
        public $imagen;
        public $titulo;
        public $descripcion;

        public function all(){

            $sql = 'SELECT * FROM posts';

            try{
                return ($rows = parent::query($sql)) ? $rows : false;
            } catch(Exception $e) {
                throw $e;
            }

        }

        public function add(){
            $sql = 'INSERT INTO posts(imagen,titulo,descripcion) VALUES(:imagen,:titulo,:descripcion)';

            $data =
            [
                'imagen'   =>  $this->imagen,
                'titulo'        =>  $this->titulo,
                'descripcion'       =>  $this->descripcion
            ];

            try{
                return ($this->id = parent::query($sql, $data)) ? $this->id : false;
            }catch(Exception $e){
                throw $e;
            }
        }


    }
