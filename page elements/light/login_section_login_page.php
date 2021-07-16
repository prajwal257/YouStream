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
<div class="login_box">
    <div class="text_box">
        <form action="../../scripts/user_login_and_signup_scripts/test_login_input.php?m=l" method="post">
            <h3>Login:</h3>
            <h6>username:</h6>
            <input type="text" name="username">
            <h6>password:</h6>
            <input type="password" name="password">
            <input type="submit" value="submit" class="submit" name="submit">
            <a href="../../pages/light/signup.php">don't have accout yet Sign-Up now.</a>
        </form>
    </div>
    <div class="img_box"><!--
        <img src="../assets/background_1.jpg" alt="background_1" class="visible">
        <img src="../assets/background_2.jpg" alt="background_2">-->
    </div>
</div>