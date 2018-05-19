<?php
require __DIR__ . '/vendor/autoload.php';

include_once 'config.inc.php';

use Hashids\Hashids;

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

if (preg_match(URL_REGEX, $code)) {
    $url = $code;
    include 'templates/redirect.html.php';
    return;
}

$hashids = new Hashids(CODE_SALT, MIN_CODE_LENGTH);
$id = $hashids->decode($code);

if(count($id) != 1) {
    http_response_code(404);
    include 'templates/header.html.php';
    include 'templates/404.body.html.php';
    include 'templates/footer.html.php';
    return;
}

// Create connection
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

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

if (!preg_match(URL_REGEX, $url)) {
    http_response_code(500);
    include 'templates/header.html.php';
    include 'templates/500.body.html.php';
    include 'templates/footer.html.php';
    return;
}

include 'templates/redirect.html.php';

?>
