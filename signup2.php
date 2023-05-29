<?php
include '_dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_FILES['image']['size'] != 0) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check != false)
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $v_id = $_POST['ID'];
            $gender = $_POST['gender'];
            $fb = $_POST['fb'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $phone = $_POST['phone'];
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
            $insta = $_POST['insta'];
            $gender= $_POST['gender'];

            if($password == $cpassword){
                $sql2 = "SELECT * FROM user WHERE email = '$email'";
                $result1 = mysqli_query($con, $sql2);
                $num1 = mysqli_num_rows($result1);
                
                
                if ($num1 == 0) {
                        $sql = "INSERT INTO `user`( `name`, `email`, `versity_id`, `facebook`, `password`, `phone`, `image`, `instagram`, `gender`)
                        VALUES ('$name','$email','$v_id','$fb','$password','$phone','$imgContent','$insta','$gender')";
                        $result = mysqli_query($con, $sql);
                        $_SESSION['success'] = "Account created successfully";
                        header("Location:signup.php");
                        exit();
                }
                else{
                    $_SESSION['not_success'] = "Email already used before";
                header("Location:signup.php");
                exit();   
                }
                    
            }
            $_SESSION['pasword'] = "Password did not matched";
            header("Location:signup.php");
            exit();
            }
        }
    else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $v_id = $_POST['ID'];
        $gender = $_POST['gender'];
        $fb = $_POST['fb'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $phone = $_POST['phone'];
        $image = $_FILES['image']['tmp_name'];
        
        $insta = $_POST['insta'];
        $gender= $_POST['gender'];

        if($password == $cpassword){
            $sql2 = "SELECT * FROM user WHERE email = '$email'";
            $result1 = mysqli_query($con, $sql2);
            $num1 = mysqli_num_rows($result1);
            
            
            if ($num1 == 0) {
                    if($_POST['gender']=="Male"){
                        $sql = "INSERT INTO `user`( `name`, `email`, `versity_id`, `facebook`, `password`, `phone`, `image`, `instagram`, `gender`)
                        VALUES ('$name','$email','$v_id','$fb','$password','$phone','MaleImage','$insta','$gender')";
                        $result = mysqli_query($con, $sql);
                        $_SESSION['success'] = "Account created successfully";
                        header("Location:signup.php");
                        exit();
                    }
                    if($_POST['gender']=="Female"){
                        $sql = "INSERT INTO `user`( `name`, `email`, `versity_id`, `facebook`, `password`, `phone`, `image`, `instagram`, `gender`)
                        VALUES ('$name','$email','$v_id','$fb','$password','$phone','FemaleImage','$insta','$gender')";
                        $result = mysqli_query($con, $sql);
                        $_SESSION['success'] = "Account created successfully";
                        header("Location:signup.php");
                        exit();
                    }
            }
            else{
                $_SESSION['not_success'] = "Email already used before";
            header("Location:signup.php");
             exit();   
            }
                 
        }
        $_SESSION['pasword'] = "Password did not matched";
        header("Location:signup.php");
        exit();
    }
    
}
?>