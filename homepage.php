<?php
require_once('config.php');
session_start();
$ses = 0;
if (empty($_SESSION)){
	header("Location: http://localhost/OSE_Project/OSE%20PROJECT/login.php");
	die();
}else{
	$ses = 1;
}
?>

<script>
function enrollmentmessage() {
   alert('You are being redirected to SIS in a new tab for Enrollment viewing.');
}
function clearancemessage() {
   alert('You are being redirected to SIS in a new tab for Clearance viewing.');
}
</script> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="homepage">
      <h1>Homepage</h1>
      <a onclick="enrollmentmessage()" href="http://apps.benilde.edu.ph/sis/" target="_blank" class="link-cont"><span>Enrollment</span></a>
      <a href="schedule-viewing.php" class="link-cont"><span>Schedule</span></a>
      <a onclick="clearancemessage()" href="http://apps.benilde.edu.ph/sis/" target="_blank" class="link-cont"><span>Clearance</span></a>
      <a href="requirement-viewing.php" class="link-cont"><span>View Requirements</span></a>
      <div class="logo">
      <div class="logout"><img src="OSE logo.jpg"/></div>
        <a href="process.php?type=logout"><span class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="main">
    <?php
        $sql = "SELECT * FROM usertable WHERE user_id = '".$_SESSION['user_id']."'";
        $result = $con->query($sql);
        if($result->num_rows>0){ 
            while($fetch = $result->fetch_assoc()){
              $_SESSION['studentid'] = $fetch['user_id'];
    ?>
      <div class="top">
        <div class="img-wrapper">
          <img class="unknown_user" src="unknown user.jpg" />
          <h1 style="font-weight:300;">Student ID</h1>
          <h2  style="font-weight:300;"><?php echo $fetch['user_id'] ?></h2>
        </div>
        <div class="status">
          <h2  style="font-weight:300;">Status:</h2>
          <h1  style="font-weight:300;">ENROLLED</h1>
        </div>
      </div>
      <div class="form-wrapper">
        <form action="">
          <div class="input-group">
            <h2 class="col1">Last Name:</h2>
            <h2 class="col2"><?php echo $fetch['user_lastName'] ?></h2>
          </div>
          <div class="input-group">
            <h2 class="col1">First Name:</h2>
            <h2 class="col2"><?php echo $fetch['user_firstName'] ?></h2>
          </div>
          <div class="input-group">
            <h2 class="col1">Birth Date:</h2>
            <h2 class="col2"><?php echo $fetch['user_birthDate'] ?></h2>
          </div>
          <div class="input-group">
            <h2 class="col1">Address:</h2>
            <h2 class="col2"><?php echo $fetch['user_address'] ?></h2>
          </div>
          <div class="input-group">
            <h2 class="col1">Contact Number:</h2>
            <h2 class="col2"><?php echo $fetch['user_contactNumber'] ?></h2>
          </div>
          <div class="input-group">
            <h2 class="col1">Email:</h2>
            <h2 class="col2"><?php echo $fetch['user'] ?></h2>
          </div>
          <div class="input-group">
            <h2 class="col1">Type of Scholarship:</h2>
            <h2 class="col2"><?php echo $fetch['type_scholarship'] ?></h2>
          </div>
          <div class="input-group">
            <h2 class="col1">Scholarship Percentage:</h2>
            <h2 class="col2"><?php echo $fetch['scholar_percentage'] ?>%</h2>
          </div>
        </form>
      </div>
      <?php
        }
      }
      ?>
      <div class="back-wrapper"><a href="grades.php">View Grades</a></div>
    </div>
  </body>
</html>
