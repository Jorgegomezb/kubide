<?php

    //headers
    header('Access-Control-Allow-Origin:*'); //usuario!!
    header('Content-type: application/jason');

    include_once '../../config/Database.php';
    include_once '../../models/Frase.php';

    //Instanciamos el objeto de la base de datos y conectamos
    $database = new DataBase();
    $database = $database->connect();

    //Creamos el objeto de frase
    $frase = new Frase($database);

    $result = $frase->getFrases();
    $num  =$result->rowCount();

    //Ver si hay alguna frase
    if($num>0){
        //Array de Frases
        $arr_frases=array();
        $arr_frases['data'] = array();
        while( $row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $item_frase = array(
                'id_frase'=>$id_frase,
                'contenido'=>$contenido,
                'autor'=>$autor,
                'favoritos'=>$favoritos
            );

            //push a ·data
            array_push($arr_frases['data'],$item_frase);
        }
        //Convertimos a JSON y devolvemos
        echo json_encode($arr_frases);
    } else{
        //no hay frases
        echo json_encode(
            array('message'=>'no hay frases'));
    }
?>