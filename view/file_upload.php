<?php
/**
 * Created by PhpStorm.
 * User: bpechaz
 * Date: 4/27/2017
 * Time: 6:30 PM
 */
?>


<div class="panel-heading">
    <h6 class="panel-title">آپل.د تصاویر</h6>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div id="dropzone-file-uploader" class="dropzone"></div>

            </div>

        </div>
    </div>
</div>

<br/>

<div class="panel-heading">
    <h6 class="panel-title">آپلود از دراپ باکس</h6>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <form method="POST" accept-charset="UTF-8" action="/file_upload/file_upload_api_drop_box.php">
                    <div class="form-group">
                        <label>آدرس فایل به اشتراک گذاشته</label>
                        <input class="form-control" type="text" name="file1"/>
                    </div>

                    <input type="submit" value="ثبت فایل"/>
                </form>

            </div>

        </div>
    </div>
</div>

<div class="panel-heading">
    <h6 class="panel-title">آپلود از دراپ باکس</h6>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" id="dropbox-container">


            </div>
            <br/>
            <br/>
            <br/>
            <div id="dropbox-thumb-container">
                <ul id="dropbox-thumb-ul"></ul>
            </div>

            <div class="dropzone dz-started" id="dropbox-thumb-container-dropzone"></div>

        </div>
    </div>
</div>


<div class="panel-heading">
    <h6 class="panel-title">گوگل پیکر</h6>
    <div class="container-fluid">
        <div class="row" id="google-file-picker">
            <button type="button" id="pick-from-google">Pick File</button>

        </div>
    </div>
</div>

<script type="text/javascript">

    // The Browser API key obtained from the Google Developers Console.
    var developerKey = 'AIzaSyCT_3RTJy8AG5HCjsuNiWSwg0myd0oLtC4';

    // The Client ID obtained from the Google Developers Console. Replace with your own Client ID.
    var clientId = "642261399850-vnlmltvekp0s5cfin5cnp84bb04klm0f.apps.googleusercontent.com"

    // Scope to use to access user's photos.
    var scope = ['https://www.googleapis.com/auth/drive.readonly'];

    var pickerApiLoaded = false;
    var oauthToken;

    // Use the API Loader script to load google.picker and gapi.auth.
    function onApiLoad() {
        gapi.load('auth', {'callback': onAuthApiLoad});
        gapi.load('picker', {'callback': onPickerApiLoad});
    }

    function onAuthApiLoad() {
        window.gapi.auth.authorize(
            {
                'client_id': clientId,
                'scope': scope,
                'immediate': false
            },
            handleAuthResult);
    }

    function onPickerApiLoad() {
        pickerApiLoaded = true;
    }

    function handleAuthResult(authResult) {
        if (authResult && !authResult.error) {
            oauthToken = authResult.access_token;
        }
    }

    // A simple callback implementation.
    function pickerCallback(data) {
        console.log(data);
        var url = 'nothing';
        if (data[google.picker.Response.ACTION] == google.picker.Action.PICKED) {
            var doc = data[google.picker.Response.DOCUMENTS][0];
            url = doc[google.picker.Document.URL];
        }
        var message = 'You picked: ' + url;
        document.getElementById('google-file-picker').innerHTML = message;
    }
</script>

<script type="text/javascript" src="https://apis.google.com/js/api.js?onload=onApiLoad"></script>
<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropbox-container" data-app-key="bmkdgadi6335m7l"></script>