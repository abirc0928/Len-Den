<?php
  session_start();
  $ok = $_SESSION['ok'];
  $email = $_SESSION['email'];
  if($ok==null){
    header('location:login.php');
  }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget Password</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="img/logoFav.png">
    <link rel="stylesheet" href="css/styels.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

</head>

<body>

    <div class="container-fluid" style="height: 100%;">
        <div class="row h-100">

            <div class="d-flex flex-column align-items-center justify-content-center h-100" style="margin-top:10%">
                <div class="col-lg-12 col-md-12 sm-12 lasttt2">

                    <center>

                        <h3 class="login mb-1">Password Reset</h3>
                        <h5 class="m-4" style="color:gray;">Enter Your New Password</h5>
                        <form action="updatepass.php" method="post">
                        <div class="form-group w-25">
                            <input type="password" class="form-control form-control email fn" name="npass" aria-describedby="emailHelp" placeholder="New Password" required>
                            <input type="hidden" name="email" value="<?php echo $email ?>">
                        </div>



                        <div class="btn1 w-25">
                            <button type="submit" class="btn btn-warning custom-btn">Submit</button>
                            <button type="button" onclick="location.href='login.php';" class="btn btn-warning custom-btn2 mt-1" style="color:white" ;>Return Login</button>
                        </div>
                        </form>
                    </center>


                </div>

            </div>




        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>