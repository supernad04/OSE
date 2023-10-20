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
    <style>
h2{
    margin-top: 10px;
    margin-left: 30px;
    margin-bottom: 20px;
    border-top: 5px;
    font-family: arial;
    font-size: 20px;
}
button{
    background-color: #64483A;
    width: 120px;
    height: 60px;
    border-radius: 10px;
    border-width: 0px;
    font-size: 40px;
    color: white;
    margin-top: 150px;
    margin-left: 650px;
}
form{
    text-align: center;
    font-size: large;
    font-family: arial;
    font-weight: bold;
    margin-left: 150px;
}
th, td{
    padding: 15px;
}
a{
    color: white;
    text-decoration: none;
}
    </style>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Grade Edit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="homepage">
      <h1>My Grades</h1>
      <a onclick="enrollmentmessage()" href="http://apps.benilde.edu.ph/sis/" target="_blank" class="link-cont"><span>Enrollment</span></a>
      <a href="schedule-viewing.php" class="link-cont"><span>Schedule</span></a>
      <a onclick="clearancemessage()" href="http://apps.benilde.edu.ph/sis/" target="_blank" class="link-cont"><span>Clearance</span></a>
      <a href="requirement-viewing.php" class="link-cont"><span>View Requirements</span></a>
      <div class="logo">
      <div class="logout"><a href="homepage.php"><img src="OSE logo.jpg"></a></div>
        <a href="process.php?type=logout"><span class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="main">
      <h2>Grades</h2>

      <?php 
        $sql_term = "SELECT DISTINCT term FROM grades WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $terms = $con -> query($sql_term);
      ?>

      <form action="grade_edit.php">
          <select name="term">
          <option value="" selected="selected">Select Term</option>
            <?php
              while ($term = mysqli_fetch_array($terms, MYSQLI_ASSOC)):;
            ?>
            <option value="<?php echo $term['term'];?>"<?php echo $_GET['term']==$term['term']?'selected':'';?>>
              <?php echo $term['term']; ?>
            </option>
            <?php endwhile; ?>
          </select>
          <input type="submit" name="Filter">
        </form>

      <form action="grade_edit_sql.php" method="post">
        <table>
            <tr>
              <th>Course</th>
              <th>Final Grade</th>
            </tr>

            <?php
            $sql = "SELECT grades_id, course FROM grades WHERE user_id = '".$_SESSION['user_id']."' AND term = '".$_GET['term']."'";
            $result = $con -> query($sql);

            if ($result -> num_rows > 0) {
              while ($row = $result -> fetch_assoc()) {
                echo "<input type='hidden' name='gradeid[]' value=". $row['grades_id'] ." />";
                echo "
                <tr>
                  <td>
                    ". $row["course"] ."
                  </td>
                  <td>
                    <select name='grade[]'>
                        <option value='4.0'>4.0</option>
                        <option value='3.5'>3.5</option>
                        <option value='3.0'>3.0</option>
                        <option value='2.5'>2.5</option>
                        <option value='2.0'>2.0</option>
                        <option value='1.5'>1.5</option>
                        <option value='1.0'>1.0</option>
                        <option value='R'>R</option>
                    </select>
                  </td>
                </tr>";
              } 

              echo "</table>";
            } else {
              echo "Empty table";
            }

            $con -> close();
            ?>
        <div style="display: flex; justify-content: flex-start;">
            <input type="submit" value="Save" name="save_select">
        </div>
        
        <a href="grades.php"><button type="button">Back</a></button>
    </form>
    </div>
  </body>
</html>