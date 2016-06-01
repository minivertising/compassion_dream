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
</head>
<body>

  <!-- This is the image we're attaching Jcrop to -->
  <img src="./images/picture.jpg" id="target" style="width:600px; height:315px"/>
  <input type="file" id="photograph" />
  <input type="button" onclick="crop_download();return false;" value="Crop Image"/>
  <!-- <div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()"/></div> -->

</body>

</html>
<script>


  $(function(){
    crop_init();
    $("#photograph").change(function()
    {
     console.log("change event called!");
     readURL(this);
    });
  });

// IE8 대응 이미지 원래 사이즈 알아내는 함수
  function getImgSize($myImage) 
  {
    var size = { 
      width : $myImage.prop("width"), height : $myImage.prop("height"), 
      naturalWidth : 0, naturalHeight : 0 
    };

    if ($myImage.prop('naturalWidth') == undefined) {
      var $tmpImg = $('<img/>').attr('src', $myImage.attr('src'));
      size.naturalWidth = $tmpImg[0].width;
      size.naturalHeight = $tmpImg[0].height;
    } else {
      size.naturalWidth = $myImage.prop('naturalWidth');
      size.naturalHeight = $myImage.prop('naturalHeight');                
    }
    return size;
  };


  function crop_init() {
    var $myImage = $('#target');
    var size = getImgSize($myImage);
    var x,y,x2,y2,w,h;
    var selectX,selectY,selectX2,selectY2;
    var jcrop_api;
    selectX = size.naturalWidth/2 - size.naturalWidth*0.8/2;
    selectY = size.naturalHeight/2 - size.naturalHeight*0.8/2;
    selectX2 = selectX + size.naturalWidth*0.8;
    selectY2 = selectY + size.naturalHeight*0.8;

    $($myImage).Jcrop({
      allowSelect: false,
      allowResize: false,
          // onSelect: showCoords,
          // setSelect: [(size.naturalWidth-(size.naturalWidth*0.8))/2, 30, size.naturalWidth*0.8, size.naturalHeight*0.8 ],
          setSelect: [selectX, selectY, selectX2, selectY2],
          onSelect: updateCoords,
          // trueSize: [$myImage[0].naturalWidth, $myImage[0].naturalHeight],
          trueSize: [size.naturalWidth, size.naturalHeight],
          // trueSize: [naturalImageData[0], naturalImageData[1]],
          aspectRatio: 1200/630
        }, function(){
          jcrop_api = this;
          console.log(jcrop_api.getOptions());
        });

  }

  function readURL(input) 
  { 
    console.log("readURL"); 
    if (input.files && input.files[0])
    {
     var reader = new FileReader();
     reader.onload = function (e) 
      {
        $('#target').attr('src', e.target.result);
        // $('img').attr('src', e.target.result);
        console.log("inside if =>"+e.target.result); 
        // Call after source setted and image file loaded
        crop_init();
      }
    console.log("outside IF");
    reader.readAsDataURL(input.files[0]); 
    }
  }

  function updateCoords(c)
  {
    x=c.x;
    y=c.y;
    x2=c.x2;
    y2=c.y2;
    w=c.w;
    h=c.h;
      // alert(x+","+y+","+x2+","+y2+","+w+","+h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

  // function showCoords(c)
  // {
  //     // variables can be accessed here as
  //     alert(c.x+" "+c.y+" "+c.x2+" "+c.y2+" "+c.w+" "+c.h);
  // };


  function crop_download()
  {
    $.ajax({
      url: './download.php',
      type: 'POST',
      data: { 
        'x':x,
        'y':y,
        'x2':x2,
        'y2':y2,
        'w':w,
        'h':h
      },
      success: function(res){
        alert(res);
      }
    });
  }

</script>
