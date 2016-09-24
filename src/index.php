<?php
include_once 'config.inc.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {

   $canonical_url = $server_name.$server_path;

   include 'templates/header.html.php';
   include 'templates/index.body.html.php';
   include 'templates/faq.body.html.php';
   include 'templates/footer.html.php';

} else {
   include_once 'Hashids/Hashids.php';

   if(!isset($_POST['url'])) {
      http_response_code(400);
      include 'templates/header.html.php';
      echo "missing input";
      include 'templates/footer.html.php';
      return;
   }

   $input_url = trim($_POST['url']);

   if (strlen($input_url) > 1000) {
      http_response_code(400);
      include 'templates/header.html.php';
      echo "url too long, could not shorten";
      include 'templates/footer.html.php';
      return;
   }

   if (!preg_match($url_regex, $input_url)) {
      http_response_code(400);
      include 'templates/header.html.php';
      echo "malformed url, could not shorten";
      include 'templates/footer.html.php';
      return;
   }

   if(strpos($input_url, $server_name) === 0) {
      http_response_code(400);
      include 'templates/header.html.php';
      echo "cannot shorten $site_name links";
      include 'templates/footer.html.php';
      return;
   }

   // Create connection
   $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

   // Check connection
   if (!$conn) {
      http_response_code(500);
      include 'templates/header.html.php';
      include 'templates/500.body.html.php';
      include 'templates/footer.html.php';
      return;
   }

   if($sql = mysqli_prepare($conn, "INSERT INTO redirect (url) VALUES (?)")) {

      mysqli_stmt_bind_param($sql, "s", $input_url);

      mysqli_stmt_execute($sql);

      mysqli_stmt_close($sql);
   } else {
      http_response_code(500);
      include 'templates/header.html.php';
      include 'templates/500.body.html.php';
      include 'templates/footer.html.php';
      return;
   }

   $last_id = mysqli_insert_id($conn);

   $hashids = new Hashids\Hashids($hash_salt, $min_hash_length);
   $hash = $hashids->encode($last_id);


   mysqli_close($conn);

   http_response_code(303);
   header('Location: '.$server_name.$server_path.'/l/'.$hash);
}

?>
