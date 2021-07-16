<?php
    $mode = $_GET['m'];
    if($mode=='l'){
        $location = "Location: ../../pages/light/login.php";
        $location_redirect = "Location: ../../pages/light/user_feed.php";
    }
    else{
        $location = "Location: ../../pages/dark/login.php";
        $location_redirect = "Location: ../../pages/dark/user_feed.php";
    }
$submit_button = $_POST['submit'];
if(!isset($submit_button)){
    header( $location . '?error=That URL dosent exists.');
    exit;
}
require_once '..\DB_scripts\connect_to_DB.php';
$username = mysqli_real_escape_string($connect,$_POST['username']);
$password = mysqli_real_escape_string($connect,$_POST['password']);
if(empty($username)||empty($password)){
    header( $location . '?error=All the feilds are cumpulsory required.');
    exit;
}
if( !preg_match("/^[a-zA-Z]*$/",$username) ||!preg_match("/^[a-z A-Z]*$/",$password) ){
    //checks for wired symbols inside username and password text feilds.
    header( $location . '?error=Invalid characters entered.');
    exit();
}
//checks if user exists
$sql= "select * from users where `username`='$username';";
$results= mysqli_query($connect,$sql);
$results_check = mysqli_num_rows($results);
if($results_check>1){
    //more than one user exits with same credentials
    header($location . '?error=More than one users already existes.');
    exit();
}
elseif($results_check<1){
    //no user with the credentials preovided
    header($location . '?error=No users were fond with same credentails.');
    exit();
}
else{
    if( $row=mysqli_fetch_assoc($results) ){
        //password dehashing
        $password_check = password_verify($password,$row['password']);

        if($password_check==false){
            //password did not match
            header($location . '?error=Password is Incorrect.');
            exit();
        }
        else{
            //loging the user in
            session_start();
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['username'] = $row['username'];
            header($location_redirect);
        }
        
    }
    
}