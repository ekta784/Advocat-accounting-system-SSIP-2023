<?php
include("connect.php");
session_start();
if (isset($_POST['login'])) {

  $count=0;
  
  $username=$_POST["username"];
  $password=$_POST["password"];
  $result=mysqli_query($conn,"select * from register where Full_name='$username' && password='$password'  && status='Approved'");
  $count=mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);
  if ($count > 0){

      $_SESSION['username'] = $username;
      $_SESSION["logedin"] = true;
    if ($row["u_type"] == 'admin') {
    
      header('location:superadminview.php');
    } elseif ($row["u_type"] == 'user') {
      header('location:advocatedashboard.php');
    }else if($row["u_type"] == 'superior')
    {

      header('location:admindashboard.php');
    }
    } else {
    
      echo " <script>
      alert('Username or password is wrong')
  </script>";
  
    }
    };
    
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="abc/img/favicon.png" rel="icon">
  <link href="abc/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="abc/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="abc/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="abc/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="abc/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="abc/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="abc/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="abc/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="abc/css/style.css" rel="stylesheet">
  <link href="xyz/css/main.css" rel="stylesheet">
  <link href="xyz/css/variables.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admindashboard.html" class="logo d-flex align-items-center">
       <!--<img src="assets/img/logo.png" alt="">--> 
        <span class="d-none d-lg-block" style="text-transform: capitalize">Legal Department</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- End Search Icon-->

        <!-- End Notification Nav -->

       <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
            <span class="d-none d-md-block dropdown-toggle ps-2">My Profile</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            
            

            <li>
              <a class="dropdown-item d-flex align-items-center" href="loginpage.php">
                <i class="bi bi-person"></i>
                <span>Login</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="registrationForm.php">
                <i class="bi bi-gear"></i>
                <span>Register</span>
              </a>
            </li>
            

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->

  <aside id="sidebar" class="sidebar" style="top:0px">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item collapsed">
        <a class="nav-link collapsed " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link" href="loginpage.php">
          <i class="bi bi-card-list"></i>
          <span>Login/Register</span>
        </a>
      </li>
      
      
        
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-card-list"></i>
          <span>Steps</span>
        </a>
      </li>
    

  

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>About Us</span>
        </a>
      </li>

    </ul>

  </aside>

      
<!-- End Sidebar-->






  
  <main id="main" class="main">
    <div class="container" >

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!-- <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="abc/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div>End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your  User name &  password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" name="form">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">User name</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Login</a></button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="registrationForm.php">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <!-- <div class="credits">
                All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div> --> 

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="abc/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="abc/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="abc/vendor/chart.js/chart.umd.js"></script>
  <script src="abc/vendor/echarts/echarts.min.js"></script>
  <script src="abc/vendor/quill/quill.min.js"></script>
  <script src="abc/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="abc/vendor/tinymce/tinymce.min.js"></script>
  <script src="abc/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="abc/js/main.js"></script>

</body>

</html>