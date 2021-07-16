
<div class="upload_page">
    <?php
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
                            <button type="submit" class="submit_error">PLAY</button>
                            <button type="submit" class="submit_error secondary_button">OK</button>
                        </div>
                    </div>
                </div>';
        }
        else{
            //basically do nothing i know im testing if this case follows.
        }
    ?>

    <form action="../../scripts/upload_scripts/video_input.php?m=d" method="post" enctype="multipart/form-data">
        <section class="video_details">
            <section class="video_artist_input">
                <div class="video_artist_header">
                    <h2>Video Details:</h2>
                    <p>All the details needs to be filled to avoid any collisions. Please mind that Title, Tag feilds cannot have any special symbols only : symbol is allowed that to only inside video title feild. </p>
                </div>
                <div class="video_artist_input_section">
                    <div class="video_artist_input_new">
                        <div class="row">
                            <h6>Video Title:</h6>
                            <input type="text" name="video_title" placeholder="Video Title" class="input">
                        </div>
                        <div class="row">
                            <h6>Video Description:</h6>
                            <textarea type="text" name="video_desc" placeholder="Video Description" class="input"></textarea>
                        </div>
                        <div class="row">
                            <h6>Video Length (Secs.):</h6>
                            <input type="number" name="video_playback_time" placeholder="Video Length in Secs." class="input">
                        </div>
                        <div class="row">
                            <h6>Catagory or Tag:</h6>
                            <input type="text" name="catagory" placeholder="Catagory or Tag" class="input">
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="video_artist">

            <section class="video_artist_input">
                <div class="video_artist_header">
                    <h2>Video Artist</h2>
                    <p>All the feilds are compulsory to fill if you are entering the artistID/Tag then make sure that it matches with artist. If you are entering the New artist then you can avoid the social section. The artist profile and cover pictures that are going tobe uploaded must also not contain any special symbols. All special symbols are probihited. The artist role can be anyhing from host, actor, director, singer, to producers and sponsers. </p>
                </div>
                <div class="video_artist_input_section">
                    <div class="video_artist_input_artistID artistID">
                        <div class="row">
                            <h6>Artist ID:</h6>
                            <input type="text" name="artist_1_ID" placeholder="Artist ID" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Role:</h6>
                            <input type="text" name="artist_1_role_id" placeholder="Artist Role" class="input">
                        </div>
                        <div class="row">
                            <h6 style="color:blue; cursor: pointer; text-decoration: underline;" class="toggle_artistNew">Enter New Artist</h6>
                        </div>
                    </div>
                    <div class="video_artist_input_new artistNew display_none">
                        <div class="row">
                            <h6>Artist Name:</h6>
                            <input type="text" name="artist_1_new_name" placeholder="Artist Name" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Description:</h6>
                            <textarea type="text" name="artist_1_new_desc" placeholder="Artist Description" class="input"></textarea>
                        </div>
                        <div class="row">
                            <h6>Artist Role:</h6>
                            <input type="text" name="artist_1_role" placeholder="Artist Role" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Social Link(Opt.):</h6>
                            <input type="text" name="artist_1_new_social" placeholder="Artist Social Link" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Profile Image:</h6>
                            <input type="file" name="artist_1_new_profile_image" placeholder="Artist Image" class="input" id="artist_profile_image">
                        </div>
                        <div class="row">
                            <h6>Artist Cover Image:</h6>
                            <input type="file" name="artist_1_new_cover_image" placeholder="Artist Cover Image" class="input"  id="artist_cover_image">
                        </div>
                        <div class="row">
                            <h6 style="color:blue; cursor: pointer; text-decoration: underline;" class="toggle_artistID">Enter ArtistID</h6>
                        </div>  
                    </div>
                </div>
            </section>

            <section class="video_artist_input">
                <div class="video_artist_header">
                    <h2>Video Artist #2 (Opt.)</h2>
                    <p>You can either compleatly avoid this section or you need to fill everything as usual. The artist profile and cover pictures that are going tobe uploaded must also not contain any special symbols. Any special symobs are probihited the artist role can be anyhing from host, actor, director, singer, to producers and sponsers. </p>
                </div>
                <div class="video_artist_input_section">
                    <div class="video_artist_input_artistID artistID">
                        <div class="row">
                            <h6>Artist ID:</h6>
                            <input type="text" name="artist_2_ID" placeholder="Artist ID" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Role:</h6>
                            <input type="text" name="artist_2_role_id" placeholder="Artist Role" class="input">
                        </div>
                        <div class="row">
                            <h6 style="color:blue; cursor: pointer; text-decoration: underline;" class="toggle_artistNew">Enter New Artist</h6>
                        </div>
                    </div>
                    <div class="video_artist_input_new artistNew display_none">
                        <div class="row">
                            <h6>Artist Name:</h6>
                            <input type="text" name="artist_2_new_name" placeholder="Artist Name" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Description:</h6>
                            <textarea type="text" name="artist_2_new_desc" placeholder="Artist Description" class="input"></textarea>
                        </div>
                        <div class="row">
                            <h6>Artist Role:</h6>
                            <input type="text" name="artist_2_role" placeholder="Artist Role" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Social Link(Opt.):</h6>
                            <input type="text" name="artist_2_new_social" placeholder="Artist Social Link" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Profile Image:</h6>
                            <input type="file" name="artist_2_new_profile_image" placeholder="Artist Image" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Cover Image:</h6>
                            <input type="file" name="artist_2_new_cover_image" placeholder="Artist Cover Image" class="input">
                        </div>
                        <div class="row">
                            <h6 style="color:blue; cursor: pointer; text-decoration: underline;" class="toggle_artistID">Enter ArtistID</h6>
                        </div>  
                    </div>
                </div>
            </section>
            <section class="video_artist_input">
                <div class="video_artist_header">
                    <h2>Video Artist #3 (Opt.)</h2>
                    <p>You can either compleatly avoid this section or you need to fill everything as usual. The artist profile and cover pictures that are going tobe uploaded must also not contain any special symbols. Any special symobs are probihited the artist role can be anyhing from host, actor, director, singer, to producers and sponsers. </p>
                </div>
                <div class="video_artist_input_section">
                    <div class="video_artist_input_artistID artistID">
                        <div class="row">
                            <h6>Artist ID:</h6>
                            <input type="text" name="artist_3_name" placeholder="Artist ID" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Role:</h6>
                            <input type="text" name="artist_3_role_id" placeholder="Artist Role" class="input">
                        </div>
                        <div class="row">
                            <h6 style="color:blue; cursor: pointer; text-decoration: underline;" class="toggle_artistNew">Enter New Artist</h6>
                        </div>
                    </div>
                    <div class="video_artist_input_new artistNew display_none">
                        <div class="row">
                            <h6>Artist Name:</h6>
                            <input type="text" name="artist_3_new_name" placeholder="Artist Name" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Description:</h6>
                            <textarea type="text" name="artist_3_new_desc" placeholder="Artist Description" class="input"></textarea>
                        </div>
                        <div class="row">
                            <h6>Artist Role:</h6>
                            <input type="text" name="artist_3_role" placeholder="Artist Role" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Social Link(Opt.):</h6>
                            <input type="text" name="artist_3_new_social" placeholder="Artist Social Link" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Profile Image:</h6>
                            <input type="file" name="artist_3_new_profile_image" placeholder="Artist Image" class="input">
                        </div>
                        <div class="row">
                            <h6>Artist Cover Image:</h6>
                            <input type="file" name="artist_3_new_cover_image" placeholder="Artist Cover Image" class="input">
                        </div>
                        <div class="row">
                            <h6 style="color:blue; cursor: pointer; text-decoration: underline;" class="toggle_artistID">Enter ArtistID</h6>
                        </div>  
                    </div>
                </div>
            </section>

        </section>


            <section class="video_files">
                <section class="video_artist_input">
                    <div class="video_artist_header">
                        <h2>Video Files</h2>
                        <p>The allowed extentions for video files are ".mp4, .ogg" and for images are ".jpg, .png, .webp", The file names must not contain any special symbols including ":,." This can false trigger already exists warning and can suspend the uploader's account. . </p>
                    </div>
                    <div class="video_artist_input_section">
                        <div class="video_artist_input_new">
                            <div class="row">
                                <h6>Video Thumbnail (.png, .jpg):</h6>
                                <input type="file" name="video_thumbnail_image" placeholder="Thumbnail Image" class="input">
                            </div>
                            <div class="row">
                                <h6>Video Cover Image (.png, .jpg):</h6>
                                <input type="file" name="video_cover_image" placeholder="Video Cover Image" class="input">
                            </div>
                            <div class="row">
                                <h6>Video File (.mp4, .ogg):</h6>
                                <input type="file" name="video_file" placeholder="Video.mp4" class="input">
                            </div>
                        </div>
                    </div>
                </section>
            </section>

        <button class="submit_button" action="submit" name="submit">SUBMIT</button>
    </form>
    <div class="side_image">
        <div class="img"></div>
    </div>
