<?php
include("connect.php");

$id = $_GET['id'];


$data=mysqli_query($conn, "update register set  u_type='superior' where  ID='$id'");


if($data){
     // echo "record deleted";
     header("location: superadmincaseDetails.php");

}else{
     // echo "error in deleting record";
}
?>