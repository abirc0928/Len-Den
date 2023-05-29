<?php
session_start();
$giver = $_SESSION['email'];
$taker = $_SESSION['taker'];
$id = $_SESSION['req_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    
    $amount = $_POST['amount'];
    $deadline = $_POST['deadline'];
    $sql2 = " INSERT INTO `offerloan`(`loan_giver`, `loan_taker`, `amount`, `intarest`, `amount_intarest`, `deadline`, `req_id`)
    VALUES ('$giver','$taker','$amount','NO','$amount','$deadline','$id')";
    
    $result1 = mysqli_query($con, $sql2);
    header("Location:loan_offer_given.php");
    
}

?>