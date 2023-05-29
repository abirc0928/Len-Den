<?php
session_start();
$not_break = $_SESSION['not_break'];
if ($not_break == null) {
  header('location:login.php');
}
?>
<?php
session_start();
$email = $_SESSION['email'];
include '_dbconnect.php';
$sql2 = "SELECT * FROM user WHERE email = '$email';";
$result1 = mysqli_query($con, $sql2);
$num1 = mysqli_num_rows($result1);



while ($row = $result1->fetch_assoc()) {
  $name = $row["name"];
  $v_id = $row["versity_id"];
  $image = $row["image"];
  $facebook = $row["facebook"];
  $phone = $row["phone"];
  $insta = $row["instagram"];
  $gender = $row["Gender"];
  $rating = $row["rating"];
  $pass = $row["password"];
}

$stk;
$flag = 0;

$sql2x = "SELECT * FROM loan WHERE loan_taker = '$email';";
$result1x = mysqli_query($con, $sql2x);
$num1x = mysqli_num_rows($result1x);

$sql22x = "SELECT * FROM user WHERE email = '$email';";
$result2x = mysqli_query($con, $sql22x);
while ($row2x = $result2x->fetch_assoc()) {
    $stk = $row2x["rating"];
}


$val = (int)$stk;
while ($rowx = $result1x->fetch_assoc()) {

    $deadline = $rowx["deadline"];
    $due = $rowx["due"];
    $loan_id=$rowx["loan_id"];

    if ($deadline < date('Y-m-d') && $due > 0) {
        $val = $val + 1;
        $flag = 1;
    }

    $qfffx =  "UPDATE `user` SET `rating`='$val' WHERE email='$email';";
    $runfffx = mysqli_query($con, $qfffx);

    if ($flag == 1) {
        $n_date = date('Y-m-d', strtotime($deadline . ' + 7 days'));
        $qfff2x =  "UPDATE `loan` SET `deadline`='$n_date' WHERE loan_id='$loan_id';";
        $runfff2x = mysqli_query($con, $qfff2x);
        $qfff2xx =  "UPDATE `given_loan` SET `deadline`='$n_date' WHERE loan_id='$loan_id';";
        $runfff2xx = mysqli_query($con, $qfff2xx);
        $flag = 0;
    }

}
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="css/profile.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link rel="icon" href="img/logoFav.png">
  <link rel="stylesheet" href="css/styels.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
  <style>
    body {
      font-family: "Dosis";
      
    }
  </style>


