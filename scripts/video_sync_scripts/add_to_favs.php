<?php
    require_once '..\DB_scripts\connect_to_DB.php';
    $video_id = $_POST['video_id'];
    $user_id = $_POST['user_id'];
    $datetime = date("Y-m-d H:i:s");
    echo "UPDATE `watch_progress` SET `fav`= 'true', `date`='" . $datetime . "' WHERE `userid`= " . $user_id . " AND `videoid`= " . $video_id;
    $query = "UPDATE `watch_progress` SET `fav`= 1, `date`='" . $datetime . "' WHERE `userid`= " . $user_id . " AND `videoid`= " . $video_id;
    $result = mysqli_query($connect, $query);