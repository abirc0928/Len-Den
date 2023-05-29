<?php

include '_dbconnect.php';
session_start();
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if($_FILES['image']['size'] != 0) {
        echo $email;
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check != false)
        {
            $name = $_POST['name'];
            $v_id = $_POST['ID'];
            $fb = $_POST['fb'];
            $phone = $_POST['phone'];
            $insta = $_POST['insta'];
            $gender = $_POST['gender'];
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
            
        

            $sql2 = "SELECT * FROM user WHERE email = '$email'";
            $result1 = mysqli_query($con, $sql2);
            $num1 = mysqli_num_rows($result1);


            if ($num1 == 1) {
                $sql = "UPDATE `user` SET `image`='$imgContent',`name`='$name',`versity_id`='$v_id',`facebook`='$fb',`phone`='$phone',`instagram`='$insta',`Gender`='$gender' WHERE `email` = '$email';";
                $result = mysqli_query($con, $sql);
                header("Location:profile.php");
                exit();
            }
        
            
            }
        }else{
            $name = $_POST['name'];
            $v_id = $_POST['ID'];
            $fb = $_POST['fb'];
            $phone = $_POST['phone'];
            $insta = $_POST['insta'];
            $gender = $_POST['gender'];
            
            
        

            $sql2 = "SELECT * FROM user WHERE email = '$email'";
            $result1 = mysqli_query($con, $sql2);
            $num1 = mysqli_num_rows($result1);


            if ($num1 == 1) {
                $sql = "UPDATE `user` SET `name`='$name',`versity_id`='$v_id',`facebook`='$fb',`phone`='$phone',`instagram`='$insta',`Gender`='$gender' WHERE `email` = '$email';";
                $result = mysqli_query($con, $sql);
                header("Location:profile.php");
                exit();
            }
        }
    

    }
