<?php
include '_dbconnect.php';


$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "DELETE FROM offerloan WHERE id= $id";
$result = mysqli_query($con, $sql);

$con->close();

header("Location: loan_offer_given.php");
exit();
?>