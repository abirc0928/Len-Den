<?php
    session_start();
    $ucode = $_POST['ucode'];
    $vcode = $_POST['vcode'];
    $email = $_POST['email'];
    if($ucode == $vcode){
        $_SESSION['ok'] = "ok";
        $_SESSION['email'] = $email;
        header("Location:reset.php");
    }else{
        $_SESSION['ok'] = "not_ok";
        header("Location:forget.php");
    }
?>