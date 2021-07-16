<?php
    if(isset($_SESSION['userid'])){
        //this will be user feed page then.
        $model_layout_style = 'style="margin-top: -134vh";';
    }
    else{
        //this will be index page then.
        $model_layout_style = 'style="margin-top: -204vh";';
    }
?>
    <div class="hero_media_list">
    <div class="newly_arrived_section">
        <h2 class="head_text">
            Continue Watching:
        </h2>
        <div class="list_of_media">
            <div class="left_arrow"></div>
            <div class="list">     
                <?php
                    require_once("../../scripts/DB_scripts/connect_to_DB.php");
                    $sql = 'SELECT * FROM `videos`';
                    $result = mysqli_query($connect, $sql);
                    if($result->num_rows == 0){
                        //No videos in the database.
                    }
                    else if($result->num_rows > 1){
                        for($i=0; $i<4; $i++){
                            $row = $result->fetch_assoc();
                            echo '
                                <div class="item trigger_element">
                                    <div class="item_img">
                                        <img src="../../data/videos/' . $row['tag'] . '/thumbnail_images/' . $row['videoid'] .'-thumbnail.jpg" alt="video thumbnail">
                                    </div>
                                    <div class="item_desc">
                                        <h4>' . $row['title'] . '</h4>
                                        <div style="display: flex">
                                            <p>'. $row['watched'] .' Views | </p>
                                            <p style="margin-left: 6px"> '. $row['likes'] .' Likes </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="model"'. $model_layout_style .'> 
                                    <div class="model_main_container">
                                        <div class="close_model">
                                            <img src="../../assets/nav_icons/close-light.png" alt="click here to close">
                                        </div>
                                        <div class="model_main">
                                            <div class="images">
                                                <div class="cover_img_container">
                                                    <img src="../../data/videos/' . $row['tag'] . '/cover_images/' . $row['videoid'] .'-cover.jpg" alt="cover immage" class="cover_img">
                                                </div>
                                                <img src="../../data/videos/' . $row['tag'] . '/thumbnail_images/' . $row['videoid'] .'-thumbnail.jpg" alt="thumbnail" class="thumbnail_img">
                                            </div>
                                            <div class="details">
                                                <div class="video_details">
                                                    <h3>' . $row['title'] . '</h3>
                                                    <p>' . $row['description'] . '</p>
                                                </div>
                                                <div class="controls">
                                                    <a href="../../pages/dark/movie_player.php?v_tag=' . $row['tag']. '&v_id=' . $row['videoid'] . '" class="button">Play</a>
                                                    <a href="../../pages/dark/movie_player.php?v_tag=' . $row['tag']. '&v_id=' . $row['videoid'] . '"  class="button secondary">Watch Later</a>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    }
                ?>
            </div>
            <div class="right_arrow"></div>
        </div>
    </div>
</div>