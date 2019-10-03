<?php
    class Frase {
        private $conection;
        private $tabla = 'frases';

        //Atributos de la Frase
        private $id_frase;
        private $contenido;
        private $autor;
        private $favoritos;

        //contructora
        public function __construct($db){
            $this->conection = $db;
        }

        //getter para todas las frases
        public function getFrases(){
            //consulta
            $query = 'SELECT * FROM '. $this->tabla;

            //statement
            $stmt = $this->conection->prepare($query);
            //ejecutamos
            $stmt->execute();

            return $stmt;

        }
    }

?>