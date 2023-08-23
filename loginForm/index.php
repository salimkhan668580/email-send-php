<!doctype html>
<html lang="en">
  <head>
    <!-- ..................font awsome............................ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid ">
        <div class="row  main-row">
            <div class="col-12 col-md-8 col-lg-5 a  rounded p-4" id="main">
              <h3 class="text-center  pt-5 pb-3 pb-4">Login form</h3>


              <!-- .................................php............................../............. -->
     <?php

     //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './phpMailer/Exception.php';
require './phpMailer/PHPMailer.php';
require './phpMailer/SMTP.php';


          
          $servername="localhost";
          $username='root';
          $password="";
            $db="test";

      $conn=mysqli_connect($servername,$username,$password,$db);


  if(isset($_POST['submit'])){

              $name=$_POST['name'];
              $number=$_POST['number'];
              $email=$_POST['email'];
              $text=$_POST['textArea'];

              $sql="INSERT INTO `login` (`Sr.`, `Name`, `Phone`, `Email`, `Message`, `Data`) VALUES(NULL, '$name', '$number', '$email', '$text', current_timestamp())";
              $run=mysqli_query($conn, $sql);
              if($run){
                ?>
                <div class="alert alert-success" role="alert">
                  Thank you  your data is submited
                </div>
              <?php
              }else{
                ?>
                <div class="alert alert-danger" role="alert">
                Your  data is Not submitted  
                </div>
              <?php
              
              }
            // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>.mail function>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
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
                        $mail->setFrom('salimkhan668580s@gmail.com', 'salimTeam');
                        $mail->addAddress("$email", "$name");     //Add a recipient
            
            
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Submission Report';
                        $mail->Body    = "Thank you <b>$name</b> This is the Auto Generated mail please do not reply our team will connect with you soon ";
            
            
                        $mail->send();
                        echo '<script>alert("Check your mail for conformation")</script>';
                    } catch (Exception $e) {
                      echo '<script>alert("mail was not send")</script>';
                    }
  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>mail end.>>>>>>>>>>>>>>>>>>>>>>>>>>>
  }



?>

     
     
     
  
    
    
             



              <form  method="post">

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                  <input type="text" class="form-control"  name="name" placeholder=" User name" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                  <input type="number" name="number" class="form-control" placeholder="Phone" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                 
                  <textarea name="textArea"  cols="70" rows="5" class="form-control" ></textarea>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-primary" type="submit" name="submit">Button</button>
 

             
                  
                </div>
              </form>
            </div>
        </div>

    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>