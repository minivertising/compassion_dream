<?php
	// var_dump($_FILES);
	$file = $_FILES['file']['tmp_name'];
	$targ_src = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];
	// 올린 파일이 이미지인지 검증이 필요할듯합니다.



    $exif = exif_read_data($file); // 추가
    print_r($exif); // 추가 





  	$sTempFileName = './tmp_images/' . md5(time().rand());
    // move uploaded file into cache folder
    move_uploaded_file($file, $sTempFileName);

    @chmod($sTempFileName, 0644);

    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
        $aSize = getimagesize($sTempFileName); // try to obtain image info
        if (!$aSize) {
            @unlink($sTempFileName);
            return;
        }

        // check for image type
        switch($aSize[2]) {
            case IMAGETYPE_JPEG:
                $sExt = '.jpg';

                // create a new image from file 
                $vImg = @imagecreatefromjpeg($sTempFileName);
                break;
            case IMAGETYPE_PNG:
                $sExt = '.png';

                // create a new image from file 
                $vImg = @imagecreatefrompng($sTempFileName);
                break;
            default:
                @unlink($sTempFileName);
                return;
        }
        // create a new true color image
        $vDstImg = @imagecreatetruecolor( $aSize[0], $aSize[1] );

        // copy and resize part of an image with resampling
        imagecopyresampled($vDstImg, $vImg, 0, 0, 0, 0, $aSize[0], $aSize[1], $aSize[0], $aSize[1]);

        // define a result image filename
        $sResultFileName = $sTempFileName . ".jpg";

        // output image to file
        imagejpeg($vDstImg, $sResultFileName, 85);
        @unlink($sTempFileName);

        echo $sResultFileName;
    }

?>