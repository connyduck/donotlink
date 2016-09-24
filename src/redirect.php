<?php
include_once 'Hashids/Hashids.php';
include_once 'config.inc.php';

header('X-Robots-Tag: noindex, nofollow');

$code = $_GET['donotlink'];

if(!isset($code)) {
   http_response_code(404);
   include 'templates/header.html.php';
   include 'templates/404.body.html.php';
   include 'templates/footer.html.php';
   return;
}

$bots = array (
   "googlebot",
   "bingbot",
   "baiduspider",
   "duckduckbot",
   "yahoo",
   "twitterbot",
   "applebot",
   "facebook",
   "embedly",
   "yandexbot"
);

if(!isset($_SERVER['HTTP_USER_AGENT'])) {
   http_response_code(403);
   return;
}

$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);

foreach ($bots as $bot) {
    if (strpos($user_agent, $bot) !== FALSE ) {
      http_response_code(403);
      return;
   }
}

if (preg_match($url_regex, $code)) {
   $url = $code;
   include 'templates/redirect.html.php';
   return;
}

$hashids = new Hashids\Hashids($code_salt, $min_code_length);
$id = $hashids->decode($code);

if(count($id) != 1) {
   http_response_code(404);
   include 'templates/header.html.php';
   include 'templates/404.body.html.php';
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

if($sql = mysqli_prepare($conn, "SELECT url FROM redirect WHERE id = ?")) {

mysqli_stmt_bind_param($sql, "i", $id[0]);

mysqli_stmt_execute($sql);

mysqli_stmt_bind_result($sql, $url);

mysqli_stmt_fetch($sql);

mysqli_stmt_close($sql);
} else {
   http_response_code(500);
    include 'templates/header.html.php';
    include 'templates/500.body.html.php';
    include 'templates/footer.html.php';
    return;
}

if($url == null) {
   http_response_code(404);
   include 'templates/header.html.php';
   include 'templates/404.body.html.php';
   include 'templates/footer.html.php';
   return;
}

if (!preg_match($url_regex, $url)) {
   http_response_code(500);
   include 'templates/header.html.php';
   include 'templates/500.body.html.php';
   include 'templates/footer.html.php';
   return;
}

include 'templates/redirect.html.php';

?>
