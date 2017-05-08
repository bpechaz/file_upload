<?php
/**
 * Created by PhpStorm.
 * User: bpechaz
 * Date: 4/27/2017
 * Time: 6:30 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="filepicker.js"></script>
	
</head>
<body class="login-container login-cover">

<div class="panel-heading">
    <h6 class="panel-title">گوگل پیکر</h6>
    <div class="container-fluid">
        <div class="row">
            <button type="button" id="pick">Pick File</button>

        </div>
    </div>
</div>


<script>
    function initPicker() {
        var picker = new FilePicker({
            apiKey: 'AIzaSyCJrKkfqbiS6nQmB0necGD_gXLgSb7s_mk',
            clientId: '565153181905-n69tl89suh7hv8i3h0l7ku14uhbu714e',//485605585658-lnanpavi7nsd0k0tsfa6hd0dno343h3q.apps.googleusercontent.com
            buttonEl: document.getElementById('pick'),
            onSelect: function(file) {
                console.log(file);
                alert('Selected ' + file.title);
            }
        });
    }
</script>
<script src="https://www.google.com/jsapi?key=AIzaSyCJrKkfqbiS6nQmB0necGD_gXLgSb7s_mk"></script>
<script src="https://apis.google.com/js/client.js?onload=initPicker"></script>
</body>
