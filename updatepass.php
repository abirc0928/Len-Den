<?php
        include '_dbconnect.php';
        //session_start();
        $npass = $_POST['npass'];
        $email = $_POST['email'];
       
        $q =  "UPDATE `user` SET `password`='$npass' WHERE email='$email';";
        $run = mysqli_query($con, $q);
        session_start();
        $_SESSION['email']=null;
        session_destroy();
        header('location:login.php');
        $con->close();
?>