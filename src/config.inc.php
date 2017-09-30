<?php
//config file
//the default values are suitable for a XAMPP testing environment

//server domain. including protocol. no slash at end
define('SERVER_NAME', "http://localhost");
//server path. slash at beginning. no slash at end. leave empty for root path
define('SERVER_PATH', "");

//name of the site as used in the faq and the title.
//if you change this, you probably want to also change the formatted title in the header.html.php template
define('SITE_NAME', "donotlink.it");

//database configuration
define('DB_SERVER', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");
define('DB_NAME', "donotlink");

//min length for generated codes
define('MIN_CODE_LENGTH', 4);
//salt for generated codes
define('CODE_SALT', "connyduckIsAwesome");

//do not touch the lines below
define('URL_REGEX', "/^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})).?)(?::\d{2,5})?(?:[\/?#]\S*)?$/ui");    

?>
