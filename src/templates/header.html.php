<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="index, nofollow" />
<title> <?php echo SITE_NAME; ?> </title>
<link rel="icon" type="image/x-icon" href="<?php echo SERVER_PATH; ?>/favicon.ico" />
<?php
   if(isset($canonical_url))
      echo "<link rel=\"canonical\" href=\"$canonical_url\">
<meta name=\"description\" content=\"Using ".SITE_NAME." instead of linking to questionable websites directly will prevent your links from improving these websites' position in search engines.\" />
";
?>
<link rel="stylesheet" type="text/css" href="<?php echo SERVER_PATH; ?>/assets/style.css" />
<meta name="theme-color" content="#0078e7">
<link rel="icon" sizes="192x192" href="<?php echo SERVER_PATH; ?>/assets/icon.png">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>
<body>
   <h1>do<span>NOT</span>link<span>.</span>it</h1>
