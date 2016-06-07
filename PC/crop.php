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
  <img src="./images/picture.jpg" id="target" class="crop" style="width:600px; height:315px"/>
  <input type="file" id="fileUp" name="fileData" accept="image/*"/>
  <input type="button" onclick="crop_download();return false;" value="Crop Image"/>
  <!-- <input type="button" onclick="image_change();return false;" value="Image Change"/> -->
</body>

</html>
<script>
  var fileSrc;

  $(function(){
    crop_init();
  });

  function crop_init()
  {
    var $myImage = $('#target');
    var size = getImgSize($myImage);
    var x,y,x2,y2,w,h;
    var selectX,selectY,selectX2,selectY2;
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
      });
  }

// });

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#target').attr('src', e.target.result);
                crop_init();
                // $('.crop').Jcrop({
      
                //   onSelect: updateCoords,
                    
                //         bgOpacity:   .4,
                //         setSelect:   [ 100, 100, 50, 50 ],
                //         aspectRatio: 16 / 9
                // });
            }
            fileSrc = input.files[0].name;
            reader.readAsDataURL(input.files[0]);          
        }else{
          var img_path = "";
          if (input.value.indexOf("\\fakepath\\") < 0) {
            alert("if");
              img_path = input.value;
          } else {
              input.select();
              var selectionRange = document.selection.createRange();
              img_path = selectionRange.text.toString();
              input.blur();
          }
          console.log(input.value);
        }
    }
    
    $("#fileUp").change(function(){
      if($('#target').data('Jcrop')){
        $('#target').data('Jcrop').destroy();
      }
        // console.log(this);
        readURL(this);
    });

// $("#fileUp").change(function(){
//   var beforeImageSrc = $('#target')[0].src;
//   console.log(this);
//   $('#target').data('Jcrop').destroy();
//   readURL(this);
// });


// function readURL(input) {
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();
//     reader.onload = function (e) {
//         // $('#target').data('Jcrop').destroy();
//       $('#target').attr('src', e.target.result);
//         // $('#target').attr('src', './images/sago.jpg');
//     }
//     reader.readAsDataURL(input.files[0]);
//   }
// }



// function image_change()
// {
//   $('#target').data('Jcrop').destroy();
//   $('#target').attr('src', './images/sago.jpg');
//   crop_init();
// }

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
  // alert(fileSrc);
  $.ajax({
    url: './download.php',
    type: 'POST',
    data: {
      'target_src':fileSrc,
      'x':x,
      'y':y,
      'x2':x2,
      'y2':y2,
      'w':w,
      'h':h
    },
    success: function(res){
      alert(res);
      // console.log(res);
    }
  });
}

</script>
