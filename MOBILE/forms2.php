<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            var api;

            $('#target').Jcrop({
              // start off with jcrop-light class
              bgOpacity: 0.5,
              bgColor: 'white',
              addClass: 'jcrop-light'
            },function(){
              api = this;
              api.setSelect([130,65,130+350,65+285]);
              api.setOptions({ bgFade: true });
              api.ui.selection.addClass('jcrop-selection');
            });

            $('#buttonbar').on('click','button',function(e){
              var $t = $(this), $g = $t.closest('.btn-group');
              $g.find('button.active').removeClass('active');
              $t.addClass('active');
              $g.find('[data-setclass]').each(function(){
                var $th = $(this), c = $th.data('setclass'),
                  a = $th.hasClass('active');
                if (a) {
                  api.ui.holder.addClass(c);
                  switch(c){

                    case 'jcrop-light':
                      api.setOptions({ bgColor: 'white', bgOpacity: 0.5 });
                      break;

                    case 'jcrop-dark':
                      api.setOptions({ bgColor: 'black', bgOpacity: 0.4 });
                      break;

                    case 'jcrop-normal':
                      api.setOptions({
                        bgColor: $.Jcrop.defaults.bgColor,
                        bgOpacity: $.Jcrop.defaults.bgOpacity
                      });
                      break;
                  }
                }
                else api.ui.holder.removeClass(c);
              });
            });

          });
    //     function readURL(input) {
    //       console.log(input);
    //       if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             $('#target').attr('src', e.target.result);                
    //         }
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
</script>
</head>

<body>

    <div>
        <form method="post" enctype="multipart/form-data" id="ajaxForm">
            <img id="target" src="./images/no_detail_img.gif" width="1200" height="630">
            <input type="file" name="upload_file" onchange="readURL(this);"> 
           <!--  <input type="hidden" name="org_image_idx" value="<?=$contents_info[0]['main_cate_image']['idx'][$a]?>"> 
            <input type="hidden" name="org_image_cate0" value="<?=$contents_info[0]['main_cate_image']['cate0'][$a]?>"> 
            <input type="hidden" name="org_image_cate1" value="<?=$contents_info[0]['main_cate_image']['cate1'][$a]?>"> 
            <input type="hidden" name="org_image_cate2" value="<?=$contents_info[0]['main_cate_image']['cate2'][$a]?>"> 
            <input type="hidden" name="org_image_cate3" value="<?=$contents_info[0]['main_cate_image']['cate3'][$a]?>">  -->
            <input type="button" value="업로드" onclick="ajaxTo();">
        </form>

    </div>
    <script>
        function ajaxTo() {
            $('#ajaxForm').on('click', function(e){
                e.preventDefault();
                var fd = new FormData($(this)[0]);

                $.ajax({
                    url: "./upload2.php",
                    type: "POST",
                    data: fd,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        history.go(0);
                    }
                });
                return false;
            });
        }
    </script>

</body>

</html>
