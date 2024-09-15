<?php
include("connect.php");
if(isset($_POST['submit']) && isset($_FILES['my_image']))
{
    echo 'hello';
//   $img_name=$_FILES['my_image']['name'];
//   $img_size=$_FILES['my_image']['size'];
//   $tmp_name=$_FILES['my_image']['tmp_name'];
//   $error=$_FILES['my_image']['error'];
  
//   if($error===0)
//   {
//    if($img_size > 150)
//    {
//       //  $em="Sorry your file is too large";
//       //   header("location:adminCases.php?error=$em");
//         echo " <script>
//       alert('Sorry your file is too large')
//   </script>";
//    }
//    else
//    {
//        $img_ex= pathinfo($img_name, PATHINFO_EXTENSION);
//        $img_ex_lc= strtolower($img_ex);
//        $allowed_exs= array("jpeg","jpg","png");

//        if(in_array($img_ex_lc, $allowed_exs))
//        {
//            $new_image_name= uniqid("IMG-",true).'.'.$img_ex_lc;
//            $img_upload_path ='bills/'.$new_image_name;
//            move_uploaded_file($tmp_name,$img_upload_path);
//        }
//        else{
//            $em="Sorry your file is not allowed";
//            header("location:adminCases.php?error=$em");

//        }
//    }

//   }
//   else{
//    $em="Unkown error occured";
//    header("location:adminCases.php?error=$em");
//   }

//  mysqli_query($conn, "insert into detail bills value($new_image_name) where case_number='$id' " or die(mysqli_error($conn)));
}
?>