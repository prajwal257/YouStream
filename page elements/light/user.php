<?php
    if(!isset($_SESSION['userid'])){
        header("location: ./login.php?error=You need to first login before watching the video beacsue of watch progress preseving reasons. Sorry Anoyomous Watching features are droped after v0.8.");
    }
    if(isset($_GET['error'])){
        echo '<div class="model">
                <div class="message">
                    <div class="row">
                        <div class="indicator error"></div>
                            <h1>ERROR</h1>
                                <div class="error_statements">';
                                    echo '<p>' . $_GET['error'] . '</p>';
                            echo '</div>
                    </div>
                    <div class="row_buttons">
                        <button type="submit" class="submit_error secondary_button">OK</button>
                    </div>
                </div>
            </div>';
    }
    else if(isset($_GET['success'])){
        echo '<div class="model">
                <div class="message">
                    <div class="row">
                        <div class="indicator success"></div>
                        <h1>SUCCESS</h1>
                    </div>
                    <div class="row_buttons">
                        <button type="submit" class="submit_error secondary_button">OK</button>
                    </div>
                </div>
            </div>';
    }
    else{
        //basically do nothing i know im testing if this case follows.
    }
    require_once("../../scripts/DB_scripts/connect_to_DB.php");
    $user_id= $_SESSION['userid'];
    $query= "SELECT * FROM `users` WHERE `userid`=" . $user_id;
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
?>
    <div class="user_profile">
        <div class="user_images">
            <div class="cover_image">
                <img src="../../assets/user_page_images/user_page_light.jpg" alt="change the default cover image">
            </div>
            <div class="profile_image">
                <img src="../../assets/nav_icons/user_account-dark.png" alt="default profile image">
                <form action="../../scripts/user_scripts/update_user_profile_image.php?m=l" method="post" enctype="multipart/form-data">
                    <input type="file" name="profile_image" placeholder="Profile Image" class="input"></input>
                    <button type="submit" name="submit">change</button>
                </form>
            </div>
        </div>
        <div class="user_details">
            <h1><?php echo $row['username']; ?></h1>
            <?php 
                if($row['description']==NULL){
                    echo "
                        <form action='../../scripts/user_scripts/update_user_description.php?m=l' method='post' class='input_user_desc'>
                            <input type='text' name='user_description' placeholder='Enter the description'></input>
                            <button type='submit' name='submit'>Submit<button>
                        </form>
                    ";
                }
                else{
                    echo "<p>" . $row['description'] . "<br>" . $row['email'] . "</p>";
                    echo "
                        <form action='../../scripts/user_scripts/update_user_description.php?m=l' method='post' class='input_user_desc'>
                            <input type='text' name='user_description' placeholder='Enter to change the description.'></input>
                            <button type='submit' name='submit' class='button'>Submit<button>
                        </form>
                    ";
                }
            ?>
        </div>
        <!-- <div class="user_stats">
            <h2 class="head_text">
                User Stats:
            </h2>
            <div class="user_stat_container">
                <div class="user_stat_name">
                    <h4>Total Watched Videos:</h4>
                    <h4>Total Watched Hours:</h4>
                </div>
                <div class="user_stat_value">
                    <p>144</p>
                    <p>14</p>
                </div>
            </div>
        </div> -->
    </div>



    <div class="hero_media_list">
        <div class="newly_arrived_section">
            <h2 class="head_text">
                Previously Watched:
            </h2>
            <div class="list_of_media">
                <div class="left_arrow"></div>
                <div class="list">
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                </div>
                <div class="right_arrow"></div>
            </div>
        </div>
    </div>


    <div class="hero_media_list">
        <div class="newly_arrived_section">
            <h2 class="head_text">
                Featured in:
            </h2>
            <div class="list_of_media">
                <div class="left_arrow"></div>
                <div class="list">
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                </div>
                <div class="right_arrow"></div>
            </div>
        </div>
    </div>


    <div class="hero_media_list">
        <div class="newly_arrived_section">
            <h2 class="head_text">
                Liked By You:
            </h2>
            <div class="list_of_media">
                <div class="left_arrow"></div>
                <div class="list">
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                    <a href="../pages/movie.php" class="item">
                        <div class="item_img"></div>
                        <div class="item_desc">
                            <h4>Video Title</h4>
                            <p>total views</p>
                        </div>
                    </a>
                </div>
                <div class="right_arrow"></div>
            </div>
        </div>
    </div>
