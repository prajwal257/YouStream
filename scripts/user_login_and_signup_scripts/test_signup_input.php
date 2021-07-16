<?php
$mode = $_GET['m'];
if($mode=='l'){
    $location = "Location: ../../pages/light/sign-up.php";
    $location_redirect = "Location: ../../pages/light/user.php";
}
else{
    $location = "Location: ../../pages/dark/sign-up.php";
    $location_redirect = "Location: ../../pages/dark/user.php";
}
$submit_button = $_POST['submit'];
if(!isset($submit_button)){
    header( $location . '?error=That URL dosent exists.');
    exit;
}
require_once '..\DB_scripts\connect_to_DB.php';
$username = mysqli_real_escape_string($connect,$_POST['username']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect,$_POST['password']);
if(empty($username)||empty($password||empty($email))){
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
// if($results_check>=1){
//     //more than one user exits with same credentials
//     header('Location: ../pages/sign-up.php?users_with_same_credentials_already_exists');
//     exit();
// }
//inserting the info into DB.

//hash password
$h_password = password_hash($password,PASSWORD_DEFAULT);
//inserting user credentials into database
$query_statement="INSERT INTO users (username,email,password) VALUES ('$username','$email','$h_password')";
$query=mysqli_query($connect,$query_statement);
//user should be inserted by now.
//im going to fetch the userID from the users table.
$sql= "select `userid` from users where `username`='$username';";
$result= mysqli_query($connect,$sql);
$userid = $result;
if($query==NULL)
    echo "Error while inserting the user into DB :";
session_start();
$_SESSION['username'] = $username;
$_SESSION['userid'] = $userid;
header($location_redirect);