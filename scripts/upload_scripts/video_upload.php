<?php
    session_start();
    require_once("../upload_scripts/video_files_check.php");
    //inserting video into the DB.
    function uploadVideoDetails($video, $connect){
        $date="" . date("Y/m/d");

        //using PDO, prepared statement.
        $stmt = $connect->prepare('INSERT INTO `videos`(`title`, `description`, `length`, `tag`, `date`) VALUES ( ?, ?, ?, ?, ?)');
        $stmt->bind_param("ssiss", $video->title, $video->desc, $video->length, $video->catagory, $date);
        //executing the above query.
        $stmt->execute();

        $video->id = mysqli_insert_id($connect);
        return $video->id;
    }
    //inserting the extisting artist into video_artists table.
    function uploadArtistID($i, $video, $connect){
        //this function basically just uploads artistid and videoid into artist-video table.
        $date =  date("Y-m-d");
        //using PDO, prepared statement.
        $stmt = $connect->prepare('INSERT INTO `video_artists`(`videoid`, `artistid`, `role`, `date`) VALUES (?, ?, ?, ?)');
        $stmt->bind_param("iiss", $video->id, $video->artist_id[$i], $video->artist_role[$i], $date);
        //executing the above query.
        $stmt->execute();

        $video->artist_id[$i] = mysqli_insert_id($connect);
        $stmt = "INSERT INTO `artists` (`tag`) VALUE ('" . $video->artist_id[$i] . "') WHERE `artistid`=" . $video->artist_id[$i];
        $result = mysqli_query($connect, $stmt);
        echo $result;

        //return $video->artist_id[$i];
    }
    //inserting the new artist into artists table.
    function uploadNewArtist($i, $video, $connect){

        $date =  date("Y-m-d");
        //using PDO, prepared statement.
        $stmt = $connect->prepare('INSERT INTO `artists`(`name`, `description`, `social`) VALUES (?, ?, ?)');
        $stmt->bind_param("sss", $video->artist_name[$i], $video->artist_desc[$i], $video->artist_social[$i]);
        //executing the above query.
        $stmt->execute();

        //returns the artist id here.
        $video->artist_id[$i] = mysqli_insert_id($connect);
        
        //upload all artist files.
        uploadArtistFiles($video->artist_name[$i], $video->artist_profile[$i], $video->artist_cover[$i]);
        
        //upload artist ID and video ID into artist-video table.
        uploadArtistID($i, $video, $connect);

        //making the ARTISTTAG and inserting it into the DB.
        //UPDATE `artists` SET `tag`='Kailash.1' WHERE `artistid` = 1
        $artist_firstname = explode(' ',$video->artist_name[$i]);
        $artistTag= strtolower($artist_firstname[0]);
        $artistTag = $artistTag . '.' . $video->artist_id[$i];
        $query = 'UPDATE `artists` SET `tag`=' . $artistTag . ' WHERE `artistid` =' . $video->artist_id[$i];
        mysqli_query($connect, $query); 
        
        return $video->artist_id[$i];
    }
    function uploadVideoFiles($video){

        echo "<br>INSIDE THE UPLOAD THE VIDEO FILES FUNCTION.<br>";
        $video->getFiles();

        //for thumbnail
        $thumbnailExt= explode('.',$video->thumbnail_image['name']);
        $thumbnailActualExt= strtolower(end($thumbnailExt));
        //for cover
        $coverExt= explode('.',$video->cover_image['name']);
        $coverActualExt= strtolower(end($coverExt));
        //for video
        $videoExt= explode('.',$video->file['name']);
        $videoActualExt= strtolower(end($videoExt));

        //So now we can upload the files but we cannot use the most suitable videoID for storage because this will be shipped to client and its a DB generated value.
        //Shutup its just a MVP.

        //processing thumbnail image.
        $thumbNewName = $video->id . '-thumbnail' . '.' .$thumbnailActualExt;
        $thumbDes = "../../data/videos/" . $video->catagory . "/thumbnail_images/" .$thumbNewName;
        echo "<br>Complete path of thumbnail of video<br>" . $thumbDes;
        move_uploaded_file($video->thumbnail_image['tmp_name'], $thumbDes);
        //processing cover image.
        $coverNewName = $video->id . '-cover' . '.' .$coverActualExt;
        $coverDes = "../../data/videos/" . $video->catagory . "/cover_images/" .$coverNewName;
        echo "<br>Complete path of cover image of video<br>" . $coverDes;
        move_uploaded_file($video->cover_image['tmp_name'], $coverDes);
        //processing video file.
        $videoNewName = $video->id . '-video' . '.' .$videoActualExt;
        $videoDes = "../../data/videos/" . $video->catagory . "/video_file/" .$videoNewName;
        echo "<br>Complete path of video file of video<br>" . $videoDes;
        move_uploaded_file($video->file['tmp_name'], $videoDes);
        //query the Db for any video with all same properities.
        echo "success";
        return true;
    }
    function uploadArtistFiles($artistName, $artist_profile_img, $artist_cover_img){

        //checking video files once more.
        echo "inside video upload<br>";
        //for thumbnail
        $profileExt= explode('.',$artist_profile_img['name']);
        $profileActualExt= strtolower(end($profileExt));
        //for cover
        $coverExt= explode('.',$artist_cover_img['name']);
        $coverActualExt= strtolower(end($coverExt));

        //processing thumbnail image.
        $thumbNewName = $artistName . '-thumbnail' . '.' .$profileActualExt;
        $thumbDes = "../../data/artists/thumbnail_images/" .$thumbNewName;
        echo $thumbDes;
        move_uploaded_file($artist_profile_img['tmp_name'], $thumbDes);

        //processing cover image.
        $coverNewName = $artistName . '-cover' . '.' .$coverActualExt;
        $coverDes = "../../data/artists/cover_images/" .$coverNewName;
        echo $coverDes;
        move_uploaded_file($artist_cover_img['tmp_name'], $coverDes);
        echo "Success";
        return true;
    }