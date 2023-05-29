<?php
    session_start();
    $snd = $_SESSION['email'];
    $pid = $_POST['pid'];
    $num = $_POST['num'];
    $amount = $_POST['amount'];
    
    include '_dbconnect.php';

    $sqlx = "Select * from `given_loan` WHERE loan_id = '$pid';";
    $resultx = mysqli_query($con, $sqlx);

    while ($row = $resultx->fetch_assoc()) {
        $rcv = $row["loan_taker"];
    }

    $sql2x = "INSERT INTO `notification`(`amount`,`sender_email`, `number`, `time`, `rcv_email`) VALUES ('$amount','$snd',$num,NOW(),'$rcv');";
    $result1x = mysqli_query($con, $sql2x);
    

    $sql2 = "UPDATE `given_loan` SET `payment`='Paid' WHERE loan_id = '$pid'";
    $result1 = mysqli_query($con, $sql2);

    $sql3 = "UPDATE `loan` SET `payment`='Paid' WHERE loan_id = '$pid'";
    $result2 = mysqli_query($con, $sql3);
    header('Location:my_given_loans.php');
?>