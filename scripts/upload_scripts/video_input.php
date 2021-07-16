<?php
    session_start();
    $mode = $_GET['m'];
    if($mode=='l'){
        $location = "Location: ../../pages/light/upload.php?";
    }
    else{
        $location = "Location: ../../pages/dark/upload.php?";
    }
    //checking if the submit button was pressed.
    if(!isset($_POST['submit'])){
        header( $location . 'You were trying to bypass upload page but I caught you.');
        exit();
    }
    
    //inlcuding all the files.
    require_once("../DB_scripts/connect_to_DB.php");
    require_once("./video_class.php");
    require_once("./video_details_check.php");
    require_once("./video_artist_check.php");
    require_once("./video_files_check.php");
    require_once("./video_upload.php");

    //begning the checking process... checking everything from video details, artist details, artist new files, video files.
    $video = new video();

    //taking video details.
    $video->setVideoDetails($_POST['video_title'], $_POST['video_desc'], $_POST['video_playback_time'], $_POST['catagory']);
    //checking video details.
    checkVideoDetails($video, $mode);
    $video->getVideoDetails();

    //checking artist details.
    class artist{
        public $id= array(3);
        public $role_id= array(3);

        public $name= array(3);
        public $desc= array(3);
        public $role= array(3);
        public $social= array(3);
        public $profile_image= array(3);
        public $cover_image= array(3);
    }
    $artist = new artist();
    for($i=1; $i<4; $i++){
        $artist->id[$i] = "artist_" . $i . "_ID";
        $artist->role_id[$i] = "artist_" . $i . "_role_id";

        $artist->name[$i] = "artist_" . $i . "_new_name";
        $artist->desc[$i] = "artist_" . $i . "_new_desc";
        $artist->role[$i] = "artist_" . $i . "_role";
        $artist->social[$i] = "artist_" . $i . "_new_social";
        $artist->profile_image[$i] = "artist_" . $i . "_new_profile_image"; //artist_1_new_profile_image
        $artist->cover_image[$i] = "artist_" . $i . "_new_cover_image"; //artist_1_new_cover_image
    }
    //We need a keyword to store how many artists were actually inputed.
    $artist_end_index = 3;
    for($i=0; $i<3; $i++){
        //checking if user compleatly left the form section.
        $form_index = ($i+1);
        if( empty($_POST[$artist->id[$form_index]]) && empty($_POST[$artist->name[$form_index]]) ){
            //OK he did but now I need to check if this section was compulsory or not.
            if($form_index==1){
                header( $location . 'Artist 1 is compulsory to fill.');
                exit();
            }
            else{
                $artist_end_index--;
                continue;
            }
        }
        //taking artist 0, 1, 2.
        if(!empty($_POST[$artist->id[$form_index]])){
            //inputing the artist ID and artist role.
            $video->setArtistID( $i, $_POST[$artist->id[$form_index]], $_POST[$artist->role_id[$form_index]]);
            echo "all values for id section are" . $_POST[$artist->id[$form_index]] . " " . $_POST[$artist->role_id[$form_index]];
            checkArtistID($i, $video, $connect, $mode);
        }
        else{
            //inputing the artist name, desc, role, files.
            $video->setArtistNew( $i, $_POST[$artist->name[$form_index]], $_POST[$artist->desc[$form_index]], $_POST[$artist->role[$form_index]], $_POST[$artist->social[$form_index]], $_FILES[$artist->profile_image[$form_index]], $_FILES[$artist->cover_image[$form_index]]);
            echo "inside video input<br>";
            $video->getArtistNew($i);
            checkArtistNew($i, $video, $connect, $mode);
        }
    }
    
    //taking video files as input.
    $video->setFiles($_FILES['video_thumbnail_image'], $_FILES['video_cover_image'], $_FILES['video_file']);
    //check video files.
    checkVideoFiles($video, $connect, $mode);
    // $video->getVideoDetails();

    //UPLOADING...

    //begin to upload the details and files into the database.
    $video->id = uploadVideoDetails($video, $connect);

    //upload artist details.
    for($i=0; $i<$artist_end_index; $i++){
        $form_index = ($i+1);
        //taking artist 0, 1, 2.
        if(!empty($_POST[$artist->id[$form_index]])){
            //upload the artistID and artist role into DB.
            uploadArtistID($i, $video, $connect);
        }
        else{
            //upload the new artist into DB.
            uploadNewArtist($i, $video, $connect);
        }
    }

    //uploading the video files.
    uploadVideoFiles($video);

    //redirecting back to video upload page with status successful.
    header( $location. 'success=true.');
    exit();