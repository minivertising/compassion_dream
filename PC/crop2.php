<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Cropping Demo</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <!-- <link rel="stylesheet" href="../lib/Jcrop/css/main.css" type="text/css" /> -->
  <!-- <link rel="stylesheet" href="../lib/Jcrop/css/demos.css" type="text/css" /> -->
  <link rel="stylesheet" href="../lib/Jcrop/css/jquery.Jcrop.css" type="text/css" />
  <script src="../js/jquery-1.11.2.min.js"></script>
  <script src="../lib/Jcrop/js/jquery.Jcrop.js"></script>
  <script src="../js/cscript.js"></script>
</head>
<div class="bbody">

    <!-- upload form -->
    <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php" onsubmit="return checkForm()">
        <!-- hidden crop params -->
        <input type="hidden" id="x1" name="x1" />
        <input type="hidden" id="y1" name="y1" />
        <input type="hidden" id="x2" name="x2" />
        <input type="hidden" id="y2" name="y2" />

        <h2>Step1: Please select image file</h2>
        <div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" /></div>

        <div class="error"></div>

        <div class="step2">
            <h2>Step2: Please select a crop region</h2>
            <img id="preview" />

            <div class="info">
                <label>File size</label> <input type="text" id="filesize" name="filesize" />
                <label>Type</label> <input type="text" id="filetype" name="filetype" />
                <label>Image dimension</label> <input type="text" id="filedim" name="filedim" />
                <label>W</label> <input type="text" id="w" name="w" />
                <label>H</label> <input type="text" id="h" name="h" />
            </div>

            <input type="submit" value="Upload" />
        </div>
    </form>
</div>

</html>