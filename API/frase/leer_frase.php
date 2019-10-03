<?php

    //headers
    header('Access-Control-Allow-Origin:*'); 
    header('Content-type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Frase.php';

    //Instanciamos el objeto de la base de datos y conectamos
    $database = new DataBase();
    $database = $database->connect();

    //Creamos el objeto de frase
    $frase = new Frase($database);
      // Get ID
      if(isset($_GET['id_frase'])){
          $id = $_GET['id_frase'];
      }else{
          die();
      }



    $frase->setId((int)$id);

    // Get post
    $frase->getFrase();
    // Create array
    $arr_frase = array(
        'id_frase' => $frase->getId_frase(),
        'contenido' => $frase->getContenido(),
        'autor' => $frase->getAutor(),
        'favoritos' => $frase->getFavoritos()
    );

    // Make JSON
    print_r(json_encode($arr_frase));
?>