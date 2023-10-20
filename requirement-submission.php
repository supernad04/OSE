<!DOCTYPE html>
<html lang="en">
<style>
body{
    background-color: #96b9d0;
}
.homepage{
    background-color: #2C2A54;
    height: 80px;
    margin-top: -23px;
    margin-right: -8px;
    margin-left: -8px;
    margin-bottom: 30px;
    color: white;
    margin: top 40px;
    text-indent: 30px;
    font-family: arial;
    padding-top: 20px;
}
h2{
    margin-top: 30px;
    margin-left: 730px;
    border-top: 5px;
    font-family: arial;
    font-size: 20px;
}
.main{
    top: 20px;
    background-color: #EDD3A5;
    height: 460px;
    border-radius: 50px;
    width: 1000px;
    margin-left: 100px;
    padding-top: 20px;
}
.backbutton{
    background-color: #64483A;
    width: 120px;
    height: 60px;
    border-radius: 10px;
    border-width: 0px;
    font-size: 40px;
    color: white;
    margin-top: 150px;
    margin-left: 820px;
}
form{
    text-align: center;
    font-size: large;
    font-family: arial;
    font-weight: bold;
    margin-left: 10px;
}
th, td{
    padding: 15px;
}
.titlesubmission{
    text-decoration: underline;
    font-weight: lighter;
    font-size: 60px;
    font-family: arial;
    text-align: center;
}
.submitbutton{
    background-color: #64483A;
    width: 250px;
    height: 60px;
    border-radius: 10px;
    border-width: 0px;
    font-size: 40px;
    color: white;
    margin-left: 350px;
}
a{
    color: white;
    text-decoration: none;
}
img{
    border-radius: 100px;
    width: 55px;
    height: 55px;
    margin-top: -45px;
    margin-bottom: 45px;
    margin-left: 1130px;
}
<?php session_start();?>
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirement Submission</title>
</head>

<body>
    <div class="homepage">
    <h1>Requirement Submission
        <div class="OSE_Logo">
        <a href="homepage.php"><img src="OSE logo.jpg"></a>
        </div>
    </h1>
    </div>

    <div class="main">
    <h1 class="titlesubmission"><?php echo $_GET['ducumentype']?></h1>
    <div>
    <form action="uploader.php" method="POST" enctype='multipart/form-data'>
        <input type="hidden" name="type" value="<?php echo $_GET['ducumentype']?>">
        <input type="file" name="file">
        <input type="hidden" name="studentid" value="<?php echo $_SESSION['studentid']?>">
        <button type="submit" name="upload" class="submitbutton">Submit</button>
    </form>

    
    </div>
    <div class="back_button">
    <a href="requirement-viewing.php"><button type="button" class="backbutton">Back</a></button>
    </div>
</body>

</html>
