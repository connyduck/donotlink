<div>Your <?php echo SITE_NAME; ?> link to <a href="<?php echo $url; ?>"><?php echo $url; ?></a> is ready!</div>
<form>
<input type="text" id="url" name="url" value="<?php echo $donotlink_url; ?>" autocomplete="off" readonly/> <br />
<button type="button" class="btn" data-clipboard-target="#url" id="submitBtn">Copy to clipboard</button>
</form>
<script src="<?php echo SERVER_PATH; ?>/assets/clipboard.min.js"></script>
<script>
new Clipboard('.btn');
</script>
<a href="<?php echo SERVER_NAME.SERVER_PATH; ?>">Create another <?php echo SITE_NAME; ?> link </a>
