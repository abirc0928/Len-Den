<?php
    session_start();
    $snd = $_SESSION['email'];
    include '_dbconnect.php';
    $amount = $_POST['taka'];
    $pid = $_POST['pid'];
    $tamount = $_POST['amount'];
    $number = $_POST['number'];

    $tamount = $tamount - $amount;

    $sqlxx = "Select * from `given_loan` WHERE loan_id = '$pid';";
    $resultxx = mysqli_query($con, $sqlxx);

    while ($row = $resultxx->fetch_assoc()) {
        $rcv = $row["loan_giver"];
    }

    $sql2x = "INSERT INTO `notification`(`amount`,`sender_email`, `number`, `time`, `rcv_email`) VALUES ('$amount','$snd',$number,NOW(),'$rcv');";
    $result1x = mysqli_query($con, $sql2x);

    $sql2 = "UPDATE `given_loan` SET `due`='$tamount' WHERE loan_id = '$pid'";
    $result1 = mysqli_query($con, $sql2);

    $sql3 = "UPDATE `loan` SET `due`='$tamount' WHERE loan_id = '$pid'";
    $result2 = mysqli_query($con, $sql3);
    header('Location:my_loans.php');
?>