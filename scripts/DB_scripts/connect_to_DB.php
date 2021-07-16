<?php
$connect = mysqli_connect('localhost','root');
$status=mysqli_select_db($connect,'youstream2');

if(!$status){
    echo "failed";
    die("connection failed : " . mysqli_connect_error());
}
// echo "Connected to server" . $connect;