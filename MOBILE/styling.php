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
<<<<<<< HEAD
  <!-- <script src="../lib/Cropper/js/main.js"></script> -->
=======
>>>>>>> 2a1e83305b6c0aa30a266b614650afa4afc795c7
  <style>
    .container {
      max-width: 100%;
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
<<<<<<< HEAD
    <div class="btn-group btn-group-crop">
    <form>
          <!--<button type="button" class="btn btn-primary" data-method="getCroppedCanvas">-->
          <button type="button" class="btn btn-primary" onclick="down_crop_image();return false;">
    </form>
=======
    <div class="btn-group btn-group-crop docs-buttons">
          <a class="btn btn-primary" id="download" href="javascript:void(0);" data-method="getCroppedCanvas" download="cropped.jpg">Download</a>
        <div class="btn-group"> 
          <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
          <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
            <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">Upload
            </span>
          </label>
          <button type="button" class="btn btn-primary" data-method="getCanvasData" data-option data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCanvasData&quot;)">
            Get Canvas Data
          </span>
        </button>
          <input type="text" class="form-control" id="putData" placeholder="Get data to here or set data with this value">
        </div>
>>>>>>> 2a1e83305b6c0aa30a266b614650afa4afc795c7
    </div>
    <!-- <div class="input-group input-group-sm">
            <label class="input-group-addon" for="dataWidth">Width</label>
            <input type="text" class="form-control" id="dataWidth" placeholder="width">
            <span class="input-group-addon">px</span>
          </div> -->
  </div>
  <script>
    $(function () {
        $('#ori_image').cropper({
          viewMode: 0,
          dragMode: 'move',
          autoCropArea: 0.65,
          restore: false,
          guides: false,
          highlight: false,
          cropBoxMovable: false,
          cropBoxResizable: false,
          built: function(){
            var imageData;
            var afterCropBoxData;
            var $ori_image = $('#ori_image');
            var imageData = $($ori_image).cropper('getImageData');
            var afterCropBoxData = $($ori_image).cropper('getCropBoxData');
            console.log("naturalWidth: "+imageData.naturalWidth+",  naturalHeight: "+imageData.naturalHeight); // 오리지널 사이즈
            console.log("afterImageWidth: "+imageData.width+",  afterImageHeight: "+imageData.height);
            console.log("afterCropBoxWidth: "+afterCropBoxData.width+",  afterCropBoxHeight: "+afterCropBoxData.height);
            // $($ori_image).cropper("setCropBoxData", {left: (imageData.width/2)/2, top: (imageData.height/2)/2, width: imageData.width/2, height: imageData.height/2});
            var ratioWidth = imageData.width/imageData.naturalWidth;
            if(imageData.naturalHeight < 630) {
              var ratioHeight = 1;
            }else{
              var ratioHeight = imageData.height/imageData.naturalHeight;
            }
            //
            var destCropWidth = (1200*ratioWidth); 
            var destCropHeight = (630*ratioHeight);
            //
            var centerCropBoxWidth = (imageData.width-destCropWidth)/2;
            var centerCropBoxHeight = (imageData.height-destCropHeight)/2;
            $($ori_image).cropper("setCropBoxData", {left: centerCropBoxWidth, top: centerCropBoxHeight, width: destCropWidth, height: destCropHeight});
          }
        });
    });
    // function down_crop_image()
    // {
    //   // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
    //   $('#ori_image').cropper('getCroppedCanvas').toBlob(function (blob) {
    //     var formData = new FormData();

<<<<<<< HEAD
    function down_crop_image()
    {
      // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
      $().cropper('getCroppedCanvas').toBlob(function (blob) {
        var formData = new FormData();

        formData.append('croppedImage', blob);
=======
    //     formData.append('croppedImage', blob);
>>>>>>> 2a1e83305b6c0aa30a266b614650afa4afc795c7

    //     $.ajax('./images/upload', {
    //       method: "POST",
    //       data: formData,
    //       processData: false,
    //       contentType: false,
    //       success: function () {
    //         console.log('Upload success');
    //       },
    //       error: function () {
    //         console.log('Upload error');
    //       }
    //     });
    //   });      
    // }
  </script>
  <script src="../lib/Cropper/js/main.js"></script>
</body>
</html>
