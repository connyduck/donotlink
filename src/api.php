<?php
include_once 'config.inc.php';
include_once 'engine.inc.php';

header('Content-type: application/json');

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(400);    
    echo json_encode(array("error"=>"wrong method"));    

} else {

    $engine = new DoNotLinkEngine($_POST['url']);

    $check = $engine->check();

    if($check !== true) {
        http_response_code(400);            
        echo json_encode(array("error"=>$check));
        return;
    }

    $code = $engine->shorten();

    if($code === NULL) {
        http_response_code(500);            
        echo json_encode(array("error"=>"server error"));
        return;
    }

    $response = array(
        "url"=>$_POST["url"],
        "code"=>$code,
        "donotlink"=>SERVER_NAME.SERVER_PATH.'/'.$code
    );


    echo json_encode($response);      
   
}

?>
