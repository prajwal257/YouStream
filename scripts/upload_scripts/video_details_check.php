<?php
    session_start();
    
    //function to check for errors in video details. And also Search the DB for any simmilar videos.
    function checkVideoDetails($video, $mode){
        if($mode=='l'){
            $location = "Location: ../../pages/light/upload.php?";
        }
        else{
            $location = "Location: ../../pages/dark/upload.php?";
        }
        if(empty($video->title) || empty($video->desc) || empty($video->length) || empty($video->catagory)){
            header( $location.'error=One or more feilds of video details section was left empty.');
            exit();
        }
        if( !preg_match("/^[a-z 0-9 : A-Z]*$/", $video->title) || !preg_match("/^[0-9]*$/", $video->length) || !preg_match("/^[a-z A-Z]*$/", $video->catagory)){
            //to check what is wrong in the input.
            $error = "There are some incorrect symbols in ";
            if(!preg_match("/^[a-z 0-9 : A-Z]*$/", $video->title)){
                $error = $error . "video title ";
            }
            // if(!preg_match("/^[a-z 0-9 . , A-Z]*$/", $video->desc)){
            //     $error = $error . "video description ";
            // }
            if(!preg_match("/^[0-9]*$/", $video->length)){
                $error = $error . "video length ";
            }
            if(!preg_match("/^[a-z A-Z]*$/", $video->catagory)){
                $error = $error . "video catagory ";
            }
            header($location."error=". $error . 'section of video details.');
            exit();
        }
        //query the Db for any video with all same properities.
        $sql = 'SELECT * FROM `videos` WHERE `title` = "' . $video->title . '" AND `length` = "' . $video->length . '"  AND `tag` = "' . $video->catagory . '" ';
        //echo $sql;
    }