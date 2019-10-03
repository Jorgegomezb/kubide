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
        public function setId($value){
            $this->id_frase = $value;
        }

        //Getters
        public function getId_frase(){
            return $this->id_frase;
        }
        public function getContenido(){
            return $this->contenido;
        }
        public function getAutor(){
            return $this->autor;
        }
        public function getFavoritos(){
            return $this->favoritos;
        }

        //Leer todas las frases
        public function getFrases(){
            //consulta
            $query = 'SELECT * FROM '. $this->tabla;

            //statement
            $stmt = $this->conection->prepare($query);
            //ejecutamos
            $stmt->execute();

            return $stmt;

        }

        public function getFrase(){
            //consulta
            $query = 'SELECT * FROM '. $this->tabla . ' t WHERE t.id_frase= ?';


                      // Prepare statement
          $stmt = $this->conection->prepare($query);
          // Bind ID
          $stmt->bindParam(1, $this->id_frase);
          // Execute query
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          // Set properties
          $this->id_frase = $row['id_frase'];
          $this->contenido = $row['contenido'];
          $this->autor = $row['autor'];
          $this->favoritos = $row['favoritos'];
        }
    }

?>