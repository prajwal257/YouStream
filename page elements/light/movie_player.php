<?php
    if(!isset($_SESSION['userid']) || $_SESSION['userid']==0){
        echo '<div class="model">
                    <div class="message">
                        <div class="row">
                            <div class="indicator error"></div>
                                <h1>ERROR</h1>
                                    <div class="error_statements">';
                                        echo '<p>You are logged in as Guest as the result all the advanced such as liking, disliking, reporting, etc are disabled. Try logging in.</p>';
                                echo '</div>
                        </div>
                        <div class="row_buttons">
                            <button type="submit" class="submit_error secondary_button">OK</button>
                        </div>
                    </div>
                </div>';
        $_SESSION['userid']=0;
        $lock=true;
    }
    else{
        $lock=false;
    }
    require_once("../../scripts/DB_scripts/connect_to_DB.php");
    $video_id = $_GET['v_id'];
    $video_location = $_GET['v_tag'];
    
    $date=date("Y-m-d H:i:s");
    $query = "SELECT * FROM `videos` WHERE `videoid`=" . $video_id;
    $result = mysqli_query($connect, $query);
    $row = $result->fetch_assoc();
    $total_likes = $row['likes'];
    $total_dislikes = $row['dislikes'];
    $total_views = $row['watched'];
    $watched = $row['watched'] + 1;
    $query = "UPDATE `videos` SET `watched`=" . $watched . " WHERE `videoid`=" . $video_id;
    mysqli_query($connect, $query);
    $query = "SELECT * FROM `video_artists` WHERE `videoid`=" . $video_id;
    $result_artists = mysqli_query($connect, $query);
    $query = "SELECT * FROM `watch_progress` WHERE `userid`=" . $_SESSION['userid'] . " AND `videoid`=" . $video_id;
    $watch_progress_query_results = mysqli_query($connect, $query);
    if($watch_progress_query_results->num_rows==0){
        //inserting the watch progress in here.
        $query = "INSERT INTO `watch_progress` (`videoid`, `userid`) VALUE (" . $video_id . ", " . $_SESSION['userid'] . ")";
        mysqli_query($connect, $query);
        $seekTo = 0;
    }
    else{
        //these lines fetch the progress of video if it is already saved inside the DB.
        $row_time = mysqli_fetch_assoc($watch_progress_query_results);
        $seekTo = $row_time['time'];
        $like_status = $row_time['like_status'];
        if($like_status==1){
            //video is liked so handle that event.
            $liked_video = 'style="background-color: rgb( 255, 137, 68)";';
            $disliked_video = "";
        }
        else if($like_status==0){
            //nither like nor disliked.
            $liked_video = "";
            $disliked_video = "";
        }
        else{
            //video is disliked so handle that style.
            $liked_video = "";
            $disliked_video = 'style="background-color: rgb( 255, 137, 68)";';
        }
        if($row_time['fav']==1){
            $fav_video = 'style="background-color: rgb( 255, 137, 68)";';
        }
        else{
            $fav_video = '';
        }
    }
?>
<div class="media_area">
    <div class="play_area">
        <?php
            echo '<video autoplay src="../../data/videos/' . $video_location . '/video_file/' . $video_id . '-video.mp4#t=' . $seekTo . '" class="movie_player" autoplay controls></video>';
        ?>
    </div>
    <?php 
    if($lock==true){
        //locking every feature...
        echo '<div class="comment_area" style="display: none">';
    } 
    else{
        echo '<div class="comment_area">';
    }
    ?>
        <div class="buttons">
            <div class="like" <?php echo $liked_video; ?>>
                <img src="../../assets/move-playing-icons/like-light.png" alt="like this video">
            </div>
            <div class="like" <?php echo $disliked_video; ?>>
                <img src="../../assets/move-playing-icons/dislike-light.png" alt="like this video">
            </div>
            <div class="like" <?php echo $fav_video; ?>>
                <img src="../../assets/move-playing-icons/add-light.png" alt="like this video">
            </div>
        </div>
        <div class="comment_section">
            <h1>Comments:</h1>
            <div class="comments">
                <div class="comment">
                    <div class="user">
                        <div class="user_pic">
                            <img src="../../assets/nav_icons/user_account-light.png" alt="user profile pic">
                        </div>
                        <div class="username">
                            User Name
                        </div>
                    </div>
                    <div class="comment_text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, eveniet. Totam, est ab! Recusandae dolorem asperiores, eaque veritatis eum ratione?
                    </div>
                    <div class="buttons">
                        <div class="like">
                            <img src="../../assets/move-playing-icons/like-light.png" alt="like this video">
                        </div>
                        <div class="like">
                            <img src="../../assets/move-playing-icons/dislike-light.png" alt="like this video">
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <div class="user">
                        <div class="user_pic">
                            <img src="../../assets/nav_icons/user_account-light.png" alt="user profile pic">
                        </div>
                        <div class="username">
                            User Name
                        </div>
                    </div>
                    <div class="comment_text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum, eveniet. Totam, est ab! Recusandae dolorem asperiores, eaque veritatis eum ratione?
                    </div>
                    <div class="buttons">
                        <div class="like">
                            <img src="../../assets/move-playing-icons/like-light.png" alt="like this video">
                        </div>
                        <div class="like">
                            <img src="../../assets/move-playing-icons/dislike-light.png" alt="like this video">
                        </div>
                    </div>
                </div>
            </div>
            <div class="addComment">
                <input type="text" name="comment" class="addComment" placeholder="Write a Comment">
                <input type="submit" name="submit" class="submit">
            </div>
        </div>
    </div>
    <div class="video_details">
        <h1><?php echo $row['title'] ?></h1>
        <p><?php echo $row['description'] ?></p>
    </div>
