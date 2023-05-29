<?php
include '_dbconnect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $deadline = $_POST['deadline'];
    $amount = $_POST['amount'];
    $re = $_POST['reason'];
    $intarest= $_POST['intarest'];
    $email = $_SESSION['email'];
    
    $sql2 = "SELECT * FROM user WHERE email = '$email';";
    $result1 = mysqli_query($con, $sql2);
    $num1 = mysqli_num_rows($result1);

    if($num1 > 0){
        
     while($row = $result1->fetch_assoc()){
        $name = $row["name"];
        $v_id = $row["versity_id"];
        $email = $row["email"];
        $image = base64_encode($row["image"]);
        }
   }
//    echo $name;
//    echo "\n";
//    echo $v_id;
//    echo "\n";
//    echo $amount;
//    echo "\n";
//    echo $intarest;
//    echo "\n";
//    echo $deadline;
//    echo "\n";
//    echo $re;
   $sql = "INSERT INTO `loan_req` (`img`, `name`, `v_id`, `amount`, `intarest`, `reason`, `deadline`, `email`) VALUES ('$image','$name','$v_id','$amount','$intarest','$re','$deadline','$email');";
    $result = mysqli_query($con, $sql);
    $_SESSION['success'] = "Request added successfully";
    header("Location:req.php");
    exit();

}
?>