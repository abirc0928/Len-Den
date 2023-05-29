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
        $image = $row["image"];
        $gender = $row["Gender"];
        $pass = $row["password"];
        }

   
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Userhome</title>
  <link rel="stylesheet" href="css/styels.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <link rel="icon" href="img/logoFav.png">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      font-family: "Dosis";
    }
  </style>

<body>


  <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-sm p-3 bg-white">
    <div class="container-fluid">

      <a class="navbar-brand logo" href="#">
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


  <div class="container-fluid main-body">

    <div class="row mbody">
      <div class="col-lg-6 col-md-12 col-sm-12 col-one">
        <h2 class="t1">LEN-DEN</h2>
        <h5 class="t2">A Loan Management System</h5>
        <p class="onep">Len-Den is a loan management system for the students of United International
          University. Student can take loan from each other with interest or without
          interest. This is a automated system where it will remaind your next instalment
          with amount, due amount etc. Users can communicate with each other through
          messeging. This is a helping hand for the students of United International
          University in there crisis.</p>
        <button onclick="location.href='#next';" class="btn btn-warning cus-b3">Get Started</button>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12 col-two">
        <img class="img-3 d-none d-lg-block " src="img/3.png" alt="img">
        <center><img class="w-75 img-3 d-none d-md-block d-lg-none" src="img/3.png" alt="img"></center>
        <center><img class="img-3 d-md-none d-sm-block d-lg-none" src="img/3.png" alt="img"></center>
      </div>

    </div>


    <section id="next">

      <center>
        <h2 class="t1 epad">Requested Loans</h2>
      </center>
      <table id="example" class="container-fluid dataTables_wrapper table table-borderless" style="width:100%">
        <thead class="">
          <th>&nbsp;</th>




        </thead>
        <tbody>

          <tr>

            <td>
              <div class="row row-cols-1 row-cols-md-3">
                <div class="col-lg-3 col-md-6 cardsss w-33.33">
                  <div class="card shadow p-3 mb-5 bg-white rounded">
                    <img src="img/jubs.jpg" class="card-img-top custom2" alt="...">
                    <div class="card-body">

                      <h5 class="card-title">Name: Josephine Langford</h5>
                      <p class="bb"><b class="a">ID:</b> 011191254</p>
                      <p class="bb"><b class="a">Loan Amount:</b> ৳5000</p>
                      <p class="bb"><b class="a">Want to Give Interest:</b> Yes</p>
                      <p class="bb"><b class="a">Resoning:</b> I am Buying a Phone</p>
                      <p class="bb"><b class="a">Comfortable Deadline:</b> 2022-12-05</p>
                      <button type="button" class="w-100 btn btn-warning cus-b1">Offer Loan</button>


                    </div>
                  </div>
                </div>


                <div class="col-lg-3 col-md-6 cardsss w-33.33">
                  <div class="card shadow p-3 mb-5 bg-white rounded">
                    <img src="img/jubs.jpg" class="card-img-top custom2" alt="...">
                    <div class="card-body">

                      <h5 class="card-title">Name: Josephine Langford</h5>
                      <p class="bb"><b class="a">ID:</b> 011191254</p>
                      <p class="bb"><b class="a">Loan Amount:</b> ৳5000</p>
                      <p class="bb"><b class="a">Want to Give Interest:</b> Yes</p>
                      <p class="bb"><b class="a">Resoning:</b> I am Buying a Phone</p>
                      <p class="bb"><b class="a">Comfortable Deadline:</b> 2022-12-05</p>
                      <button type="button" class="w-100 btn btn-warning cus-b1">Offer Loan</button>

                    </div>
                  </div>
                </div>



                <div class="col-lg-3 col-md-6 cardsss w-33.33">
                  <div class="card shadow p-3 mb-5 bg-white rounded">
                    <img src="img/jubs.jpg" class="card-img-top custom2" alt="...">
                    <div class="card-body">

                      <h5 class="card-title">Name: Josephine Langford</h5>
                      <p class="bb"><b class="a">ID:</b> 011191254</p>
                      <p class="bb"><b class="a">Loan Amount:</b> ৳5000</p>
                      <p class="bb"><b class="a">Want to Give Interest:</b> Yes</p>
                      <p class="bb"><b class="a">Resoning:</b> I am Buying a Phone</p>
                      <p class="bb"><b class="a">Comfortable Deadline:</b> 2022-12-05</p>
                      <button type="button" class="w-100 btn btn-warning cus-b1">Offer Loan</button>

                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 cardsss w-33.33">
                  <div class="card shadow p-3 mb-5 bg-white rounded">
                    <img src="img/jubs.jpg" class="card-img-top custom2" alt="...">
                    <div class="card-body">

                      <h5 class="card-title">Name: Josephine Langford</h5>
                      <p class="bb"><b class="a">ID:</b> 011191254</p>
                      <p class="bb"><b class="a">Loan Amount:</b> ৳5000</p>
                      <p class="bb"><b class="a">Want to Give Interest:</b> Yes</p>
                      <p class="bb"><b class="a">Resoning:</b> I am Buying a Phone</p>
                      <p class="bb"><b class="a">Comfortable Deadline:</b> 2022-12-05</p>
                      <button type="button" class="w-100 btn btn-warning cus-b1">Offer Loan</button>

                    </div>
                  </div>
                </div>
              </div>
            </td>

          </tr>

         






        </tbody>
      </table>
    </section>
  </div>
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-white text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between padfff border-bottom">
      <!-- Left -->

      <!-- Left -->

      <!-- Right -->

      <!-- Facebook -->
      <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>



      <!-- Instagram -->
      <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
      <!-- Github -->
      <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>

      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              LEN-den
            </h6>
            <p>
              Len-Den is a non-profitable organization to help the students of United International University.
              For any query contact with us from provided contact methods.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->


          <!-- Grid column -->

          <!-- Grid column -->

          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3 text-secondary"></i> United City, Madani Avenue, Badda, Dhaka</p>
            <p>
              <i class="fas fa-envelope me-3 text-secondary"></i>
              jhossen191254@bscse.uiu.ac.bd
            </p>
            <p><i class="fas fa-phone me-3 text-secondary"></i> 01858145460</p>

          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="#">LEN-DEN.COM</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        "lengthMenu": [
          [3, 6, 10, 20],
          [3, 6, 10, 20]
        ]
      }, {
        "ordering": false
      });
    });
  </script>
  <script src="https://use.fontawesome.com/2c7ebecd35.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script>
    function cpass(email, pass) {
      console.log();
      Swal.fire({
        

        html: '<br><label>Old Password</label><br>' +
          '<input type="password" id="swal-input1" class="swal2-input required"><br>' +
          '<br><label>New Password</label><br>' +
          '<input type="password" id="swal-input2" class="swal2-input required"><br>' +
          '<br><label>Confirm New Password</label><br>' +
          '<input type="password" id="swal-input3" class="swal2-input required">',
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


</body>

</html>