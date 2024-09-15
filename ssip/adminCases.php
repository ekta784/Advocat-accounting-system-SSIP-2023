<?php
require __DIR__ . '/assets/vendor/autoload.php'; // Ensure the correct path to the autoload.php file

use Twilio\Rest\Client;

include("connect.php");
$id = $_GET['id'];
session_start();
if(!isset($_SESSION['logedin']) || $_SESSION['logedin']!=true  )
  {
    echo "<script> alert('Please login to continue')</script>";
      header('location:loginpage.php');
    }
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   // if($x == 1) 
//   //   $q ="approved";

  
//   // Get the remark from the form
//   $remark = $_POST['remark'];

//   // Check which button was clicked
//   if (isset($_POST['approve']))
//    {
// include('smtp/PHPMailerAutoload.php');

// echo smtp_mailer('$','Subject','html');
// function smtp_mailer($to,$subject, $msg){
// 	$mail = new PHPMailer(); 
// 	$mail->IsSMTP(); 
// 	$mail->SMTPAuth = true; 
// 	$mail->SMTPSecure = 'tls'; 
// 	$mail->Host = "smtp.gmail.com";
// 	$mail->Port = 587; 
// 	$mail->IsHTML(true);
// 	$mail->CharSet = 'UTF-8';
// 	//$mail->SMTPDebug = 2; 
// 	$mail->Username = "yashshah28072004@gmail.com";
// 	$mail->Password = "uxjkgoxtdhnqazwd";
// 	$mail->SetFrom("yashshah28072004@gmail.com");
// 	$mail->Subject = $subject;
// 	$mail->Body =$msg;
// 	$mail->AddAddress($to);
// 	$mail->SMTPOptions=array('ssl'=>array(
// 		'verify_peer'=>false,
// 		'verify_peer_name'=>false,
// 		'allow_self_signed'=>false
// 	));
// 	if(!$mail->Send()){
// 		echo $mail->ErrorInfo;
// 	}else{
// 		return 'Sent';
// 	}
// }
//   }

//   if (isset($_POST['reject']))  {
//     include('smtp/PHPMailerAutoload.php');
    