</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light shadow-sm p-3 bg-white">
    <div class="container-fluid">

      <a class="navbar-brand logo" href="home.php">
        <img src="img/logo.png" alt="" width="100">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php"><i class="fa-solid fa-house-user"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="my_loans.php"><i class="fa-solid fa-coins"></i> My Loans</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="my_req_loans.php"><i class="fa-solid fa-file-contract"></i> My Requested Loans</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="my_loan_offers.php"><i class="fa-solid fa-piggy-bank"></i> My Loan Offers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="loan_offer_given.php"><i class="fa-solid fa-gifts"></i> My Given Offers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="my_given_loans.php"><i class="fa-solid fa-hand-holding-dollar"></i> My Given Loans</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active b" aria-current="page" href="req.php"><i class="fa-brands fa-shopify"></i> Request Loan</a>
          </li>

          <li class="nav-item">
            <!-- <a class="nav-link active b" aria-current="page" href="#"><i class="fa-solid fa-hand-holding-dollar"></i> My Given Loans</a> -->

            <div class="dropdown">
                            <a class="nav-link active dropdown-toggle" aria-current="page" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bell"></i></a>
                            <ul class="dropdown-menu dropdown-menusss dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <?php include '_dbconnect.php';
                                $sql2xx = "SELECT * FROM notification WHERE rcv_email = '$email';";
                                $result1xx = mysqli_query($con, $sql2xx);
                                $num1xx = mysqli_num_rows($result1);
                                while ($rowxx = $result1xx->fetch_assoc()) {
                                    $n_email = $rowxx["sender_email"];
                                    $n_num = $rowxx["number"];
                                    $n_time = $rowxx["time"];
                                    $n_amount = $rowxx["amount"];

                                ?>
                                    <li><a class="dropdown-item" href="#"><b style="color:brown;"><i class="fa-solid fa-clock"></i> &nbsp;<?php echo $n_time?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa-solid fa-user"></i> <b>Sender:</b> &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;<?php echo $n_email?> &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-phone"></i> <?php echo $n_num?>&nbsp;&nbsp;&nbsp; <b>৳ </b><?php echo $n_amount?></a></li>

                                <?php } ?>


                            </ul>
                        </div>
          </li>

          <li class="nav-item">
            <!-- <a class="nav-link active b" aria-current="page" href="#"><i class="fa-solid fa-hand-holding-dollar"></i> My Given Loans</a> -->

            <div class="dropdown">
            <?php if($image=="FemaleImage"){?>
                
                <img class="dropdown-toggle pro" src="img/Female.png" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php }?>
              <?php if($image=="MaleImage"){?>
                <img class="dropdown-toggle pro" src="img/man.png" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php }?>
              <?php if($image!="MaleImage" && $image!="FemaleImage"){?>
              <img class="dropdown-toggle pro" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php }?>

              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user"></i> My Profile</a></li>
                <li><a class="dropdown-item" onclick="cpass('<?php echo $email;?>', '<?php echo $pass;?>')"><i class="fa-solid fa-key"></i> Change Password</a></li>
                <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <section class="section about-section gray-bg" id="about">
    <div class="container">
      <!-- <div class="align-items-center flex-row-reverse d-flex justify-content-around w-75">
        <div class="">
          <div class="about-text go-to w-100">
            <h3 class="dark-color"><?php echo $name ?></h3>
            <h6 class="theme-color lead"><i class="fa-solid fa-id-card"></i> <?php echo $v_id ?></h6>
            <div class="row about-list">
              <div class="col-md-6">
                <div class="media">
                  <label><i class="fa-solid fa-venus-mars"></i> Gender</label>
                  <p><?php echo $gender ?></p>
                </div>
                <div class="media">
                  <label><i class="fa-solid fa-envelope"></i> Email</label>
                  <p><?php echo $email ?></p>
                </div>
                <div class="media">
                  <label><i class="fa-solid fa-phone"></i> Phone</label>
                  <p><?php echo $phone ?></p>
                </div>
                <div class="media">
                  <button onclick="window.location.href='eprofile.php'" class="btn1"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</button>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="w-75">
          <div class="about-avatar">
            <img class="custom img-fluid" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" title="" alt="">
          </div>
        </div>
      </div> -->
      <div class="flex-wrap">
        <div class="d-flex flex-md-row flex-column justify-content-center">

          <div class="about-avatar">
          <?php if($image=="FemaleImage"){?>
                
                <img class="custom" src="img/Female.png" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php }?>
              <?php if($image=="MaleImage"){?>
                <img class="custom" src="img/man.png" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php }?>
              <?php if($image!="MaleImage" && $image!="FemaleImage"){?>
                <img class="custom" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" title="" alt="">              <?php }?>
            
          </div>



          <div class="about-text go-to">
            <h3 class="dark-color"><?php echo $name ?></h3>
            <h6 class="theme-color lead"><i class="fa-solid fa-id-card"></i> <?php echo $v_id ?></h6>
            <div class="about-list">
              
                <div class="media">
                  <label><i class="fa-solid fa-venus-mars"></i> Gender</label>
                  <p><?php echo $gender ?></p>
                </div>
                <div class="media">
                  <label><i class="fa-solid fa-envelope"></i> Email</label>
                  <p><?php echo $email ?></p>
                </div>
                <div class="media">
                  <label><i class="fa-solid fa-phone"></i> Phone</label>
                  <p><?php echo $phone ?></p>
                </div>
                <div class="media w-100">
                  <button onclick="window.location.href='eprofile.php'" class="btn1"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</button>
                </div>

              

            </div>
          </div>


        </div>
      </div>
      <div class="counter">
        <div class="row">

          <div class="col-12 col-lg-4 col-md-4 col-sm-4 bc">
            <div class="count-data text-center">
              <a href="<?php echo $facebook ?>" class="count h2"><i class="fa-brands fa-facebook"></i></a>
              <p class="m-0px font-w-600">Facebook</p>
            </div>
          </div>

          <div class="col-12 col-lg-4 col-md-4 col-sm-4 bc">
            <div class="count-data text-center">
              <a href="<?php echo $insta ?>" class="count h2"><i class="fa-brands fa-instagram"></i></a>
              <p class="m-0px font-w-600">Instagram</p>
            </div>
          </div>
          
          <div class="col-12 col-lg-4 col-lg-4 col-md-4 col-sm-4">
            <div class="count-data text-center" style="color:red">
              <a class="count h2"><i class="fa-solid fa-triangle-exclamation"> <?php echo $rating ?></i></a>
              <p class="m-0px font-w-600">Strike</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script>
    function cpass(email, pass) {
      console.log();
      Swal.fire({
        

        html: '<br><label>Old Password</label><br>' +
          '<input id="swal-input1" class="swal2-input required"><br>' +
          '<br><label>New Password</label><br>' +
          '<input id="swal-input2" class="swal2-input required"><br>' +
          '<br><label>Confirm New Password</label><br>' +
          '<input id="swal-input3" class="swal2-input required">',
        focusConfirm: false,

        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Change Password',
        showLoaderOnConfirm: true,

        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        if (result.isConfirmed) {

          if (document.getElementById('swal-input1').value == "" || document.getElementById('swal-input2').value == "" || document.getElementById('swal-input3').value == "") {
            Swal.fire('Field can not be empty', '', 'error')
          } else if (document.getElementById('swal-input2').value == document.getElementById('swal-input3').value) {
            enop = document.getElementById('swal-input1').value;
            enop2 = document.getElementById('swal-input2').value;
            
              if(pass == enop){

                link="update.php?email="+email+"&&npass="+enop2;
                location.href = link;
              }else{
                Swal.fire('Old Password did not matched', '', 'error')
              }
          
          } else {
            Swal.fire('Password did not matched', '', 'error')
          }
        } else {
          Swal.fire('Password changing proccess reverted', '', 'warning')
        }
      })
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>