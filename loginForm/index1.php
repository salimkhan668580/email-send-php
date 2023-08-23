<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post">

        <input type="text" placeholder="Enter your name" name="name"/>
        <textarea name="text"  cols="30" rows="10"></textarea>

 
        <input type="submit" value="Click here" name="submit"/>
    </form>

    
    

<?php
$servername="localhost";
$username='root';
$password="";
$db="test";

$conn=mysqli_connect($servername,$username,$password,$db);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
    
$name=$_POST['name'];
$text=$_POST['text'];

// $sql="INSERT INTO `login` (`Sr.`, `Name`, `Data`) VALUES (NULL, '$name', current_timestamp())";
//  $run=mysqli_query($conn, $sql);

 
//Load Composer's autoloader
require './phpMailer/Exception.php';
require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'salimkhan668580s@gmail.com';                     //SMTP username
    $mail->Password   = 'cvuvqnewzuqxgxur';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('salimkhan668580s@gmail.com', 'Contact Form');
    $mail->addAddress('khansalim0193@gmail.com', 'login form');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "This is the HTML message body <b>$text</b>";


    $mail->send();
    echo "<script>alert('Message has been sent')</script>";
} catch (Exception $e) {
  
    echo "<script>alert('Message could not be sent. Mailer Error:')</script>";
}


//  if($run){
//          echo "<h1>thank you</h1>";
//  }else{
//     echo "<h1> not submited </h1>";
//  }
}

?>
</body>
</html>