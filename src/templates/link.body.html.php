<div>Your <?php echo SITE_NAME; ?> link to <a href="<?php echo $url; ?>"><?php echo $url; ?></a> is ready!</div>
<form>
<input type="text" id="url" name="url" value="<?php echo $donotlink_url; ?>" autocomplete="off" readonly/> <br />
<button type="button" class="btn" data-clipboard-target="#url" id="submitBtn"  tooltiptext="Copied!">Copy to clipboard</button>
</form>
<script src="<?php echo SERVER_PATH; ?>/assets/clipboard.min.js"></script>
<script>
var clipboard = new ClipboardJS('.btn');
clipboard.on('success', function(e) {
    e.trigger.classList.add("tooltipped");
});
var btns = document.querySelectorAll('.btn');
for(var i=0; i < btns.length; i++) { 
    btns[i].addEventListener('mouseleave', clearTooltip);
    btns[i].addEventListener('blur', clearTooltip);
}
function clearTooltip(e){
    e.currentTarget.classList.remove("tooltipped");
}
</script>
<a href="<?php echo SERVER_NAME.SERVER_PATH; ?>">Create another <?php echo SITE_NAME; ?> link </a>