</div>
    <script>
        //for artistID and New artist toggle button.
        var toggle_artistNew = document.getElementsByClassName("toggle_artistNew");
        var toggle_artistID = document.getElementsByClassName("toggle_artistID");
        var artistID = document.getElementsByClassName("artistID");
        var artistNew = document.getElementsByClassName("artistNew");
        for(let i=0; i<artistNew.length; i++){
            toggle_artistNew[i].addEventListener("click", function(){
                artistNew[i].classList.toggle("display_none");
                artistID[i].classList.toggle("display_none");
            });
            toggle_artistID[i].addEventListener("click", function(){
                artistNew[i].classList.toggle("display_none");
                artistID[i].classList.toggle("display_none");
            });
        }
        //for the side images
        var side_img = document.getElementsByClassName("img")[0];
        let img_number = 2;
        side_img.addEventListener("click", function(){
            console.log("img_clicked");
            side_img.style.backgroundImage = "url(../../assets/upload_page_images/" + img_number + ".jpg)";
            if(img_number<4)
                img_number++;
            else
                img_number = 1;
        })
        console.log("script is working");
        //now for model buttons.
        var model = document.getElementsByClassName("model")[0];
        var model_ok_button = document.getElementsByClassName("submit_error");
        for(let i=0; i<model_ok_button.length; i++){
            model_ok_button[i].addEventListener("click", function(){
                model.style.display = "none";
            })
        }

    </script>