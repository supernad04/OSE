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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="script/getData.js"></script>
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
    <title>Grades</title>
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

    <?php 
      $sql_term = "SELECT DISTINCT term FROM grades WHERE user_id = '" . $_SESSION['user_id'] . "'";
      $terms = $con -> query($sql_term);
    ?>
    
    <div class="main">
      <h2>Grades</h2>
      <div style="text-align: right;">

        <?php
          echo $_GET['term'] ?? null;
        ?>

        <!-- try onchange form submit --> 
        <form action="grades.php" method="GET">
          <select name="term">
          <option value="" selected="selected">Select Term</option>
            <?php
              $currentTerm = "AY22-23 - 3T";
              while ($term = mysqli_fetch_array($terms, MYSQLI_ASSOC)):;
              $selected = ($term['term'] == $currentTerm) ? 'selected' : '';
            ?>
            <option value="<?php echo $term['term'];?>"<?php echo isset($_GET['term']) && $_GET['term'] == $term['term']?'selected':'';?>>
              <?php echo $term['term']; ?>
            </option>
            <?php endwhile; ?>
          </select>
          <input type="submit" name="Filter">
        </form>

        <!-- <form action="grades.php">
          <select name="term">
          <?php
            $currentTerm = "AY22-23 - 3T";
            while ($term = mysqli_fetch_array($terms, MYSQLI_ASSOC)):;
            $selected = ($term['term'] == $currentTerm) ? 'selected' : '';
          ?>
            <option value="<?php echo $term['term']; ?>" <?php echo $selected; ?>>
                <?php echo $term['term']; ?>
            </option>
          <?php endwhile; ?>
          </select>
        <input type="submit" name="Filter">
        </form> -->

        <!-- <form action="grades.php" method="get">
          <select name="getterms">
            <option value="" selected="selected">Select Term</option>
            <?php
              while ($term = mysqli_fetch_array($terms, MYSQLI_ASSOC)) {
              $selected = ($_GET['getterms'] == $term['term']) ? 'selected' : '';
              echo '<option value="' . $term['term'] . '" ' . $selected . '>' . $term['term'] . '</option>';
              }
            ?>
          </select>
          <input type="submit" name="Filter">
        </form>
      </div> -->
      
      <table style="margin-left: auto; margin-right: auto;">
          <tr>
            <th>Course</th>
            <th>Unit(s)</th>
            <th>Section</th>
            <th>Faculty</th>
            <th>Final Grade</th>
          </tr>

          <?php
          // if(isset($_SESSION['user_id']) && !empty($_GET['term'])) {
          // }

          if (isset($_GET['term'])) {
            // Sanitize the user input to prevent SQL injection
            $term = mysqli_real_escape_string($con, $_GET['term']);
          } else {
            // Set a default term value here
            $term = "";
          }

          $sql = "SELECT * FROM grades WHERE user_id = '".$_SESSION['user_id']."' AND term = '$term'";
          $result = $con -> query($sql);

          if ($result -> num_rows > 0) {
            while ($row = $result -> fetch_assoc()) {
              echo "
              <tr>
                <td>
                  ". $row["course"] ."
                </td>
                <td>
                  ". $row["units"] ."
                </td>
                <td>
                  ". $row["section"] ."
                </td>
                <td>
                  ". $row["faculty"] ."
                </td>
                <td>
                  ". $row["final_grade"] ."
                </td>
              </tr>";
            } 

            echo "</table>";
          } else {
            echo "Empty table";
          }

          $con -> close();
          ?>

        <!-- <tr class="submitfiles">
            <td>ISPROJ2</td>
            <td>3.0</td>
            <td>BTIS1</td>
            <td>RAYMUNDO, JINO</td>
            <td>3.0</td>
        </tr>
        <tr class="submitfiles">
        <td>RAPIDEV</td>
            <td>3.0</td>
            <td>BTIS1</td>
            <td>CATAYOC, JACOB</td>
            <td>3.0</td>
        </tr>
      </table> -->

      <a href="grade_edit.php"><button type="button">Edit Grades</a></button>
      <a href="homepage.php"><button type="button">Back</a></button>
    </div>
  </body>
</html>