//     echo smtp_mailer('$','Subject','html');
//     function smtp_mailer($to,$subject, $msg){
//       $mail = new PHPMailer(); 
//       $mail->IsSMTP(); 
//       $mail->SMTPAuth = true; 
//       $mail->SMTPSecure = 'tls'; 
//       $mail->Host = "smtp.gmail.com";
//       $mail->Port = 587; 
//       $mail->IsHTML(true);
//       $mail->CharSet = 'UTF-8';
//       //$mail->SMTPDebug = 2; 
//       $mail->Username = "yashshah28072004@gmail.com";
//       $mail->Password = "uxjkgoxtdhnqazwd";
//       $mail->SetFrom("yashshah28072004@gmail.com");
//       $mail->Subject = $subject;
//       $mail->Body =$msg;
//       $mail->AddAddress($to);
//       $mail->SMTPOptions=array('ssl'=>array(
//         'verify_peer'=>false,
//         'verify_peer_name'=>false,
//         'allow_self_signed'=>false
//       ));
//       if(!$mail->Send()){
//         echo $mail->ErrorInfo;
//       }else{
//         return 'Sent';
//       }
//     }
//       }
// }
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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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
      <a href="advocatedashboard.html" class="logo d-flex align-items-center">
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
              <span>Judge</span>
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
        <a class="nav-link collapsed" href="admindashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" href="advocateDetails.php">
          <i class="bi bi-card-list"></i>
          <span>Advocate Details</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link " href="adminbills.php">
          <i class="bi bi-cash-stack"></i>
          <span>Bills</span>
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
      <h1>Cases</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="advocatedashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <!-- <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                

            <!-- <div class="card-body">
                  <h5 class="card-title">Clients <span>| Year</span></h5>

                  <div class="d-flex align-items-center">
                    
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
      <!-- </div>End Sales Card -->

      <!-- Revenue Card -->
      <!-- <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                

      <!-- <div class="card-body">
                  <h5 class="card-title">Pending Cases <span>| City</span></h5>

                  <div class="d-flex align-items-center">
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
      <!-- </div>End Revenue Card -->

      <!-- Customers Card -->
      <!-- <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                

       <div class="card-body">
                  <h5 class="card-title">Rejected Cases<span>| Case</span></h5>

                  <div class="d-flex align-items-center">
                    
                    <div class="ps-3">
                      <h6><?php
                          $rejected = mysqli_query($conn, "select count(status) as rejected from detail where status='rejected'");
                          $values = mysqli_fetch_assoc($rejected);
                          $num_rows = $values["rejected"];
                          echo "" . $num_rows . "";
                          ?></h6>
                      <!--<span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>-->

           </div>
      </div>

      </div>
      </div>

      <!-- </div>End Customers Card -->


      <!-- Recent Sales -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">

          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Court</a></li>
              <li><a class="dropdown-item" href="#">Date</a></li>
              <li><a class="dropdown-item" href="#">Year</a></li>
              <li><a class="dropdown-item" href="#">City</a></li>
              <li><a class="dropdown-item" href="#">Client Name</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title">Case List <span>| Advocate Name</span></h5>
            <?php
            $data = mysqli_query($conn, "select * from detail where 	case_number=$id ");
            $row = mysqli_fetch_array($data);
            ?>

            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>Case No.</b></div>
              <div class="col-lg-9 col-md-8">
                <?php echo $row["case_number"]; ?>
              </div>
            </div><br>
            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>Client Name</b></div>
              <div class="col-lg-9 col-md-8">
                <?php echo $row["cilent_name"]; ?>
              </div>
            </div><br>
            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>Case Type</b></div>
              <div class="col-lg-9 col-md-8">
                <?php echo $row["case_type"]; ?>
              </div>
            </div><br>
            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>Date</b></div>
              <div class="col-lg-9 col-md-8">
                <?php echo $row["date"]; ?>
              </div>
            </div><br>
            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>Court</b></div>
              <div class="col-lg-9 col-md-8">
                <?php echo $row["court"]; ?>
              </div>
            </div><br>
            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>Income</b></div>
              <div class="col-lg-9 col-md-8">
                <?php echo $row["income"]; ?>
              </div>
            </div><br>
            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>City</b></div>
              <div class="col-lg-9 col-md-8">
                <?php echo $row["city"]; ?>
              </div>
            </div><br>
            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>Pin Code</b></div>
              <div class="col-lg-9 col-md-8">
                <?php echo $row["pincode"]; ?>
              </div>
            </div><br>
            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>Case Details</b></div>
              <div class="col-lg-9 col-md-8">
                <?php echo $row["details"]; ?>
              </div>
            </div><br>
            <div class="row">
              <div class="col-lg-3 col-md-4 label"><b>Attached Document</b></div>
              <div class="col-lg-9 col-md-8">
                <?php
                        ?>
                <!-- <button clas="btn btn-primary"><a href="uploads/<?php echo $row['document'];?>" target="" download>Download</a></button> -->
                <button type="button" class="btn btn-primary"><a href="uploads/<?php echo $row['document'];?>"
                    style="color:white" target="" download>Download</a></button>
                <?php  

                     ?>
              </div>
            </div><br>
            <?php
            if ($row["status"] == 'pending') {
            ?>
            <div class="row">
              <form action="" method="post">
                <b>Remark:</b>
                <div class="form-outline">
                  <textarea class="form-control" id="textAreaExample1" rows="4" name="remark"></textarea>
                  <br>
                  <button class="btn btn-primary" name="approve"><a
                      href="approvecase.php?id=<?php echo $row['case_number']; ?>"
                      style="color:white;">Approve</a></button>
                  <button class="btn btn-danger" name="reject"><a
                      href="rejectcase.php?id=<?php echo $row['case_number']; ?>"
                      style="color:white;">Reject</a></button><br><br>
              </form>
              <?php
            }
               else {
                ?>
              <div class="row">
                <div class="col-lg-3 col-md-4 label"><b>Status</b></div>
                <div class="col-lg-9 col-md-8">
                  <?php if ($row["status"] == 'Approved') { ?>
                  <span class="badge bg-success">
                    <?php echo $row["status"];
                                                    } ?>
                  </span>
                  <?php if ($row["status"] == 'Rejected') { ?>
                  <span class="badge bg-danger">
                    <?php echo $row["status"];
                                                    } ?>
                  </span><BR></BR>
                </div>

              </div>
              <?php
              }
              ?>


              <a href="advocateDetails.php" class="card-link">Back</a>

            </div>


          </div>

        </div>
      </div><!-- End Recent Sales -->


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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>