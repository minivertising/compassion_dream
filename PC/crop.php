<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Cropping Demo</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <!-- <link rel="stylesheet" href="../lib/Jcrop/css/main.css" type="text/css" /> -->
  <!-- <link rel="stylesheet" href="../lib/Jcrop/css/demos.css" type="text/css" /> -->
  <link rel="stylesheet" href="../lib/Jcrop/css/jquery.Jcrop.css" type="text/css" />
  <script src="../lib/Jcrop/js/jquery.min.js"></script>
  <script src="../lib/Jcrop/js/jquery.Jcrop.js"></script>
</head>
<body>

          <!-- This is the image we're attaching Jcrop to -->
          <img src="../lib/Jcrop/css/picture.jpg" id="target2" style="width:100%;height:100%"/>

          <input type="button" onclick="crop_download();return false;" value="Crop Image" class="btn btn-large btn-inverse" />

</body>

</html>
 <script>
 $(window).load(function(){

 var $myImage = $('#target2');
    // console.log(
 //      $myImage.prop("naturalWidth") +'\n'+
 //      $myImage.prop("naturalHeight") +'\n'+ 
      // $myImage.prop("width") +'\n'+         
      // $myImage.prop("height") +'\n'+
 //      $myImage.prop("x") +'\n'+             
 //      $myImage.prop("y")                    
      // );
  var x,y,x2,y2,w,h;
  $(function(){
    var jcrop_api;
    $('#target2').Jcrop({
      allowSelect: false,
      allowResize: false,
      // onSelect: showCoords,
      onSelect: updateCoords,
      setSelect: [ 0, 0, 400, 210 ],
      trueSize: [$myImage.prop("naturalWidth"), $myImage.prop("naturalHeight")]
    },
    function(){
      jcrop_api = this;
    });
    var naturalImageData = jcrop_api.getBounds();
    var afterImageData = jcrop_api.getWidgetSize();
    var scaleFactor = jcrop_api.getScaleFactor();
    console.log(naturalImageData);
    console.log(afterImageData);
    console.log(scaleFactor);
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
