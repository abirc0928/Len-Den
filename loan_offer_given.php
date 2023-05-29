<?php
session_start();
$not_break = $_SESSION['not_break'];
if ($not_break == null) {
  header('location:login.php');
}
?>
<?php


$email = $_SESSION['email'];
include '_dbconnect.php';
$sql2 = "SELECT * FROM user WHERE email = '$email';";
$result1 = mysqli_query($con, $sql2);
$num1 = mysqli_num_rows($result1);

while ($row = $result1->fetch_assoc()) {
  $pass = $row["password"];
  $image = $row["image"];
  $gender = $row["Gender"];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>My Given Offers</title>
  <link rel="stylesheet" href="css/styels.css">
  <link rel="icon" href="img/fav.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="css/table.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link rel="icon" href="img/logoFav.png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">




</head>

<body>

  <nav class="navbar navbar-expand-lg bg-light shadow-sm p-3 bg-white">
    <div class="container-fluid">

      <a class="navbar-brand logo" href="home.php">
        <img src="img/logo.png" alt="" width="100">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="text-dark fa-solid fa-bars"></i></span>
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
                  <li><a class="dropdown-item" href="#"><b style="color:brown;"><i class="fa-solid fa-clock"></i> &nbsp;<?php echo $n_time ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa-solid fa-user"></i> <b>Sender:</b> &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;<?php echo $n_email ?> &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-phone"></i> <?php echo $n_num ?>&nbsp;&nbsp;&nbsp; <b>৳ </b><?php echo $n_amount ?></a></li>

                <?php } ?>


              </ul>
            </div>
          </li>

          <li class="nav-item">
            <!-- <a class="nav-link active b" aria-current="page" href="#"><i class="fa-solid fa-hand-holding-dollar"></i> My Given Loans</a> -->

            <div class="dropdown">
              <?php if ($image == "FemaleImage") { ?>

                <img class="dropdown-toggle pro" src="img/Female.png" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php } ?>
              <?php if ($image == "MaleImage") { ?>
                <img class="dropdown-toggle pro" src="img/man.png" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php } ?>
              <?php if ($image != "MaleImage" && $image != "FemaleImage") { ?>
                <img class="dropdown-toggle pro" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <?php } ?>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user"></i> My Profile</a></li>
                <li><a class="dropdown-item" onclick="cpass('<?php echo $email; ?>', '<?php echo $pass; ?>')"><i class="fa-solid fa-key"></i> Change Password</a></li>
                <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="mt">

    <h2 class="aaa"><i class="fa-solid fa-gifts"></i> My Given Offers</h2>
    <h4 class="aaaa">All of your given offers to others shown here</h4>
    <div class="overflow-auto">
      <table id="example" class="table table-borderless table-hover table-striped" style="width:100%">

        <thead class="table-dark ccc">
          <th>Offer Taker Image</th>
          <th>Offer Taker Name</th>
          <th>Offer Taker ID</th>
          <th>Offer Taker Email</th>
          <th>Total Amount</th>
          <th>Interest Rate</th>
          <th>Amount With Interest</th>

          <th>Deadline</th>
          <th>Action</th>

        </thead>
        <tbody>
          <?php
          include '_dbconnect.php';
          $email = $_SESSION['email'];
          $q =  "SELECT * FROM offerloan where loan_giver='$email';";
          $run = mysqli_query($con, $q);
          $html = "";

          if (mysqli_num_rows($run) > 0) {
            while ($row = $run->fetch_assoc()) {

              $d_id = $row["id"];
              $t_email = $row["loan_taker"];
              $q2 =  "SELECT * FROM user where email='$t_email';";
              $run2 = mysqli_query($con, $q2);


              while ($row2 = $run2->fetch_assoc()) {
                $g_email = $row2["email"];
                $g_name = $row2["name"];
                $g_vID = $row2["versity_id"];
                $g_img = $row2["image"];
              }
          ?>

              <tr>
                <td>
                  <?php if ($g_img == "MaleImage") { ?>
                    <a class="custom3" href="profile2.php?id=<?php echo $g_email ?>">
                      <img class="custom" src="img/man.png" alt="img">
                    </a>
                  <?php } ?>
                  <?php if ($g_img == "FemaleImage") { ?>
                    <a class="custom3" href="profile2.php?id=<?php echo $g_email ?>">
                      <img class="custom" src="img/Female.png" alt="img">
                    </a>
                  <?php } ?>
                  <?php if ($g_img != "MaleImage" && $g_img != "FemaleImage") { ?>
                    <a class="custom3" href="profile2.php?id=<?php echo $g_email ?>">
                      <img class="custom" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($g_img); ?>" alt="img">
                    </a>
                  <?php } ?>
                </td>
                <td>
                  <?php echo $g_name ?>
                </td>
                <td>
                  <?php echo $g_vID  ?>

                </td>
                <td>
                  <?php echo $row["loan_giver"]  ?>

                </td>
                <td>
                  <?php echo $row["amount"]  ?>

                </td>
                <td>
                  <?php echo $row["intarest"] ?>

                </td>
                <td>
                  <?php echo $row["amount_intarest"]  ?>

                </td>
                <td>
                  <?php echo $row["deadline"]  ?>

                </td>
                <td>


                  <a onclick="f3(<?php echo $d_id; ?>)" class="btn btn-lg btn-block btn btn-danger w-100"> <i class="fa-solid fa-trash"></i> Delete</a>
                </td>
              </tr>
          <?php }
          }


          ?>




        </tbody>
      </table>
    </div>

  </div>
  <script>
    function f3(e) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#D22B2B',
        cancelButtonColor: '#808080',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          //your code of yes goes here
          link = "del_offer.php?id=" + e;
          location.href = link;

        }
      })
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
  <script src="https://use.fontawesome.com/2c7ebecd35.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

            if (pass == enop) {

              link = "update.php?email=" + email + "&&npass=" + enop2;
              location.href = link;
            } else {
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

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>