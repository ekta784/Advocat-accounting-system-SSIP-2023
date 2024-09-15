<?php
include "connect.php";
session_start();
if(!isset($_SESSION['logedin']) || $_SESSION['logedin']!=true )
  {
    echo "<script> alert('Please login to continue')</script>";
      header('location:loginpage.php');
    }
  
?>
<?php

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
  //     echo "Hello";
  //  echo "<pre>";
  //  print_r($_FILES['my_image']);
  //  echo "</pre>";
  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  if ($error === 0) {
    if ($img_size > 10000000) {
      echo " <script>
          alert('Sorry your file is too large')
         </script>";
    } else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);
      $allowed_exs = array("jpeg", "jpg", "png", "pdf");

      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_image_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = 'uploads/' . $new_image_name;
        move_uploaded_file($tmp_name, $img_upload_path);
      } else {
        echo " <script>
                     alert('Sorry your file is not allowed')
                 </script>";
      }
    }
  } else {
    echo " <script>
       alert('Unkown error occured')
     </script>";
  }

  $errors = array();


  $c = mysqli_query($conn, "select case_number   from detail where case_number  ='$_POST[casenumber]'");
  if (mysqli_num_rows($c) > 0) {
    $errors['c'] = '* Case number already exist';
  }


  if (count($errors) ==  0) {
    $s = mysqli_query($conn, "insert into detail (case_number, cilent_name, case_type, date, court, income, city, pincode, details, document, status,Advocate_name) values('$_POST[casenumber]','$_POST[clientname]','$_POST[casetype]','$_POST[date]','$_POST[court]','$_POST[income]','$_POST[city]','$_POST[pincode]','$_POST[details]','$new_image_name','pending','$_SESSION[username]')") or die(mysqli_error($conn));
    if ($s) {
      echo "<script> alert('Bill has been submitted Succesfully') </script>";
    } else {
      echo "<script> alert('Failed') </script>";
    }
    header("location: advocatedashboard.php");
  }
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Advocate dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="caseRegister.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .hide {
      display: none;
    }

    .visible {
      display: block;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.html" class="logo d-flex align-items-center">
        <!--<img src="assets/img/logo.png" alt="">-->
        <span class="d-none d-lg-block">Legal Department</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['username']  ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['username']  ?></h6>
              <span>Advocate</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="advocatedashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="cases.php">
          <i class="bi bi-card-list"></i>
          <span>Cases</span>
        </a>
      </li>
         -->
      <li class="nav-item">
        <a class="nav-link" href="caseRegister.php">
          <i class="bi bi-card-list"></i>
          <span>Case Register</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="advocateIncome.php">
          <i class="bi bi-cash-stack"></i>
          <span>Income</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li>

    </ul>

  </aside>


  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Case Register</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="advocatedashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Case Register</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Case</a></li>
                    <li><a class="dropdown-item" href="#">Year</a></li>
                    <li><a class="dropdown-item" href="#">City</a></li>
                    
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Clients</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php
                          $client = mysqli_query($conn, "select count(cilent_name) as total from detail");
                          $values = mysqli_fetch_assoc($client);
                          $num_rows = $values["total"];
                          echo "" . $num_rows . "";
                          ?></h6>
                      <!--<span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Case</a></li>
                    <li><a class="dropdown-item" href="#">Year</a></li>
                    <li><a class="dropdown-item" href="#">City</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Pending Cases </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php
                          $pending = mysqli_query($conn, "select count(status) as pending from detail where status='pending'");
                          $values = mysqli_fetch_assoc($pending);
                          $num_rows = $values["pending"];
                          echo "" . $num_rows . "";
                          ?></h6>
                      <!--<span class="text-success small pt-1 fw-bold">2%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Case</a></li>
                    <li><a class="dropdown-item" href="#">Year</a></li>
                    <li><a class="dropdown-item" href="#">City</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Rejected Cases</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-x"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php
                          $rejected = mysqli_query($conn, "select count(status) as rejected from detail where status='Rejected'");
                          $values = mysqli_fetch_assoc($rejected);
                          $num_rows = $values["rejected"];
                          echo "" . $num_rows . "";
                          ?></h6>
                      <!--<span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>-->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <section class="container">
              <header>Submit Case details</header>
              <form action="" name="form" method="post" class="form" enctype="multipart/form-data">
                <!--<div class="input-box">
                    <label>Case Name</label>
                    <input type="text" placeholder="Enter full name"  />
                  </div>
          
                  <div class="input-box">
                    <label>Email Address</label>
                    <input type="text" placeholder="Enter email address"  />
                  </div>-->

                <div class="column">
                  <div class="input-box">
                    <label>Case Number</label>
                    <input type="number" name="casenumber" placeholder="Enter case number" required />
                    <p class="text-danger"><?php if (isset($errors['c'])) echo $errors['c']    ?></p>

                  </div>
                  <div class="input-box">
                    <label>Date</label>
                    <input type="date" name="date" placeholder="Enter Appearance date" />
                  </div>
                </div>
                <!-- <div class="gender-box">
                    <label>Advocate type</label>
                    <div class="gender-option">
                      <div class="gender" >
                        <input type="radio" value="Civil" id="Civil" name="casetype" >
                        <label for="Civil">AGP(civil)</label><br><br>
                        <input type="radio" value="Criminal" id="Criminal" name="casetype" />
                        <label for="Criminal">APP(criminal)</label>
                      </div>
                    </div>
                  </div>
                   -->

                <div class="gender-box">
                  <label>Advocate type</label><br>
                  <div class="gender-option">
                    <div class="gender">
                      <input type="radio" id="Civil" name="casetype" onchange="showOptions('Civil')" required />
                      <label for="Civil">AGP(civil)</label>
                      <select name="Civil" id="CivilOptions" class="hide">
                        <option value="Divorse cases">Divorse cases</option>
                        <option value="Rent matters">Rent matters</option>
                        <option value="Sale of land cases">Sale of land cases</option>
                        <option value="Tort claims">Tort claims</option>
                        <option value="Commertial">Commertial</option>
                        <option value="Business disputes">Business disputes</option>
                        <option value="partnership disputes">partnership disputes</option>
                        <option value="corporate">corporate</option>
                      </select>
                    </div>
                    <div class="gender">
                      <input type="radio" id="Criminal" name="casetype" onchange="showOptions('Criminal')" required />
                      <label for="Criminal">APP(criminal)</label>
                      <select name="Criminal" id="CriminalOptions" class="hide">
                        <option value="Murder">Murder</option>
                        <option value="Rapes">Rapes</option>
                        <option value="Robbery">Robbery</option>
                        <option value="Assult">Assult</option>
                        <option value="arson">arson</option>
                        <option value="theft">theft</option>
                        <option value="dacoity">dacoity</option>
                      </select>
                    </div>

                  </div>
                </div>





                <!-- <div class="input-box address">
                    <div class="column">
                      <div class="select-box">
                        <select>
                          <option hidden>Fee type</option>
                          <option value="New" >New</option>
                          <option value="Pending" >Pending</option>
                       
                        </select>
                      </div>
                      <input type="text" name="city" placeholder="Enter city of Case"  />
                    </div>
                    <div class="column">
                      <input type="text" name="court" placeholder="Enter Court"  />
                      <input type="number" name="pincode" placeholder="Enter pincode"  />
                      <input type="text" name="city" placeholder="Enter city of Case"  />
                    </div>
                  </div> -->
                <div class="input-box">
                  <div class="column">
                    <div class="select-box">
                      <select name="court" required>
                        <option hidden>Select Court</option>
                        <option value="Supreme Court">Supreme Court</option>
                        <option value="High Court">High Court</option>
                        <option value="District Court">District Court</option>
                        <option value="Session Court">Session Court</option>
                        <option value="Appellate Court">Appellate Court</option>
                      </select>
                    </div>
                    <input type="number" name="pincode" placeholder="Enter pincode" required />
                    <input type="text" name="city" placeholder="Enter city of Case" required />
                  </div>
                </div>
                <div class="column">
                  <div class="input-box">
                    <label>Case Detail:-</label>
                    <textarea class="form-control" name="details" id="textAreaExample1" rows="11" required></textarea>

                  </div>
                  <div class="input-box">
                    <label>Attach document</label>
                    <input type="file" name="my_image" placeholder="Upload File" accept="jpg,jpeg,png,pdf" required />
                    <p class="text-danger">* Enter jpeg, jpg, png and pdf file belove 10mb</p>
                    <label>Client Name</label>
                    <input type="text" name="clientname" placeholder="Enter Client Name" required />
                    <label>Fee Amount</label>
                    <input type="number" name="income" placeholder="Enter fee Amount" required />
                  </div>
                </div>
                <input type="submit" value="Submit" name="submit" style="height: 55px;
    width: 25%;
    border-radius: 5px;
    border: 2px solid black;
    color: #000;
    font-size: 1rem;
    font-weight: 400;
    margin-top: 30px;
    cursor: pointer;
    transition: all 0.2s ease;
    background: white;
    position: relative;
    left: 252px;">

              </form>
            </section>



          </div>

        </div>


      </div>
      </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!--
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">-->
  <!-- All the links in the footer should remain intact. -->
  <!-- You can delete the links only if you purchased the pro version. -->
  <!-- Licensing information: https://bootstrapmade.com/license/ -->
  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
  <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>-->
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    function showOptions(category) {
      // Hide all options
      document.getElementById('CivilOptions').classList.remove('visible');
      document.getElementById('CriminalOptions').classList.remove('visible');

      // Show options based on selected category
      document.getElementById(category + 'Options').classList.add('visible');
    }


    // function validate(){
    //       // border color 
    //       var x = document.getElementById("") // value fetch

    //       condifion {
    //         textbox id.style.borderColor = ""
    //       }
    // }
  </script>

</body>

</html>