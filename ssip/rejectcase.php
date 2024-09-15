<?php
include("connect.php");

$id = $_GET['id'];


$data=mysqli_query($conn, "update detail set  status='Rejected' where case_number='$id'");


if($data){
     // echo "record deleted";
     header("location: adminbills.php");

}else{
     // echo "error in deleting record";
}
?>
