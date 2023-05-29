<?php
session_start();
$email = $_SESSION['email'];
$stk;
$flag = 0;
include '_dbconnect.php';
$sql2 = "SELECT * FROM loan WHERE loan_taker = '$email';";
$result1 = mysqli_query($con, $sql2);
$num1 = mysqli_num_rows($result1);

$sql22 = "SELECT * FROM user WHERE email = '$email';";
$result2 = mysqli_query($con, $sql22);
while ($row2 = $result2->fetch_assoc()) {
    $stk = $row2["rating"];
}


$val = (int)$stk;
while ($row = $result1->fetch_assoc()) {

    $deadline = $row["deadline"];
    $due = $row["due"];
    $loan_id=$row["loan_id"];

    if ($deadline < date('Y-m-d') && $due > 0) {
        echo "sdafdsdf";
        $val = $val + 1;
        echo $val;
        $flag = 1;
    }

    $qfff =  "UPDATE `user` SET `rating`='$val' WHERE email='$email';";
    $runfff = mysqli_query($con, $qfff);

    if ($flag == 1) {
        $n_date = date('Y-m-d', strtotime($deadline . ' + 7 days'));
        $qfff2 =  "UPDATE `loan` SET `deadline`='$n_date' WHERE loan_id='$loan_id';";
        $runfff2 = mysqli_query($con, $qfff2);
        $flag = 0;
    }

}

?>
