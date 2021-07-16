<?php
    require_once '..\DB_scripts\connect_to_DB.php';
    $video_id = $_POST['video_id'];
    $user_id = $_POST['user_id'];
    $progress = $_POST['progress'];
    $datetime = date("Y-m-d H:i:s");
    echo "UPDATE `watch_progress` SET `time`= " . $progress . ", `date`='" . $datetime . "' WHERE `userid`= " . $user_id . " AND `videoid`= " . $video_id;
    $query = "UPDATE `watch_progress` SET `time`= " . $progress . ", `date`='" . $datetime . "' WHERE `userid`= " . $user_id . " AND `videoid`= " . $video_id;
    $result = mysqli_query($connect, $query);