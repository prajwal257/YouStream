<?php
    require_once '..\DB_scripts\connect_to_DB.php';
    $video_id = $_POST['video_id'];
    $user_id = $_POST['user_id'];
    $total_likes = $_POST['likes'];
    $total_likes++;
    $datetime = date("Y-m-d H:i:s");
    echo "UPDATE `watch_progress` SET `like_status`= '1', `date`='" . $datetime . "' WHERE `userid`= " . $user_id . " AND `videoid`= " . $video_id;
    $query = "UPDATE `watch_progress` SET `like_status`= '1', `date`='" . $datetime . "' WHERE `userid`= " . $user_id . " AND `videoid`= " . $video_id;
    $result = mysqli_query($connect, $query);
    // if($result->fetch_assoc()){
    //     $query = "UPDATE `videos` SET `dislikes`= ".$total_dislikes." WHERE `videoid`= " . $video_id;
    //     echo "UPDATE `videos` SET `dislikes`= ".$total_dislikes." WHERE `videoid`= " . $video_id;
    //     $result = mysqli_query($connect, $query);
    // }
    $query = "UPDATE `videos` SET `likes`= ".$total_likes." WHERE `videoid`= " . $video_id;
    $result = mysqli_query($connect, $query);