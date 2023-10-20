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
    margin-top: 10px;
    margin-left: 30px;
    margin-bottom: 20px;
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
.submitfiles{
    font-weight: lighter;
    font-size: 15px;
    color: #A4723A;
}
.submitfilehref{
    color: #64483A;
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
    <title>Requirement Viewing</title>
</head>

<body>
    <div class="homepage">
    <h1>Clearance Record
        <div class="OSE_Logo">
        <a href="homepage.php"><img src="OSE logo.jpg"></a>
        </div>
    </h1>
    </div>

    <div class="main">
        <h2>Pending Clearances</h2>
    <form action="requirement-viewing.php" method="post">
    <table>
        <tbody>
        <tr>
            <th>Title</th>
            <th>Date Added</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Remarks</th>
        </tr>
        <tr class="submitfiles">
            <td>SMIT DEFENSE FEE</td>
            <td>July 15, 2022</td>
            <td>1,045.00</td>
            <td>Cleared</td>
            <td></td>
        </tr>
        </tbody>
        <tr class="submitfiles">
        <td>Benire Recollection Fee</td>
            <td>July 20, 2022</td>
            <td>150.00</td>
            <td>Not Cleared</td>
            <td>Due July 25, 2022</td>
        </tr>
        </tbody>
    </table>

    <div class="back_button">
    <a href="homepage.php"><button type="button">Back</a></button>
    </div>
    </div>
</body>

</html>