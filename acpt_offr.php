<?php
include '_dbconnect.php';



$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$s = "SELECT * from offerloan where id=$id";
$r = mysqli_query($con, $s);

while ($row = $r->fetch_assoc()) {
    $loan_giver=$row["loan_giver"];
    $loan_taker=$row["loan_taker"];
    $amount=$row["amount"];
    $intarest=$row["intarest"];
    $amount_intarest=$row["amount_intarest"];
    $deadline=$row["deadline"];
    $req_id=$row["req_id"];
}

$sql2 = "INSERT INTO `loan`(`loan_id`,`loan_giver`, `loan_taker`, `amount`, `intarest`, `amount_intarest`, `deadline`, `due`) VALUES ('$req_id','$loan_giver','$loan_taker','$amount','$intarest','$amount_intarest','$deadline','$amount_intarest')";
$result2 = mysqli_query($con, $sql2);

$sql = "DELETE FROM offerloan WHERE id= $id";
$result = mysqli_query($con, $sql);

$sqld = "DELETE FROM loan_req WHERE id= $req_id";
$resultd = mysqli_query($con, $sqld);


$sqlf = "INSERT INTO `given_loan`(`loan_id`,`loan_giver`, `loan_taker`, `amount`, `intarest`, `amount_intarest`, `deadline`, `due`) VALUES ('$req_id','$loan_giver','$loan_taker','$amount','$intarest','$amount_intarest','$deadline','$amount_intarest')";
$resultf = mysqli_query($con, $sqlf);

$con->close();

header("Location: my_loans.php");
exit();
?>