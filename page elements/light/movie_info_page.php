<?php
    require_once("../../scripts/DB_scripts/connect_to_DB.php");
    $sql = 'SELECT * FROM `videos` WHERE `videoid`=' . $_GET['v_id'];
    $result = mysqli_query($connect, $sql);
    if($result->num_rows == 0){
        //No video in the database. BLYAT!!!
    }
    $row = $result->fetch_assoc();
?>
<div class="movie_info_section">
        <div class="row_1">
            <img src=<?php echo "../../data/videos/" . $row['tag'] . "/cover_images/" . $row['videoid'] . "-cover.jpg"?> alt="video cover image">
        </div>
        <div class="row_2">
            <div class="movie_thumbnail">
                <img src=<?php echo "../../data/videos/" . $row['tag'] . "/thumbnail_images/" . $row['videoid'] . "-thumbnail.jpg"?> alt="video thumbnail">
            </div>
            <div class="movie_information">
                <h1><?php echo $row['title'] ?></h1>
                <p><?php echo $row['description'] ?></p>
                <div class="movie_controls">
                    <?php echo '<a href="../../pages/movie_player.php?v_tag=' . $row['tag']. '&v_id=' . $row['videoid'] . '">'; ?>
                        <button>PLAY</button>    
                    </a>
                    <a href="../pages/movie_player.php">
                        <button>WATCH LATER</button>    
                    </a>
                </div>
            </div>
        </div>
        <div class="row_3">
            <div class="newly_arrived_section">
                <h2 class="head_text">
                    Credits:
                </h2>
                <div class="list_of_media">
                    <div class="left_arrow"></div>
                    <div class="list">
                        <div class="item">
                            <div class="item_img"></div>
                            <div class="item_desc">
                                <h4>Artist Name</h4>
                                <p>Role or Job</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item_img"></div>
                            <div class="item_desc">
                                <h4>Artist Name</h4>
                                <p>Role or Job</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item_img"></div>
                            <div class="item_desc">
                                <h4>Artist Name</h4>
                                <p>Role or Job</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item_img"></div>
                            <div class="item_desc">
                                <h4>Artist Name</h4>
                                <p>Role or Job</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="right_arrow"></div>
                </div>
            </div>
        </div>
    </div>