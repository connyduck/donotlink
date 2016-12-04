<form id="form" method="post">
<input type="text" id="url" name="url" oninput="checkUrl()" placeholder="paste a link" autocomplete="off"/> <br />
<div class="loadingButton">
<button type="submit" onclick="disableInput()" id="submitBtn">Go!</button>
<div id="loader"></div>
</div>
</form>
<script>
function checkUrl() {
document.getElementById('submitBtn').disabled = (document.getElementById('url').value.trim().match(/^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})).?)(?::\d{2,5})?(?:[/?#]\S*)?$/gi ) == null);
}
function disableInput() {
document.getElementById('submitBtn').disabled = true;
document.getElementById('submitBtn').className = 'disabled';
document.getElementById('loader').className = 'loader';
document.getElementById('form').submit();
}
window.onpageshow = function() {
checkUrl();
document.getElementById('submitBtn').className = '';
document.getElementById('loader').className = '';
}
</script>
