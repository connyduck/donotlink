<?php
//config file
//the default values are suitable for a XAMPP testing environment

//server domain. including protocoll. no slash at end
$server_name = "http://localhost";
//server path. slash at beginning. no slash at end. leave empty for root path
$server_path = "/donotlink/src";

//name of the site as used in the faq and the title.
//if you change this, you probably want to also change the formatted title in the header.html.php template
$site_name = "donotlink.it";

//database configuration
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "donotlink";

//min length for generated hashes
$min_hash_length = 4;
//salt for generated hashes
$hash_salt = "connyduckIsAwesome";

?>
