<?php

require "Controller/DBcon.php";
include_once "Controller/EstadosController.php";
$db = new DB();
$estados = new Estados();
$response_data = '';
$strErrorDesc = 'Method not supported';
$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
try {
    if (isset($_GET['id'])) {
        $response_data = $estados->GetEstadoPorId($_GET['id']);
        
        if(count($response_data,0) == 0){
            $strErrorDesc = 'datos no validos';
            
            $db->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
            
        }else{
            $db->sendOutput(
                json_encode($response_data),
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );

        }
    } else {
        
        $response_data = json_encode($estados->GetEstados());
        $db->sendOutput(
            $response_data,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    }
    
} catch (\Throwable $th) {

    $db->sendOutput(
        json_encode(array('error' => $strErrorDesc)),
        array('Content-Type: application/json', $strErrorHeader)
    );
}
