<!DOCTYPE html>
<html lang="en">
<style>
body{
    background-color: #96b9d0;
}
.percent{
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
    height: 420px;
    border-radius: 50px;
    width: 1000px;
    margin-left: 100px;
    padding-top: 60px;
}
.unknown_user{
    border-radius: 100px;
    width: 150px;
    height: 150px;
    margin-top: -10px;
    margin-left: -180px;
    margin-bottom: 20px;
}
button{
    background-color: #64483A;
    width: 120px;
    height: 60px;
    border-radius: 10px;
    border-width: 0px;
    font-size: 40px;
    color: white;
    margin-top: 25px;
    margin-left: 550px;
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
input{
    padding: 5px;
    border-radius: 10px;
    width: 280px;
    height: 15px;
    border-color: beige;
    margin-left: 10px;
    margin-bottom: 10px;
}
.idlabel{
    margin-left: -100px;
    font-size: 30px;
    margin-block-start: 30px;
}
p{
    margin-top: 0px;
    margin-left: -100px;
    font-size: 20px;
}
.typescholarshiplabel{
    font-size: 30px;
    margin-left: -200px;
    margin-top: 20px;
}
.typescholarshipinput{
    width: 400px;
    height: 30px;
    margin-left: 40px;

}
.percentagelabel{
    font-size: 30px;
    margin-left: -200px;
}
.percentageinput{
    width: 250px;
    height: 80px;
    margin-top: 30px;
    margin-left: 100px;
    margin-bottom: -100px;
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
    <title>Scholarship Percentage</title>
</head>
<body>
<div class="percent">
    <h1>Scholarship Percentage
        <div class="OSE_Logo">
        <a href="homepage.php"><img src="OSE logo.jpg"></a>
        </div>
    </h1>
    </div>

    <div class="main">
    <form action="percentage.php" method="post">

    <table>
        <tbody>
        <tr>
            <th><img class="unknown_user" src="unknown user.jpg"></th>
            <th><label for="firstname" class="idlabel">Student ID</label>
                <p>Term, School Year</p>
            </th>
        </tr>
        <tr>
            <td><label for="typescholarship" class="typescholarshiplabel">Type of Scholarship:</label></td>
            <td><input type="text" name="typescholarship" id="typescholarship" class="typescholarshipinput"></td>
        </tr>
        <tr>
            <td><label for="percentage" class="percentagelabel">Scholarship Percentage:</label></td>
            <td><input type="text" name="percentage" id="percentage" class="percentageinput"></td>
        </tr>
        </tbody>
    </table>

    <div class="back_button">
    <a href="homepage.php"><button type="button">Back</a></button>
    </div>
    </div>
</body>
</html>