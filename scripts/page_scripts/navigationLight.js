
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
