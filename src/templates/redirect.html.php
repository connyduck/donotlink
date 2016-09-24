<!DOCTYPE html>
<html><head>
<title><?php echo $site_name; ?></title>
<meta name="referrer" content="no-referrer"/>
<meta http-equiv="Refresh" content="0; url=<?php echo htmlspecialchars($url, ENT_COMPAT | ENT_HTML5, "UTF-8", false); ?>"/>
<script type="text/javascript">
window.location.replace( <?php echo json_encode($url, JSON_HEX_QUOT|JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS); ?>);
</script>
</head>
<body>Redirecting to <a rel="nofollow" href="<?php echo htmlspecialchars($url, ENT_COMPAT | ENT_HTML5, "UTF-8", false); ?>"><?php echo htmlspecialchars($url, ENT_COMPAT | ENT_HTML5, "UTF-8", false); ?></a></body></html>
