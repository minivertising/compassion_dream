<?php
   // var_dump($_FILES);
   $file = $_FILES['file']['tmp_name'];
   $targ_src = $_FILES['file']['name'];
   $file_type = $_FILES['file']['type'];

   // 올린 파일이 이미지인지 검증이 필요할듯합니다.
    switch ($file_type) {
        case 'image/jpg':
            $ext = ".jpg";
            break;
        case 'image/jpeg':
            $ext = ".jpg";
            break;
        case 'image/png':
            $ext = ".png";
            break;
        default:
            return;
    }

    // $sTempFileName = './tmp_images/' . md5(time().rand());
    $sTempFileName = './tmp_images/' . md5(time().rand()).$ext;
    if(move_uploaded_file($file, $sTempFileName))
    {

        @chmod($sTempFileName, 0777);

        if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
            $aSize = getimagesize($sTempFileName); // try to obtain image info
            if (!$aSize) {
                @unlink($sTempFileName);
                return;
            }

                // check for image type
                switch($aSize[mime]) {
                    case "image/jpeg":
                        // create a new image from file 
                        $img = imagecreatefromjpeg($sTempFileName);
                        break;
                    case "image/png":
                        // create a new image from file 
                        $img = imagecreatefrompng($sTempFileName);
                        imagejpeg($img, $sTempFileName, 90);
                        break;
                    default:
                        @unlink($sTempFileName);
                        return;
                }
            $exif = exif_read_data($sTempFileName);
            if( isset($exif['Orientation']) )
                $orientation = $exif['Orientation'];
            elseif( isset($exif['IFD0']['Orientation']) )
                $orientation = $exif['IFD0']['Orientation'];
            else
                $orientation = 0;
            //echo "====>".$orientation;exit;
            switch($orientation)
            {
                case 3: // 180 rotate left
                $newimg = imagerotate($img, 180, -1);
                break;
         
                case 6: // 90 rotate right
                $newimg = imagerotate($img, -90, -1);
                break;
         
                case 8:    // 90 rotate left
                $newimg = imagerotate($img, 90, -1);
                break;
         
                case 0:    // 90 rotate left
                $newimg = imagerotate($img, 0, 0);
                break;
            }


            //$sResultFileName = $sTempFileName;
            imagejpeg($newimg, $sTempFileName, 85);
        }
             $sResultFileName = $sTempFileName;

    }else{
        echo $error_message = 'Error: Upload Unsuccessful<br />Please Try Again';
    }
   

    echo $sResultFileName;













    

    // //fix the Orientation if EXIF data exist
    // if(!empty($exif['Orientation'])) {
    //     switch($exif['Orientation']) {
    //         case 8:
    //             $rotatedImage = imagerotate($image,90,0);
    //             break;
    //         case 3:
    //             $rotatedImage = imagerotate($image,180,0);
    //             break;
    //         case 6:
    //             $rotatedImage = imagerotate($image,-90,0);
    //             break;
    //     }
    // }
        

    // @chmod($rotatedImage, 0644);

    // if (file_exists($rotatedImage) && filesize($rotatedImage) > 0) {
    //     $aSize = getimagesize($rotatedImage); // try to obtain image info
    //     if (!$aSize) {
    //         @unlink($rotatedImage);
    //         return;
    //     }

    //     // check for image type
    //     switch($aSize[2]) {
    //         case IMAGETYPE_JPEG:
    //             $sExt = '.jpg';

    //             // create a new image from file 
    //             $vImg = @imagecreatefromjpeg($rotatedImage);
    //             break;
    //         case IMAGETYPE_PNG:
    //             $sExt = '.png';

    //             // create a new image from file 
    //             $vImg = @imagecreatefrompng($rotatedImage);
    //             break;
    //         default:
    //             @unlink($rotatedImage);
    //             return;
    //     }
    //     // create a new true color image
    //     $vDstImg = @imagecreatetruecolor( $aSize[0], $aSize[1] );

    //     // copy and resize part of an image with resampling
    //     imagecopyresampled($vDstImg, $vImg, 0, 0, 0, 0, $aSize[0], $aSize[1], $aSize[0], $aSize[1]);

    //     // define a result image filename
    //     $sResultFileName = $rotatedImage . ".jpg";

    //     // output image to file
    //     imagejpeg($vDstImg, $sResultFileName, 85);
    //     @unlink($rotatedImage);

    //     echo $sResultFileName;
    // }

?>