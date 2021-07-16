<?php
    if (!isset($_SESSION))
    {
        session_start();
    }
    $_SESSION['userid']=0;
    session_destroy();
    header("Location: ./login.php?error=please login before accessing the main page, anoyomous watching feature was droped after update v0.8.");
    exit();