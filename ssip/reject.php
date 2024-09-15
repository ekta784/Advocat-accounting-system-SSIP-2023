<?php
include("connect.php");

$id = $_POST['id'];

$data=mysqli_query($conn, "update register set status='Rejected' where  ID='$id'");
$d=mysqli_query($conn,"select email from register where ID=$id");
                  $row = mysqli_fetch_array($d);
                  $email = $row['email'];
if(isset($_POST['id'])){

$remark=$_POST['remark'];


// Subject
$subject = 'Rejceted Mail for adovcate registration';

// Message
// $message = '
// <html>
// <head>
//   <title>Birthday Reminders for August</title>
// </head>
// <body>
//   <p>Here are the birthdays upcoming in August!</p>
//   <table>
//     <tr>
//       <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
//     </tr>
//     <tr>
//       <td>Johny</td><td>10th</td><td>August</td><td>1970</td>
//     </tr>
//     <tr>
//       <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
//     </tr>
//   </table>
// </body>
// </html>
// ';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] =$email;
$headers[] = 'From: Rejected  <yashshah28072004@gmail.com>';
// $headers[] = 'Cc: birthdayarchive@example.com';
// $headers[] = 'Bcc: birthdaycheck@example.com';
$to = $email;
// Mail it
$t = mail($to, $subject, $remark, implode("\r\n", $headers));
  
    
    /*if($mail->send()){
        //echo "Mail send";
    }else{
        //echo "Error occur";
    }*/

    if($data){
        // echo "record deleted";
        header("location: advocateDetails.php");
        die;

    }else{
        // echo "error in deleting record";
    }
}
// echo "<pre>";
// print_r($_POST['approved']);
// die();

?>