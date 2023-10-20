<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('config.php');
require_once('PHPMailer-6.7.1/src/Exception.php');
require_once('PHPMailer-6.7.1/src/PHPMailer.php');
require_once('PHPMailer-6.7.1/src/SMTP.php');

if(isset($_POST['sub'])){
    // Registration
    if($_POST['sub'] == 'submit'){
        $lName = $_POST['lastname'];
        $fName = $_POST['firstname'];
        $no = $_POST['no'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $type_scho = $_POST['type_scho'];
        $scho_percent = $_POST['scho_percent'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usertable WHERE user = '".$email."'";
        $result = $con->query($sql);

        if ($result->num_rows>0) {
            header("Location: http://localhost/OSE_Project/OSE%20PROJECT/registration.php?event=1");
            die();
        }else{
            $sql = "INSERT INTO usertable VALUES (NULL, '".$email."', '".MD5($password)."', '".$fName."', '".$lName."', '".$dob."', '".$address."', '".$no."', '".$type_scho."', '".$scho_percent."', NOW())";

            if ($con->query($sql) === TRUE) {	  
                //PHPMailer
                $mail = new PHPMailer;

                $mail->isSMTP(); 
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'OSE.landing@gmail.com';
                $mail->Password = 'hwzpgfjopesgkoqa';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
    
                $mail->setFrom('OSE.landing@gmail.com', 'OSE Email Support');
                $mail->addAddress($email, $fName . ' ' . $lName);
                $mail->Subject = 'Welcome to the OSE Portal';
                $mail->Body = 'Hi '.$fName.', this is an email confirmation that you have successfully registered in the OSE Portal. Thank you!';
    
                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                }
                header("Location: http://localhost/OSE_Project/OSE%20PROJECT/login.php");
                die();
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }

    // Login
    } else if($_POST['sub'] == 'login'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usertable WHERE user='".$email."' AND pwd='".MD5($password)."'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            session_start();
            while($fetch = $result->fetch_assoc()){
                $user_id = $fetch['user_id'];
            }
            $_SESSION['user_id'] = $user_id;
            header("Location: http://localhost/OSE_Project/OSE%20PROJECT/homepage.php");
            die();
        } else {
            header("Location: http://localhost/OSE_Project/OSE%20PROJECT/login.php?event=1");
            die();
        }
    }
}

if(isset($_GET['type'])){
    // Logout
    if($_GET['type'] == 'logout'){
        session_start();
        session_destroy();
        header("Location: http://localhost/OSE_Project/OSE%20PROJECT/login.php");
        die();
    }
}
?>
