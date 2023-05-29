<?php
session_start();
$giver = $_SESSION['email'];
$taker = $_SESSION['taker'];
$id = $_SESSION['req_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    
    $amount = $_POST['amount'];
    $deadline = $_POST['deadline'];
    $interest = $_POST['interest'];
 
    $a = (double)$amount;
    $i = (double)$interest;

    $i = $i / 100; 
    $a_i = ($a * $i) + $a;
   
    echo $a_i;
    $sql2 = " INSERT INTO `offerloan`(`loan_giver`, `loan_taker`, `amount`, `intarest`, `amount_intarest`, `deadline`, `req_id`)
     VALUES ('$giver','$taker ','$amount','$interest','$a_i','$deadline','$id')";
    $result1 = mysqli_query($con, $sql2);
    header("Location:loan_offer_given.php");
    
}

?>