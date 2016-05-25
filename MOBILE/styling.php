<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cropper</title>
  <link href="../lib/Cropper/css/bootstrap.min.css" rel="stylesheet">
  <link href="../lib/Cropper/css/cropper.css" rel="stylesheet">
  <script src="../lib/Cropper/js/jquery.min.js"></script>
  <script src="../lib/Cropper/js/bootstrap.min.js"></script>
  <script src="../lib/Cropper/js/cropper.js"></script>
  <!-- <script src="../lib/Cropper/js/main.js"></script> -->
  <style>
    .container {
      max-width: 960px;
    }

    img {
      max-width: 100%;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="page-header">Cropper with fixed crop box</h1>
    <div>
      <img id="ori_image" src="./images/picture.jpg" alt="Picture">
    </div>
    <div class="btn-group btn-group-crop">
    <form>
          <!--<button type="button" class="btn btn-primary" data-method="getCroppedCanvas">-->
          <button type="button" class="btn btn-primary" onclick="down_crop_image();return false;">
    </form>
    </div>
  </div>
  <script>
    $(function () {
      $('#ori_image').cropper({
        viewMode: 1,
        dragMode: 'move',
        autoCropArea: 0.65,
        restore: false,
        guides: false,
        highlight: false,
        cropBoxMovable: false,
        cropBoxResizable: false
      });
    });

    function down_crop_image()
    {
      // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
      $().cropper('getCroppedCanvas').toBlob(function (blob) {
        var formData = new FormData();

        formData.append('croppedImage', blob);

        $.ajax('./images/upload', {
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function () {
            console.log('Upload success');
          },
          error: function () {
            console.log('Upload error');
          }
        });
      });      
    }
  </script>
</body>
</html>
