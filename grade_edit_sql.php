<?php
require_once('config.php');

if(isset($_POST['save_select'])){

    // $grades = $_POST['grade'];

    // for($i=0; $i<count($grades['grades_id']); $i++){
    //     // $grade = $_POST["grade"];
    //     $ids = 
    //     $grade = $grades[$i];
    //     // $query = "INSERT INTO grades (final_grade) VALUES ('$grade') ON DUPLICATE KEY UPDATE final_grade = $grade";
    //     $query = "UPDATE grades SET final_grade = $grade WHERE grades_id = $";
    //     $query_run = mysqli_query($con, $query);
    // }

    // $sql = "SELECT grades_id, course FROM grades WHERE user_id = '".$_SESSION['user_id']."'";
    // $result = $con -> query($sql);

    foreach ($_POST['gradeid'] as $key => $gradeid) {
        $id = $gradeid;
        $grade = $_POST['grade'][$key];
    
        $updsql = "UPDATE grades SET final_grade=? WHERE grades_id=?";
        $query = $con->prepare($updsql);
        $query->execute(array($grade, $id));
    }

    if($query){
        header("Location: grades.php");
    } else {
        header("Location: grade_edit.php");
    }
}
?>