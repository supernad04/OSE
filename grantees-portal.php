<?php
require_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<style>
body{
    background-color: #96b9d0;
}
.profileviewing{
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
.details{
    top: 20px;
    background-color: #EDD3A5;
    height: 420px;
    border-radius: 50px;
    width: 1000px;
    margin-left: 100px;
    padding-top: 60px;
}
.prof{
    margin-left: -1000px;
}
.unknown_user{
    border-radius: 100px;
    width: 100px;
    height: 100px;
    margin-top: -70px;
    margin-left: -180px;
}
form{
    text-align: center;
    font-size: large;
    font-family: arial;
    font-weight: bold;
    margin-left: 250px;
}
tr{
    text-align: left;
}
.lastnamelabel{
    margin-left: -150px;
    margin-bottom: -500px;
}
.lastnameinput{
    width: 280px;
    height: 30px;
    margin-left: -295px;
    margin-bottom: -500px;
}
.firstnamelabel{
    margin-left: -150px;
    margin-bottom: -100px;
}
.firstnameinput{
    width: 280px;
    height: 30px;
    margin-left: -295px;
    margin-bottom: -100px;
}
.statuslabel{
    font-size: 25px;
    margin-left: 100px;
}
.statuslabel1{
    font-size: 30px;
    margin-left: 70px;
    text-decoration: underline;
    font-weight: lighter;
}
.id{
    font-size: 20px;
    margin-left: -180px;
}
.birthdatelabel{
    margin-left: -150px;
}
.birthdateinput{
    margin-left: -295px;
}
.trinputaddress{
    padding: 5px;
    border-radius: 10px;
    width: 280px;
    height: 80px;
    border-color: beige;
    margin-left: 10px;
    margin-bottom: 10px;
}
input{
    padding: 5px;
    border-radius: 10px;
    width: 280px;
    height: 15px;
    border-color: beige;
    margin-left: 10px;
    margin-bottom: 10px;
}
button{
    background-color: #64483A;
    width: 150px;
    border-radius: 10px;
    border-width: 0px;
    font-size: 30px;
    color: white;
    margin-top: 10px;
    margin-left: -300px;
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

</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Viewing</title>
</head>

<body>
    <div class="profileviewing">
    <h1>Profile Viewing
        <div class="OSE_Logo">
        <a href="homepage.php"><img src="OSE logo.jpg"></a>
        </div>
    </h1>
    </div>

    <div class="details">
    <?php
        $sql = "SELECT * FROM usertable WHERE user_id = '".$_SESSION['user_id']."'";
        $result = $con->query($sql);
        if($result->num_rows>0){
            while($fetch = $result->fetch_assoc()){
    ?>
    <form action="grantees-portal.php" method="post">
    <table>
        <tbody>
        <tr class="">
            <th></th>
            <th><label for="lastname" class="lastnamelabel">Last Name:</label></th>
            <th><input type="text" name="lastname" id="lastname" class="lastnameinput" value="<?php echo $fetch['user_lastName'] ?>"></th>
            <th><label for="" class="statuslabel">Status:</label></th>
        </tr>
        <tr class="">
            <td><img class="unknown_user" src="unknown user.jpg"></td>
            <td><label for="firstname" class="firstnamelabel">First Name:</label></td>
            <td><input type="text" name="firstname" id="firstname" class="firstnameinput" value="<?php echo $fetch['user_firstName'] ?>"></td>
            <td><label for="" class="statuslabel1">ENROLLED</label></td>
        </tr>
        <tr class="">
            <td><label for="studentid" class="id">Student ID</label></td>
            <td><label for="bdate" class="birthdatelabel">Birth date:</label></td>
            <td><input type="text" name="bdate" id="bdate" class="birthdateinput" value="<?php echo $fetch['user_birthDate'] ?>"></td>
        </tr>
        <tr class="">
            <td><label for="cnumber">Contact Number:</label></td>
            <td><input type="number" name="cnumber" id="cnumber" value="<?php echo $fetch['user_contactNumber'] ?>"></td>
        </tr>
        <tr class="">
            <td><label for="email">Email:</label></td>
            <td><input type="text" name="email" id="email" value="<?php echo $fetch['user_email'] ?>"></td>
        </tr>
        </tbody>
    </table>

    <?php
            }
        }
    ?>

    <div class="back_button">
    <a href="homepage.php"><button type="button">Back</a></button>
    </div>
    </div>
</body>

</html>