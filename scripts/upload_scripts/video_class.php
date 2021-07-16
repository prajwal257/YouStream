<?php

    class video{

        public $id;
        function getvideoID(){
            return $this->id;
        }
        //video details
        public $title, $desc, $catagory, $length;
        //setters and getters
        function setVideoDetails($title_input, $desc_input, $length_input, $catagory_input){
            $this->title = $title_input;
            $this->desc = $desc_input;
            $this->length = $length_input;
            $this->catagory = $catagory_input;
        }
        function getVideoDetails(){
            echo $this->title . "<br>";
            echo $this->desc . "<br>";
            echo $this->length . "<br>";
            echo $this->catagory . "<br>";
        }

        public $artist_id = array(3);
        public $artist_name = array(3);
        public $artist_desc = array(3);
        public $artist_role = array(3);
        public $artist_social = array(3);
        public $artist_profile = array(3);
        public $artist_cover = array(3);
        //seting for each artist ID all at once.
        function setArtistID( $i, $artistID_input, $artist_role_input){
            $this->artist_id[$i] = $artistID_input;
            $this->artist_role[$i] = $artist_role_input;
        }
        //setting for artist New all at once.
        function setArtistNew( $i, $artist_name_input, $artist_desc_input, $artist_role_input, $artist_social_input, $artist_profile_image_input, $artist_cover_image_input){
            $this->artist_name[$i] = $artist_name_input;
            $this->artist_desc[$i] = $artist_desc_input;
            $this->artist_role[$i] = $artist_role_input;
            $this->artist_social[$i] = $artist_social_input;
            //artist image files.
            $this->artist_profile[$i] = $artist_profile_image_input;
            $this->artist_cover[$i] = $artist_cover_image_input;
        }
        function getArtistNew( $i){
            echo "artist name is : " . $this->artist_name[$i] . "<br>";
            echo "artist desc is : " . $this->artist_desc[$i] . "<br>";
            echo "artist role is : " . $this->artist_role[$i] . "<br>";
            echo "artist social is : " . $this->artist_social[$i] . "<br>";
            echo "artist image is : " . $this->artist_profile[$i]['name'] . "<br>";
            echo "artist cover image is : " . $this->artist_cover[$i]['name'] . "<br>";
        }
        
        //video files
        public $thumbnail_image, $cover_image, $file;
        function setFiles($thumbnail_image_input, $cover_image_input, $file_input){
            //video files input here.
            $this->thumbnail_image = $thumbnail_image_input;
            $this->cover_image = $cover_image_input;
            $this->file = $file_input;
        }
        function getFiles(){
            echo $this->thumbnail_image['name'];
            echo $this->cover_image['name'];
            echo $this->file['name'];
        }
    }
    //testing everything...
    // $video = new video();
    // $video->setArtistNew( 0, "Gay Fuckboi", "I'm a fuckboi and I like D's like pipe succ'em they leak...yummm", "Succ'er", 69, 69, 69);
    // $video->getArtistNew( 0);