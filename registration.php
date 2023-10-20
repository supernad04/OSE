<?php
session_start();
$ses = 0;
if (!empty($_SESSION)){
	header("Location: http://localhost/OSE_Project/OSE%20PROJECT/homepage.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
body{
    background-color: #96b9d0;
}
.register{
    background-color: #2C2A54;
    height: 80px;
    margin-top: -23px;
    margin-right: -8px;
    margin-left: -8px;
    color: white;
    margin: top 40px;
    text-indent: 30px;
    font-family: arial;
    padding-top: 20px;
}
.main{
    display:flex;
    top: 30px;
    background-color: #EDD3A5;
    border-radius: 50px;
    width: 600px;
    margin: auto;
    padding-top: 70px;
}
form{
    text-align: center;
    font-size: large;
    font-family: arial;
    font-weight: bold;
    margin-left: 50px;
}
tr{
    text-align: left;
}
input{
    padding: 5px;
    border-radius: 10px;
    width: 280px;
    height: 15px;
    border-color: beige;
    margin-left: 30px;
    margin-bottom: 25px;
}
button{
    background-color: #64483A;
    width: 150px;
    border-radius: 10px;
    border-width: 0px;
    font-size: 30px;
    color: white;
    margin-top: 30px;
    margin-bottom:30px;
    margin-left: -50px;
}
img{
    border-radius: 100px;
    width: 55px;
    height: 55px;
    margin-top: -45px;
    margin-bottom: 45px;
    margin-left: 93%;
}
a{
    color: white;
    text-decoration: none;
}


</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="register">
    <h1>Registration
        <div class="OSE_Logo">
            <a href="login.php"><img src="OSE logo.jpg"></a>
        </div>
    </h1>
    </div>

    <div class="main">
    <form action="process.php" method="POST">
    <table>
        

        <p id="message" style="color: red;"></p>
        <tbody>
        <tr class="trlastname">
            <th><label for="lastname">Last Name:</label></th>
            <th><input required onError type="text" name="lastname" id="lastname"></th>
        </tr>
        <tr class="trfirstname">
            <td><label for="firstname">First Name:</label></td>
            <td><input required type="text" name="firstname" id="firstname"></td>
        </tr>
        <tr class="trno">
            <td><label for="no">Contact number:</label></td>
            <td><input required type="text" pattern="\d*" maxlength="11" name="no" id="no"></td>
        </tr>
        <tr class="trdob">
            <td><label for="dob">Date of Birth:</label></td>
            <td><input required type="date" name="dob" id="dob"></td>
        </tr>
        <tr class="traddress">
            <td><label for="dob">Address:</label></td>
            <td><input required type="text" name="address" id="address"></td>
        </tr>
        <tr class="traddress">
            <td><label for="dob">Type of Scholarship:</label></td>
            <td><input required type="text" name="type_scho" id="type_scho"></td>
        </tr>
        <tr class="traddress">
            <td><label for="dob">Scholarship Percentage:</label></td>
            <td><input required type="number" max="100" name="scho_percent" id="scho_percent"></td>
        </tr>
        <tr class="tremail">
            <td><label for="email">Email:</label></td>
            <td><input required type="email" name="email" id="email"></td>
        </tr>
        <tr class="trpassword">
            <td><label for="password">Password:</label></td>
            <td><input required type="password" name="password" id="password" onkeyup="checkPass();"></td>
        </tr>
        <tr class="trconpassword">
            <td><label for="password2">Confirm Password:</label></td>
            <td><input required type="password" name="cpassword" id="cpassword" onkeyup="checkPass();"></td>
        </tr>
        </tbody>
    </table>

    <div class="submit_button">
    <button type="submit" name="sub" id="submit" value="submit">Submit</button>
    </div>
</form>
<?php
if  (isset($_GET['event'])){
    if ($_GET['event']==1){
        echo "<script>swal('Registration Failed', 'Email is already in use.', 'error');</script>";
    }
}
?>
</div>
</body>
<script>
var checkPass = function() {
    if (document.getElementById('password').value ==
        document.getElementById('cpassword').value && document.getElementById('password').value != '' && document.getElementById('cpassword').value != '' ) {
        document.getElementById('message').innerHTML = '';
        document.getElementById('submit').disabled = false;
    } else if (document.getElementById('password').value === '' || document.getElementById('cpassword').value === '' ){
        document.getElementById('message').style.color = '';
        document.getElementById('message').innerHTML = '';
        document.getElementById('submit').disabled = '';
    } else if (document.getElementById('password').value !=
        document.getElementById('cpassword').value){
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Password and confirm password not match ';
        document.getElementById('submit').disabled = true;
    } 
}

// min 16 dob
var today = new Date();

var minDate = new Date();
minDate.setFullYear(today.getFullYear() - 17);

var minDateStr = minDate.toISOString().slice(0,10);

document.getElementById("dob").setAttribute("max", minDateStr);
</script>
</html>