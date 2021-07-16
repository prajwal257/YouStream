<?php
    session_start();

    function checkVideoFiles($video, $connect, $mode){
        if($mode=='l'){
            $location = "Location: ../../pages/light/upload.php?";
        }
        else{
            $location = "Location: ../../pages/dark/upload.php?";
        }
        //checking for empty files...
        if(empty($video->thumbnail_image['name']) || empty($video->cover_image['name']) || empty($video->file['name'])){
            header($location . 'error=One or more feilds of video files section was left empty.');
            exit();
        }
        //checking for the extentions of the uploaded files...

        //for thumbnail
        $thumbnailExt= explode('.',$video->thumbnail_image['name']);
        $thumbnailActualExt= strtolower(end($thumbnailExt));
        //for thumbnail
        $coverExt= explode('.',$video->cover_image['name']);
        $coverActualExt= strtolower(end($coverExt));
        //for video
        $videoExt= explode('.',$video->file['name']);
        $videoActualExt= strtolower(end($videoExt));

        $allowed_images= array('jpg','jpeg','png');
        $allowed_video= array('mp4','ogg','webm');

        //check if the extention is allowed.
        if(!in_array($thumbnailActualExt, $allowed_images) || !in_array($coverActualExt, $allowed_images) || !in_array($videoActualExt, $allowed_video) ){
            //User uploaded somthing else.
            // echo $thumbnailActualExt . " " . $coverActualExt . " " . $videoActualExt;
            header($location . 'error=Some incorrect type of files were entered in video files section.');
            exit(); 
        }
        //so the extention is allowed.

        //Now checking for any king of file upload errors.
        if($video->thumbnail_image['error'] !=0 || $video->cover_image['error'] !=0 || $video->file['error'] !=0){
            //Some error in uploading process.
            header($location . 'error=Sorry there were some errors in the uploading process please let the developers know just mail this screenshot to prajwal.dwivedi.official@gmail.com.');
            exit(); 
        }
        //So there are no file errors here.

        //Now we check if simmilar video already exists in the DB.
        $sql = 'SELECT * FROM `videos` WHERE `title` = "' . $video->title . '" AND `length` = "' . $video->length . '"  AND `tag` = "' . $video->catagory . '" ';
        $result = mysqli_query($connect, $sql);
        if($result->num_rows >= 1){
            header($location . 'error=Already a video exists with same name in same catagory with same length.<br> Every 24 hours we conduct a audit and check for same MD5 hashes if found same then the uploade\'s account will be terminated without any further notice. In such case contact Admin.');
            exit();
        }
        //So this video is new and now we can upload this file to server. Returning True to give green light.
        return true;
    }   
    function checkVideoNotDB($i, $video, $mode){
        if($mode=='l'){
            $location = "Location: ../../pages/light/upload.php?";
        }
        else{
            $location = "Location: ../../pages/dark/upload.php?";
        }
        if(empty($video->artist_profile['name'][$i]) || empty($video->artist_cover['name'][$i]) ){
            // header('Location: ../../pages/upload.php?error=One or more feilds of video files section was left empty.');
            echo "checkVideoNotDB found that artist thubnail or cover image or missing";
            exit();
        }

        if(empty($video->thumbnail_image['name']) || empty($video->cover_image['name']) || empty($video->file['name'])){
            //header('Location: ../../pages/upload.php?error=One or more feilds of video files section was left empty.');
            echo "checkVideoNotDB found that artist thubnail or cover image or missing";
            exit();
        }
        //checking for the extentions of the uploaded files...

        //for thumbnail
        $thumbnailExt= explode('.',$video->thumbnail_image['name']);
        $thumbnailActualExt= strtolower(end($thumbnailExt));
        //for thumbnail
        $coverExt= explode('.',$video->cover_image['name']);
        $coverActualExt= strtolower(end($coverExt));
        //for video
        $videoExt= explode('.',$video->file['name']);
        $videoActualExt= strtolower(end($videoExt));

        $allowed_images= array('jpg','jpeg','png');
        $allowed_video= array('mp4','ogg','webm');

        //check if the extention is allowed.
        if(!in_array($thumbnailActualExt, $allowed_images) || !in_array($coverActualExt, $allowed_images) || !in_array($videoActualExt, $allowed_video) ){
            //User uploaded somthing else.
            // echo $thumbnailActualExt . " " . $coverActualExt . " " . $videoActualExt;
            header($location . 'error=Some incorrect type of files were entered in video files section.');
            exit(); 
        }
        //so the extention is allowed.

        //Now checking for any king of file upload errors.
        if($video->thumbnail_image['error'] !=0 || $video->cover_image['error'] !=0 || $video->file['error'] !=0){
            //Some error in uploading process.
            header($location . 'error=Sorry there were some errors in the uploading process please let the developers know just mail this screenshot to prajwal.dwivedi.official@gmail.com.');
            exit(); 
        }
        //So there are no file errors here.
        echo "passed through checkVideoFilesNotDB";
    }