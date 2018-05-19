<?php
require __DIR__ . '/vendor/autoload.php';

include_once 'config.inc.php';

use Hashids\Hashids;

class DoNotLinkEngine {

    private $url;
    private $checked = false;

    function __construct($url) { 
        $this->url = trim($url);
    }

    //returns true or a string containing the error message
    function check() {
        if(!isset($this->url)) {
            return "missing input";
        }
        if (strlen($this->url) > 1000) {            
            return "url too long";
        }
        if (!preg_match(URL_REGEX, $this->url)) {
            return "malformed url";
        }
        if(strpos($this->url, SERVER_NAME) === 0) {
            return "cannot shorten ".SITE_NAME." links";
        }

        $this->checked = true;        

        return true;
    }

    //returns null in case of error, or the code of the shortened link
    function shorten() {

        if($this->checked == false) {
            return NULL;
        }

        // Create connection
        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
   
        // Check connection
        if (!$conn) {
           return NULL;
        }
   
        if($sql = mysqli_prepare($conn, "INSERT INTO redirect (url) VALUES (?)")) {
   
           mysqli_stmt_bind_param($sql, "s", $this->url);
   
           mysqli_stmt_execute($sql);

           mysqli_stmt_close($sql);
        } else {
           return NULL;
        }
   
        $last_id = mysqli_insert_id($conn);
   
        $hashids = new Hashids(CODE_SALT, MIN_CODE_LENGTH);

        return $hashids->encode($last_id);
    }
}

?>