</div>
<div class="movie_info_section">
<div class="row_3">
            <div class="newly_arrived_section">
                <h2 class="head_text">
                    Credits:
                </h2>
                <div class="list_of_media">
                    <div class="left_arrow"></div>
                    <div class="list">
                        <?php
                            for($i=0; $i<$result_artists->num_rows; $i++){
                                $artists = $result_artists->fetch_assoc();
                                $query = "SELECT * FROM `artists` WHERE `artistid`=". $artists['artistid'];
                                $result = mysqli_query($connect, $query);
                                $artist = $result->fetch_assoc();
                                echo'<div class="item">
                                        <div class="item_img">
                                            <img src="../../data/artists/thumbnail_images/' . $artist['name'] . '-thumbnail.jpg">
                                        </div>
                                        <div class="item_desc">
                                            <h4>' . $artist['name'] . '</h4>
                                            <p>' . $artists['role'] . '</p>
                                        </div>
                                    </div>';
                            }
                        ?>
                    </div>
                    <div class="right_arrow"></div>
                </div>
            </div>
        </div>
</div>
<script>
    let user_id = <?php echo $_SESSION['userid']; ?>;
    let video_id = <?php echo $row['videoid']; ?>;
    var like_video = document.getElementsByClassName("like")[0];
    var dislike_video = document.getElementsByClassName("like")[1];
    var add_to_favs = document.getElementsByClassName("like")[2];
    like_video.addEventListener("click", function(){
        like_video.style.backgroundColor = "rgb( 255, 137, 68)";
        dislike_video.style.backgroundColor = "rgb( 56, 56, 56)";
        like_video_function(video_id, <?php echo $total_likes ?>);
    })
    dislike_video.addEventListener("click", function(){
        dislike_video.style.backgroundColor = "rgb( 255, 137, 68)";
        like_video.style.backgroundColor = "rgb( 56, 56, 56)";
        dislike_video_function(video_id, <?php echo $total_dislikes ?>);
    })
    add_to_favs.addEventListener("click", function(){
        add_to_favs.style.backgroundColor = "rgb( 255, 137, 68)";
        add_to_favs_function(video_id);
    })
    //Now for the comments...
    var buttons_on_comments = document.getElementsByClassName("like");
    var total_like_buttons = (buttons_on_comments.length - 3);  //beacuse the other are video like/dislike/add buttons
    for(let i=3; i<total_like_buttons; i++){
        var like = document.getElementsByClassName("like")[i];
        //this is dislike button...
        like.addEventListener("click", function(){
            var comment = document.getElementsByClassName("comment")[i-3];
            comment.style.backgroundColor = "rgb( 255, 137, 68)";
            like.style.backgroundColor = "rgb( 255, 137, 68)";
        })
        // else{
        //     //this is like button...
        //     like.addEventListener("click", function(){
        //         like.style.backgroundColor = "rgb( 255, 137, 68)";
        //     })
        // }
    }
    //creating constant for begining to send data to server.
    const xhr = new XMLHttpRequest();
    //This function handles all the responses that come from server.
    xhr.onload = function(){
        //function gets executed when we recieve a reply form the server.
        console.log(this.responseText);
    }
    //like the video...
    var like_video_function = function(video_id, total_likes){
        //write code to increase the likes
        xhr.open("POST", "../../scripts/video_sync_scripts/like_video.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("video_id=" + video_id + "&user_id=" + user_id + "&likes=" + total_likes);
    }
    //dislike the video...
    var dislike_video_function = function(video_id, total_dislikes){
        //write code to increase the dislikes
        xhr.open("POST", "../../scripts/video_sync_scripts/dislike_video.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("video_id=" + video_id + "&user_id=" + user_id + "&dislikes=" + total_dislikes);
    }
    //add the video to favs...
    var add_to_favs_function = function(video_id){
        //write code to add to favs
        xhr.open("POST", "../../scripts/video_sync_scripts/add_to_favs.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("video_id=" + video_id + "&user_id=" + user_id);
    }
    //update the watch progress...
    var video_player = document.getElementsByClassName("movie_player")[0];
    video_player.addEventListener("play", function(){
        setInterval(function(){
            updateProgress();
        }, 10000);
    })

    //functions that can perform DB actions...
    var updateProgress = function(){
        let progress = video_player.currentTime;
        xhr.open("POST", "../../scripts/video_sync_scripts/update_progress.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("video_id=" + video_id + "&user_id=" + user_id + "&progress=" + progress);    
    }
</script>
<?php
    //here we will handle watch progress and like dislikes and every database interactions.
?>