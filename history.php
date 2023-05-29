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


        
     while($row = $result1->fetch_assoc()){
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

  <title>My Transaction History</title>
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
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Abir Gives yous 200 TK</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Your payment of Jubayer's loan is sucessfull</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Abir Gives yous 200 TK</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Your payment of Jubayer's loan is sucessfull</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Abir Gives yous 200 TK</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Your payment of Jubayer's loan is sucessfull</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Abir Gives yous 200 TK</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Your payment of Jubayer's loan is sucessfull</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Abir Gives yous 200 TK</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Your payment of Jubayer's loan is sucessfull</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Abir Gives yous 200 TK</a></li>
                <li><a class="dropdown-item" href="#"><b><i class="fa-solid fa-clock"></i> &nbsp;2022-05-14 13:40:39</b> &nbsp;&nbsp; Your payment of Jubayer's loan is sucessfull</a></li>
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
                <li><a class="dropdown-item" href="history.php"><i class="fa-solid fa-clock-rotate-left"></i> My Transaction History</a></li>
                <li><a class="dropdown-item" onclick="cpass('<?php echo $email;?>', '<?php echo $pass;?>')"><i class="fa-solid fa-key"></i> Change Password</a></li>
                <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
              </ul>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="mt">

    <h2 class="aaa"><i class="fa-solid fa-clock-rotate-left"></i> My Transaction History</h2>
    <h4 class="aaaa">All of your transaction history shown here</h4>
    <div class="overflow-auto">
      <table id="example" class="table table-borderless table-hover table-striped" style="width:100%">

        <thead class="table-dark ccc">
          <th>Image</th>
          <th>Name</th>
          <th>ID</th>
          <th>Total Amount</th>
          <th>Due Amount</th>
          <th>Interest Rate</th>
          <th>Deadline</th>
          <th>Pay</th>

        </thead>
        <tbody>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>
          <tr>
            <td><img class="custom" src="img/jubs.jpg" alt="img"></td>
            <td>Josephine Langford</td>
            <td>011191254</td>
            <td>৳5000</td>
            <td>৳2000</td>
            <td>11%</td>
            <td>2022-12-01</td>
            <td><button type="button" class="btn custom-btn"><i class="fa-solid fa-paper-plane"></i> Pay</button></td>
          </tr>




        </tbody>
      </table>
    </div>

  </div>
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

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>