<?php
include_once 'config.inc.php';
include_once 'engine.inc.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {

    $canonical_url = SERVER_NAME.SERVER_PATH;

    include 'templates/header.html.php';
    include 'templates/index.body.html.php';
    include 'templates/faq.body.html.php';
    include 'templates/footer.html.php';

} else {
    $engine = new DoNotLinkEngine($_POST['url']);
    
    $check = $engine->check();
    
    if($check !== true) {
        http_response_code(400);            
        include 'templates/header.html.php';
        echo $check;
        include 'templates/footer.html.php';
        return;
    }
    
    $code = $engine->shorten();
    
    if($code === NULL) {
        http_response_code(500);        
        include 'templates/header.html.php';            
        include 'templates/500.body.html.php';
        include 'templates/footer.html.php';            
        return;
    }
    
   http_response_code(303);
   header('Location: '.SERVER_NAME.SERVER_PATH.'/l/'.$code);
}

?>
