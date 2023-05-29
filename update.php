<?php
        include '_dbconnect.php';
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $npass = $queries['npass'];
        $email = $queries['email'];
     
       
        $q =  "UPDATE `user` SET `password`='$npass' WHERE email='$email';";
        $run = mysqli_query($con, $q);
        session_start();
        $_SESSION['email']=null;
        $_SESSION['not_break']=null;
        session_destroy();
        header('location:login.php');
        $con->close();
?>