<?php
@include 'connect.php';
?>
<?php
if (isset($_POST['register'])) {
   
    $fullname="$_POST[fullname]";
    $shortname= "$_POST[shortname]";
    $barnumber="$_POST[brn]";
    $casetype="$_POST[casetype]";
    $email="$_POST[email]";
    $pnumber="$_POST[pnumber]";
    $fax="$_POST[fax]";
    $designation="$_POST[designation]";
    $pannumber= "$_POST[pannumber]";
    $accountnumber="$_POST[accountnumber]";
    $ifsccode="$_POST[ifsccode]";
    $bankname="$_POST[bankname]";
    $date="$_POST[date]";
    $accounttype="$_POST[accounttype]";
    $password= "$_POST[password]";
    
    $errors= array();


    $b=mysqli_query($conn,"select bar_number  from register where bar_number ='$barnumber' ")  ;
    $e=mysqli_query($conn,"select email from register where email='$email' ")  ;
    $p=mysqli_query($conn,"select phone_number  from register where phone_number ='$pnumber' ")  ;
    $pan=mysqli_query($conn,"select pan_number  from register where pan_number ='$pannumber ' ")  ;
    $acc=mysqli_query($conn,"select account_number  from register where account_number ='$accountnumber ' ")  ;

 
  if(mysqli_num_rows($b)> 0)
    {
      $errors['b']='* Bar number  already exist';
    }
     if(mysqli_num_rows($e)> 0)
    {
      $errors['e']='* Email already exist';
    }

    if(mysqli_num_rows($p)> 0)
    {
      $errors['p']='* Phone number already exist';
    }
     if(mysqli_num_rows($pan)> 0)
    {
      $errors['pan']='* Pan number  already exist';
    }
     if(mysqli_num_rows($acc)> 0)
    {
      $errors['acc']='* Account number already exist';
    }
   

    if(count($errors)==  0)
    {



       $barIMage = $_FILES['bar_img']['name'];
      $tmpBar_name = $_FILES['bar_img']['tmp_name'];
    
      $img_ex = pathinfo($barIMage, PATHINFO_EXTENSION);
       $img_ex_lc = strtolower($img_ex);
      $allowed_exs = array("jpeg", "jpg", "png", "pdf");

     // if (in_array($img_ex_lc, $allowed_exs)) {
        $newBarImage = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $bar_img_upload_path = 'bardoc/' . $newBarImage;
        move_uploaded_file($tmpBar_name, $bar_img_upload_path);
      // } else {
      //   echo " <script>
      //                alert('Only JPG and PDF extensions are allowed');
      //            </script>";
      // }
      //echo $newBarImage; 
     

      $panIMage = $_FILES['pan_img']['name'];
      $tmppan_name = $_FILES['pan_img']['tmp_name'];
     
       $img_ex = pathinfo($panIMage, PATHINFO_EXTENSION);
       $img_ex_lc = strtolower($img_ex);
       $allowed_exs = array("jpeg", "jpg", "png", "pdf");
 
       if (in_array($img_ex_lc, $allowed_exs)) {
         $newpanImage = uniqid("IMG-", true) . '.' . $img_ex_lc;
         $pan_img_upload_path = 'pandoc/' . $newpanImage;
         move_uploaded_file($tmppan_name, $pan_img_upload_path);
       } else {
         echo " <script>
                      alert('Only JPG and PDF extensions are allowed');
                  </script>";
       }
       
       $passIMage = $_FILES['pass_img']['name'];
       $tmppass_name = $_FILES['pass_img']['tmp_name'];
      
        $img_ex = pathinfo($passIMage, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpeg", "jpg", "png", "pdf");
  
        if (in_array($img_ex_lc, $allowed_exs)) {
          $newpassImage = uniqid("IMG-", true) . '.' . $img_ex_lc;
          $pass_img_upload_path = 'passdoc/' . $newpassImage;
          move_uploaded_file($tmppass_name, $pass_img_upload_path);
        } else {
          echo " <script>
                       alert('Only JPG and PDF extensions are allowed');
                   </script>";
        }
   $result = mysqli_query($conn, "insert into register (Full_name, Short_name, bar_number,bar_img, case_type, email,phone_number, fax, designation, pan_number,pan_img, account_number, ifsc_code, bank_name,pass_img, joining_date, account_type, status,u_type,password) values('$fullname','$shortname','$barnumber','$newBarImage','$casetype','$email','$pnumber','$fax','$designation','$pannumber','$newpanImage','$accountnumber','$ifsccode','$bankname','$newpassImage','$date','$accounttype','pending','user','$password')") or die(mysqli_error($conn));

     if($result)
     {
      echo "<script> alert('Registered Succesfully') </script>";
      header('location:index.php');
     }
     else
     {
      echo "<script> alert('Failed') </script>";
     }
    }
    
  }

  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>registrationForm</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="abc/img/favicon.png" rel="icon">
  <link href="abc/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="abc/vendor/aos/aos.css" rel="stylesheet">
  <link href="abc/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="abc/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="abc/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="abc/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="abc/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <!-- <link href="abc/css/style.css" rel="stylesheet"> -->
  <link href="registrationForm.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="xyz/css/main.css" rel="stylesheet">
  <link href="xyz/css/variables.css" rel="stylesheet">

  
  



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- =======================================================
  * Template Name: Day
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
   <!-- ======= Header ======= -->
   <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admindashboard.html" style="text-decoration: none;" class="logo d-flex align-items-center">
       <!--<img src="assets/img/logo.png" alt="">--> 
        <span class="d-none d-lg-block" style="text-transform: capitalize; text-decoration: none;  ">Legal Department</span>
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

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
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
 
    
  <section class="vh gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

            <form action="#" method="post" class="form" name="form" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                      <input type="text" id="firstName" name="fullname" class="form-control form-control-lg" required>
                      <label class="form-label"  for="firstName">User Name</label>
                      <p><?php if(isset($errors['f'])) echo $errors['f']?></p>
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                      <input type="text" id="lastName" name="shortname" class="form-control form-control-lg" required>
                      <label class="form-label" for="lastName">Full Name</label>
                    </div>
  
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">
  
                    <div class="form-outline datepicker w-100">
                      <input type="text" class="form-control form-control-lg" name="brn" id="birthdayDate" required>
                      <label for="birthdayDate" class="form-label">Bar register Number</label>
                      <p class="text-danger"><?php if(isset($errors['b'])) echo $errors['b']    ?></p>
                    </div>
  
                  </div>
                  <div class="mb-3" style="    width: 48%;">
                  <input class="form-control" name="bar_img" type="file" id="formFile">
                  <label for="formFile" class="form-label">Attach Bar Council card</label>
                  </div>
                  <div class="col-md-6 mb-4">
  
                    <h6 class="mb-2 pb-1">Advocate type </h6>
                    
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="casetype" 
                        value="Civil" required> 
                      <label class="form-check-label"  for="Civil">Civil</label>
                      
                    </div>
  
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="casetype"
                        value="Criminal" required> 
                       <label class="form-check-label" for="Criminal">Criminal</label>
                      
                    </div>
  
                  </div>
                  <div class="mb-3" style="    width: 48%;">
                <input type="password" name="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                
                  <label for="inputPassword6" class="col-form-label">Password</label>
                </div>
                </div>
                
  
                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="email" name="email" id="emailAddress" class="form-control form-control-lg" required>
                      <label class="form-label" for="emailAddress">Email</label>
                      <p class="text-danger"><?php if(isset($errors['e'])) echo $errors['e']    ?></p>

                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="tel" id="phoneNumber" name="pnumber" class="form-control form-control-lg" required>
                      <label class="form-label" for="phoneNumber">Phone Number</label>
                      <p class="text-danger" ><?php if(isset($errors['p'])) echo $errors['p']    ?></p>

                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="FAX" name="fax" class="form-control form-control-lg" required>
                      <label class="form-label" for="FAX">FAX</label>
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="designation" name="designation" class="form-control form-control-lg" required>
                      <label class="form-label" for="designation">Designation</label>
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="panCardNumber" name="pannumber" class="form-control form-control-lg" required>
                      <label class="form-label" for="panCardNumber">PanCard Number</label>
                      <p class="text-danger" ><?php if(isset($errors['pan'])) echo $errors['pan']    ?></p>
                    </div>
  
                  </div>
                  <div class="mb-3" style="    width: 48%;">
                  <input class="form-control" type="file" name="pan_img" id="formFile">
                  <label for="formFile" class="form-label">Attach Pan card</label>
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="BankNumber" name="bankname" class="form-control form-control-lg" required>
                      <label class="form-label" for="BankNumber">Bank Name</label>
                    </div>
  
                  </div>
                  <div class="mb-3" style="     width: 48%;">
                  <input class="form-control" name="pass_img" type="file" id="formFile">
                  <label for="formFile" class="form-label">Attach cheque/passbook</label>
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="IFSCcode" name="ifsccode" class="form-control form-control-lg" required>
                      <label class="form-label" for="IFSC code">IFSC Code</label>
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="Account Number" name="accountnumber" class="form-control form-control-lg" required>
                      <label class="form-label" for="Account Number">Account Number</label>
                      <p class="text-danger" ><?php if(isset($errors['acc'])) echo $errors['acc']    ?></p>
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="date" id="Joining Date" name="date" class="form-control form-control-lg" required>
                      <label class="form-label" for="Joining Date">Joining Date</label>
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4">
  
                    <h6 class="mb-2 pb-1">Account type </h6>
  
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="accounttype" 
                        value="saving" required>
                      <label class="form-check-label" for="saving">Saving</label>
                    </div>
  
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="accounttype" 
                        value="current" required>
                      <label class="form-check-label" for="Current">Current</label>
                    </div>
                    
  
                  </div>
                  
                  
  
                <div class=" mb-2 pb-2" style="align-self: center;position: relative;
    left: 41%;">
                <button type="submit" name="register" class="btn btn-primary">Submit</button>
              </div> 
               
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>