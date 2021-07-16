<?php
    if(isset($_SESSION['userid']) && $_SESSION['userid']!=0){
        //navigation menu's home page link will now redirect to user.php
        $homepagelink = "../../pages/light/user_feed.php";
    }
    else{
        $homepagelink = "../../pages/light/index.php";
    }
?>
<div class="navigation_menu">
        <div class="row_1">
            <a href=<?php echo '"'.$homepagelink.'"' ?>>
                <h3>YouStream</h3>
            </a>
            <div class="close" id="close">
                <img src="../../assets/nav_icons/close-light.png" alt="">
            </div>
        </div>
        <div class="row_2">
            <div class="list">
                <div class="menu_option">
                    <a class="option" href="../../pages/light/user.php">
                        Songs
                    </a>
                    <div class="sublist">
                        <a class="sublist_item" href="../../pages/light/index.php">Newly Arrived</a>
                        <a class="sublist_item" href="../../pages/light/index.php">Most Played</a>
                        <a class="sublist_item" href="../../pages/light/index.php">My Library</a>
                    </div>
                </div>
                <div class="menu_option">
                    <a class="option" href="../../pages/light/index.php">
                        Videoes
                    </a>
                    <div class="sublist">
                        <a class="sublist_item" href="../../pages/light/index.php">Newly Arrived</a>
                        <a class="sublist_item" href="../../pages/light/index.php">Most Played</a>
                        <a class="sublist_item" href="../../pages/light/index.php">My Library</a>
                    </div>
                </div>
                <div class="menu_option">
                    <a class="option" href="../../pages/light/index.php">
                        Gameplay
                    </a>
                    <div class="sublist">
                        <a class="sublist_item" href="../../pages/light/index.php">Newly Arrived</a>
                        <a class="sublist_item" href="../../pages/light/index.php">Most Played</a>
                        <a class="sublist_item" href="../../pages/light/index.php">My Library</a>
                    </div>
                </div>
                <div class="menu_option">
                    <a class="option" href="../../pages/light/index.php">
                        Tutorials
                    </a>
                    <div class="sublist">
                        <a class="sublist_item" href="../../pages/light/index.php">Newly Arrived</a>
                        <a class="sublist_item" href="../../pages/light/index.php">Most Played</a>
                        <a class="sublist_item" href="../../pages/light/index.php">My Library</a>
                    </div>
                </div>
                <div class="menu_option">
                    <a class="option" href="../../pages/light/user.php">
                        User Profile
                    </a>
                    <div class="sublist">
                        <a class="sublist_item" href="../../pages/light/login.php">Login</a>
                        <a class="sublist_item" href="../../pages/light/upload.php">Upload</a>
                        <a class="sublist_item" href="../../pages/light/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row_3"></div>
    </div>
    <nav>
        <a href=<?php echo '"'.$homepagelink.'"' ?>>
            <h3>YouStream</h3>
            <!-- <img src="../../assets/logo.png" alt="logo"> -->
        </a>

        <div class="right_links">
            <input type="text" placeholder="  Search" class="nav_element search">
            <a href="../../pages/dark/index.php" class="nav_element">
                <div class="user">
                    <img src="../../assets/nav_icons/switch_to_dark_theme.png" alt="switch to dark mode">
                </div>
            </a>
            <a href="../../pages/light/login.php" class="nav_element">
                <div class="user">
                    <img src="../../assets/nav_icons/user_account-light.png" alt="user_accout_pic">
                </div>
            </a>
            <div class="menu_trigger" id="menu_trigger">
                <div class="line_1"></div>
                <div class="line_2"></div>
                <div class="line_3"></div>
            </div>
        </div>
    </nav>
<script>
    
    console.log("the nav script is working");
    //functions for opening and closing navigation menu form homepage
    document.getElementById("menu_trigger").addEventListener("click",function(){
        document.getElementsByClassName("navigation_menu")[0].classList.toggle("navigation_menu_active");
    })
    document.getElementById("close").addEventListener("click",function(){
        document.getElementsByClassName("navigation_menu")[0].classList.toggle("navigation_menu_active");
    })
    //animate and show various control options when hovering a menu item.
    var menu_option=document.getElementsByClassName("menu_option");
    for(var i=0;i<menu_option.length;i++){
        if(i==0){
            menu_option[i].addEventListener("mouseover",function(){
                console.log("its over it");
                document.getElementsByClassName("navigation_menu")[0].style.backgroundImage="url('../../assets/navigation_images/light_mode/music_image-min.png')";
            })
            menu_option[i].addEventListener("mouseout",function(){
                document.getElementsByClassName("navigation_menu")[0].style.backgroundImage="none";
            })
        }
        if(i==1){
            menu_option[i].addEventListener("mouseover",function(){
                console.log("its over it");
                document.getElementsByClassName("navigation_menu")[0].style.backgroundImage="url('../../assets/navigation_images/light_mode/video_image-min.png')";
            })
            menu_option[i].addEventListener("mouseout",function(){
                document.getElementsByClassName("navigation_menu")[0].style.backgroundImage="none";
            })
        }
        if(i==2){
            menu_option[i].addEventListener("mouseover",function(){
                console.log("its over it");
                document.getElementsByClassName("navigation_menu")[0].style.backgroundImage=" url('../../assets/navigation_images/light_mode/gamer_image-min.png')";
            })
            menu_option[i].addEventListener("mouseout",function(){
                document.getElementsByClassName("navigation_menu")[0].style.backgroundImage="none";
            })
        }
        if(i==3){
            menu_option[i].addEventListener("mouseover",function(){
                console.log("its over it");
                document.getElementsByClassName("navigation_menu")[0].style.backgroundImage="url('../../assets/navigation_images/light_mode/tutorials_image-min.png')";
            })
            menu_option[i].addEventListener("mouseout",function(){
                document.getElementsByClassName("navigation_menu")[0].style.backgroundImage="none";
            })
        }
        if(i==4){
            menu_option[i].addEventListener("mouseover",function(){
                console.log("its over it");
                //document.getElementsByClassName("navigation_menu")[0].style.backgroundImage="url('../../assets/navigation_images/light_mode/gameplay_image.jpg')";
            })
            menu_option[i].addEventListener("mouseout",function(){
                document.getElementsByClassName("navigation_menu")[0].style.backgroundImage="none";
            })
        }
    }
</script>