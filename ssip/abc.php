<?php
// require __DIR__ . '/assets/vendor/autoload.php'; // Ensure the correct path to the autoload.php file

// use Twilio\Rest\Client;

include("connect.php");
$id = $_GET['id'];
session_start();
if(!isset($_SESSION['logedin']) || $_SESSION['logedin']!=true  )
  {
    echo "<script> alert('Please login to continue')</script>";
      header('location:loginpage.php');
  }
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get the remark from the form
//     $remark = $_POST['remark'];

//     // Check which button was clicked
//     if (isset($_POST['approve'])) {
//         $data = mysqli_query($conn, "select * from register where ID=$id");
//         $row = mysqli_fetch_array($data);

//         $accountSid = 'ACc1ec2c0c3ab4c0db70d65ca6c9a62586'; // Replace with your Twilio Account SID
//         $authToken = '8b2ae3915a17c7bf5b20d5f1470f6777';   // Replace with your Twilio Auth Token
//         $twilioPhoneNumber = '+14129069284';  // Replace with your Twilio Phone Number

//         // Recipient's phone number (can be fetched from the database)
//         $recipientPhoneNumber = '+917778049568';  // Replace with the actual recipient's phone number

//         // Create a Twilio client
//         $twilio = new Client($accountSid, $authToken);

//         try {
//             // Send a message
//             $message = $twilio->messages->create(
//                 $recipientPhoneNumber,
//                 [
//                     'from' => $twilioPhoneNumber,
//                     'body' => $remark,
//                 ]
//             );

//             echo "Message sent successfully!";
//         } catch (Exception $e) {
//             echo "Error: " . $e->getMessage();
//         }
//     }

//     if (isset($_POST['reject'])) {
//       $data = mysqli_query($conn, "select * from register where ID=$id");
//       $row = mysqli_fetch_array($data);

//       $accountSid = 'ACc1ec2c0c3ab4c0db70d65ca6c9a62586'; // Replace with your Twilio Account SID
//       $authToken = '8b2ae3915a17c7bf5b20d5f1470f6777';   // Replace with your Twilio Auth Token
//       $twilioPhoneNumber = '+14129069284';  // Replace with your Twilio Phone Number

//       // Recipient's phone number (can be fetched from the database)
//       $recipientPhoneNumber = '+917016472708';  // Replace with the actual recipient's phone number

//       // Create a Twilio client
//       $twilio = new Client($accountSid, $authToken);

//       try {
//           // Send a message
//           $message = $twilio->messages->create(
//               $recipientPhoneNumber,
//               [
//                   'from' => $twilioPhoneNumber,
//                   'body' => $remark,
//               ]
//           );

//           echo "Message sent successfully!";
//       } catch (Exception $e) {
//           echo "Error: " . $e->getMessage();
//       }
//   }
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin dashboard</title>
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
      <a href="admindashboard.html" class="logo d-flex align-items-center">
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
              <h6>John Snow</h6>
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
        <a class="nav-link collapsed " href="admindashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="adminCases.php">
          <i class="bi bi-card-list"></i>
          <span>Cases</span>
        </a>
      </li> -->
      
      
        
      <li class="nav-item">
        <a class="nav-link " href="advocateDetails.php">
          <i class="bi bi-card-list"></i>
          <span>Advocate Details</span>
        </a>
      </li>
    

    <li class="nav-item">
      <a class="nav-link collapsed" href="adminbills.php">
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


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admindashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Advocate Details</li>
          <!-- <li class="breadcrumb-item active">Case Details</li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <div class="col-lg-12">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <?php
                  $data=mysqli_query($conn,"select * from register where ID=$id");
                  $row = mysqli_fetch_array($data);
                  ?>
                  <h5 class="card-title"><?php echo $row["Full_name"];?>  </h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?php echo $row["designation"];?></h6>
                  <p class="card-text">
                    
                  
                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>User Name</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["Full_name"];?>  </div>
                  </div><br>
                  
                  
                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Full Name </b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["Short_name"] ; ?></div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Bar Register Number</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["bar_number"] ; ?></div>
                  </div><br>

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Attached Bar council Card</b></div>
                     <div class="col-lg-9 col-md-8"><button type="button" class="btn btn-primary"><a href="bardoc/<?php echo $row['bar_img'];?>"  style="color:white" target="" >View</a></button>
</div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Advocate Type</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["case_type"] ; ?></div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Email</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["email"] ; ?></div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Phone Number</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["phone_number"] ; ?></div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>FAX</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["fax"] ; ?></div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Designation</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["designation"] ; ?></div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Pan Card Number</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["pan_number"] ; ?></div>
                  </div><br>
                  
                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Attached Pan Card</b></div>
                     <div class="col-lg-9 col-md-8"><button type="button" class="btn btn-primary"><a href="pandoc/<?php echo $row['pan_img'];?>"  style="color:white" target="" >View</a></button>
</div>
                  </div><br>

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Bank Number</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["account_number"] ; ?></div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>IFSC Code</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["ifsc_code"] ; ?></div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Account  Number</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["bank_name"] ; ?></div>
                  </div><br>

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Attached Cheque/PassBook</b></div>
                     <div class="col-lg-9 col-md-8"><button type="button" class="btn btn-primary"><a href="passdoc/<?php echo $row['pass_img'];?>"  style="color:white" target="" >View</a></button>
</div>
                    </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Joining Date</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["joining_date"] ; ?></div>
                  </div><br>
                  

                  <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Account Type</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["account_type"] ; ?> </div>
                  </div><br>
                  

                  <!-- <div class="row">
                     <div class="col-lg-3 col-md-4 label"><b>Bank Number</b></div>
                     <div class="col-lg-9 col-md-8"><?php echo $row["account_number"] ; ?></div>
                  </div><br>
                  <div class="row"> -->

                <script>
                    function formSubmit(type){
                      
                      if(type==1){
                        document.getElementById("f1").action="approve.php";
                      }
                      else
                      document.getElementById("f1").action="reject.php";
                      
                      document.getElementById("f1").submit();
                    }
                </script>

                  <?php
            if ($row["status"] == 'pending') {
            ?>
            <form name="form" method="post"  id="f1">
                <b>Remark:</b>
                  <div class="form-outline">
                  <textarea class="form-control" id="textAreaExample1" rows="4" name="remark"></textarea>
                 <br>
                 <input type="hidden" name="id" value=<?php echo  $row['ID']; ?> >
                  <button class="btn btn-primary" name="approved"><a href="#" onclick="javascript:return formSubmit(1);" style="color:white;">Approve</a></button>
                  <button class="btn btn-danger" name="reject"><a href="#" onclick="javascript:return formSubmit(0);" style="color:white;">Reject</a></button><br><br>
                  </form>
<?php
}
               else {
                ?>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label"><b>Status</b></div>
                  <div class="col-lg-9 col-md-8">
                    <?php if ($row["status"] == 'Approved') { ?>
                      <span class="badge bg-success"><?php echo $row["status"];
                                                    } ?></span>
                      <?php if ($row["status"] == 'Rejected') { ?>
                        <span class="badge bg-danger"><?php echo $row["status"];
                                                    } ?></span><BR></BR>
                  </div>

                </div>
              <?php
              }
              ?>
                  <a href="advocateDetails.php" class="card-link">Back</a>
                  <!-- <a href="#" class="card-link">Another link</a> -->
                </div>
        </div>
    </div>