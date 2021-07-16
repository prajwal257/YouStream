<?php
    session_start();
    require_once '..\DB_scripts\connect_to_DB.php';
    $mode = $_GET['m'];
    if($mode=='l'){
        $location = "Location: ../../pages/light/user.php";
        $location_redirect = "Location: ../../pages/light/user.php";
    }
    else{
        $location = "Location: ../../pages/dark/user.php";
        $location_redirect = "Location: ../../pages/dark/user.php";
    }
    $submit_button = $_POST['submit'];
    if(!isset($submit_button)){
        header( $location . '?error=That URL dosent exists.');
        exit;
    }
    $userID = $_SESSION['userid'];
    $userDesc = $_POST['user_description'];
    //testing the input.
    $query = 'UPDATE `users` SET `description`="' . $userDesc . '" WHERE `userid`=' . $userID ;
    echo $query;
    $result = mysqli_query($connect, $query);
    echo $result;
    if($result)
        header( $location . '?success=true');
    else    
        header( $location . '?error=Failed Due to some reason plz report to admin with the description you were trying to update.');