<style>
     #blah {
    background-color: #FFF;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }
</style>

    <form id="form1" runat="server">
        <input type='file' id="imgInp" />
        <img id="blah" class="crop" src="#" alt="your image" />
        <input type="hidden" id="x" name="x" />
      <input type="hidden" id="y" name="y" />
      <input type="hidden" id="w" name="w" />
      <input type="hidden" id="h" name="h" />
    </form>


    <script>
     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $('.crop').Jcrop({
      
                  onSelect: updateCoords,
                    
                        bgOpacity:   .4,
                        setSelect:   [ 100, 100, 50, 50 ],
                        aspectRatio: 16 / 9
                });
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
      if($('#blah').data('Jcrop')){
        $('#blah').data('Jcrop').destroy();
      }
        console.log(this);
        readURL(this);
    });

  function updateCoords(c)
  {
    console.log(c);
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };
    </script>