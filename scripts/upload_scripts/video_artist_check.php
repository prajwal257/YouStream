<?php
    session_start();
    function checkArtistID($i, $video, $connect, $mode){
        if($mode=='l'){
            $location = "Location: ../../pages/light/upload.php?";
        }
        else{
            $location = "Location: ../../pages/dark/upload.php?";
        }
        //first we check for empty values in artistID section of default artist.
        if(!empty($video->artist_id[$i]) && empty($video->artist_role[$i])){
            header($location.'error=Artist role was left vacant in section of artist ' . ($i+1) .'.');
            exit();
        }
        //Now we parse the input necessary for preventing SQL injections.
        if( !preg_match("/^[a-z 0-9 . A-Z]*$/", $video->artist_id[$i]) || !preg_match("/^[a-z A-Z]*$/", $video->artist_role[$i])){
            // echo $video->artist_ID . " and " . $video->artist_role;
            header($location.'error=Some incorrect values were entered in section of artist ' . ($i+1) .'.');
            exit(); 
        }
        //check if such artist exists in the DB.
        $sql = 'SELECT * FROM `artists` WHERE `artistid` =' . $video->artist_id[$i] ;
        $result = mysqli_query($connect, $sql);
        if($result->num_rows == 0){
            header($location .'error=No artist found with same @artistTag as artist ' . ($i+1) . '.');
            exit();
        }
        else if($result->num_rows > 1){
            //this should not happen.
            header($location .'error=More than one artists found with same @artistTag as artist ' . ($i+1) .'.');
            exit();
        }
        echo "artistID check passed";
        //if we are here then everything is good. Now we return true so that next function can upload the videoID, Role and date.
    }

    function checkArtistNew($i, $video, $connect, $mode){
        if($mode=='l'){
            $location = "Location: ../../pages/light/upload.php?";
        }
        else{
            $location = "Location: ../../pages/dark/upload.php?";
        }
        //checking for any empty values.
        if(empty($video->artist_name[$i]) ||empty($video->artist_desc[$i]) ||empty($video->artist_role[$i]) || empty($video->artist_profile[$i]['name']) || empty($video->artist_cover[$i]['name'])){
            //$video->getArtistNew( 0 );
            header($location .'error=All the feilds are required for Artist 1 if you are inserting new Artist.' );
            exit();
        }
        //Now we parse the input necessary for preventing SQL injections.
        if( !preg_match("/^[a-z 0-9 A-Z]*$/", $video->artist_name[$i]) || !preg_match("/^[a-z . 0-9 A-Z]*$/", $video->artist_role[$i])){
            //to check what is wrong in the input.
            $error = "There are some incorrect symbols in ";
            if(!preg_match("/^[a-z 0-9 A-Z]*$/", $video->artist_name[$i])){
                $error = $error . "Artist Name ";
            }
            // if(!preg_match("/^[a-z . , 0-9 A-Z]*$/", $video->artist_desc[$i])){
            //     $error = $error . "Artist Description ";
            // }
            if(!preg_match("/^[a-z . 0-9 A-Z]*$/", $video->artist_role[$i])){
                $error = $error . "Artist Role ";
            }
            header($location ."error=". $error . 'section of artist ' . ($i+1) .'.');
            exit(); 
        }
        //check if such artist exists in the DB.
        $sql = 'SELECT * FROM `artists` WHERE `name` = "'. $video->artist_name[$i] .'"';
        $result = mysqli_query($connect, $sql);
        if($result->num_rows >= 1){
            //we still need to handle this situation tho.
            header($location .'error=One or more than one artists found with same name as artist ' . ($i+1) .'.');
            exit();
        }
        echo "artistNew check passed";
        //if we are here then everything is good. Now we return true so that next function can upload the videoID, Role and date.
    }