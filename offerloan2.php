<?php
session_start();
$id = $_GET['id'];
include '_dbconnect.php';
$sqlr = "SELECT * FROM loan_req where id = '$id';";
$resultr = mysqli_query($con, $sqlr);
while ($row = $resultr->fetch_assoc()) {
    $intarest = $row["intarest"];
    $email = $row["email"];
    $amount = $row["amount"];
    
}


$_SESSION['taker'] = $email;
$_SESSION['amount'] = $amount;
$_SESSION['req_id'] = $id;

if($intarest == 'YES'){
    header("Location:offerloanyes.php");
}
if($intarest == 'NO'){
    header("Location:offerloanno.php");
}
?>