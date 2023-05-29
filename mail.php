<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';

    $email = $_POST['email'];
    $sql2 = " SELECT * FROM user WHERE email = '$email';";
    $result1 = mysqli_query($con, $sql2);
    $num1 = mysqli_num_rows($result1);

    if ($num1 == 1) {
        include('smtp/PHPMailerAutoload.php');
        $code = rand(111111, 999999);
        $html = 'Len-Den Password Reset: ' . $code;
        $mail = new PHPMailer();
        $mail->SMTPDebug  = 3;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username = "lendenbd247@gmail.com";
        $mail->Password = "kexqmbhgiqdbwlkp";
        $mail->SetFrom("lendenbd247@gmail.com");
        $mail->Subject = 'Your Len-Den Verification Code';
        $mail->Body = $html;
        $mail->AddAddress($email);
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['code'] = $code;
            header("Location:forget.php");
        }
    } else {
        $_SESSION['wrong'] = "Wrong Email";
        header("Location:forget2.php");
        exit();
    }
}
