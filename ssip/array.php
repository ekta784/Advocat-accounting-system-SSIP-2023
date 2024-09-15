<?php
$servername="localhost";
$username="root";
$password="";

$connect=mysqli_connect($servername,$username,$password);
$daata=mysqli_select_db();
if($connect)
{
    echo "Connected successfully";
}
else
{
   echo $error;
}

?>