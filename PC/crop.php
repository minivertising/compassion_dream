<?php

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */



// If not a POST request, display page below:

?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Cropping Demo</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <!-- <link rel="stylesheet" href="../lib/Jcrop/css/main.css" type="text/css" />
  <link rel="stylesheet" href="../lib/Jcrop/css/demos.css" type="text/css" /> -->
  <link rel="stylesheet" href="../lib/Jcrop/css/jquery.Jcrop.css" type="text/css" />
  <style type="text/css">
    #target {
      background-color: #ccc;
      /*width: 80%;
      height: 80%;*/
      font-size: 24px;
      display: block;
    }
  </style>
  <script src="../lib/Jcrop/js/jquery.min.js"></script>
  <script src="../lib/Jcrop//js/jquery.Jcrop.js"></script>
</head>
<body>

  <div class="container">
    <div class="row">
          <!-- This is the image we're attaching Jcrop to -->
          <img src="../lib/Jcrop/css/picture.jpg" id="target" />

          <input type="button" onclick="crop_download();return false;" value="Crop Image" class="btn btn-large btn-inverse" />
   </div>
 </div>

 <script>
  var $myImage = $('#target');
    console.log(
      $myImage.prop("naturalWidth") +'\n'+
      $myImage.prop("naturalHeight") +'\n'+ 
      $myImage.prop("width") +'\n'+         
      $myImage.prop("height") +'\n'+       
      $myImage.prop("x") +'\n'+             
      $myImage.prop("y")                    
      );
  var x,y,x2,y2,w,h;
  $(function(){
    $('#target').Jcrop({
      allowSelect: false,
      allowResize: false,
      // onSelect: showCoords,
      onSelect: updateCoords,
      setSelect: [ 0, 0, 400, 210 ]
      
      // trueSize: [originalImageWidth, originalImageHeight],
    });
    
  });
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

  function crop_download(){
    $.ajax({
      url: './download.php',
      type: 'POST',
      data: { 'x':x,
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
  };


  </script>
</body>

</html>
