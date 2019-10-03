<?php
    class Database{
        //parametros para conectarse a la DB
        private $host = 'localhost';
        private $db_name = 'kubide';
        private $username = 'root';
        private $password = '';
        private $conection;

        //Conectar
        public function connect(){
            $this->conection = null;

            try{
                $this->conection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,$this->username, $this->password);
                //activamos el modo de errores para recibir excepciones al hacer consultas.
                $this->conection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo 'Error en la conexion : ' . $e->getMessage();
            }
            return $this->conection;
        }
    }
?>