<?php
include("connect.php");

$id = $_GET['id'];

$data=mysqli_query($conn, "update register set  status='Rejected' where  ID='$id'");


if($data){
     // echo "record deleted";
     header("location: advocateDetails.php");

}else{
     // echo "error in deleting record";
}
?>