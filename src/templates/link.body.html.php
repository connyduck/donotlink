<div>Your <?php echo $site_name; ?> link to <a href="<?php echo $url; ?>"><?php echo $url; ?></a> is ready!</div>
<form>
<input type="text" id="url" name="url" value="<?php echo $donotlink_url; ?>" autocomplete="off" readonly/> <br />
<button type="button" class="btn" data-clipboard-target="#url" id="submitBtn">Copy to clipboard</button>
</form>
<script src="<?php echo $server_path; ?>/assets/clipboard.min.js"></script>
<script>
new Clipboard('.btn');
</script>
<a href="<?php echo $server_name.$server_path; ?>">Create another <?php echo $site_name; ?> link </a>
