<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #96b9d0;
        }

        .homepage {
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

        h2 {
            margin-top: 30px;
            margin-left: 730px;
            border-top: 5px;
            font-family: arial;
            font-size: 20px;
        }

        button {
            background-color: #64483A;
            width: 120px;
            height: 60px;
            border-radius: 10px;
            border-width: 0px;
            font-size: 40px;
            color: white;
            margin-top: 200px;
            margin-left: 800px;
        }

        form {
            text-align: center;
            font-size: large;
            font-family: arial;
            font-weight: bold;
            margin-left: 10px;
        }

        .submitfiles {
            font-weight: lighter;
            font-size: 15px;
            color: #A4723A;
        }

        .submitfilehref {
            color: #64483A;
        }

        a {
            color: white;
            text-decoration: none;
        }

        img {
            border-radius: 100px;
            width: 55px;
            height: 55px;
            margin-top: -45px;
            margin-bottom: 45px;
            margin-left: 1130px;
        }
    </style>
</head>

<body>
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'osedb') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM uploads") or die($mysqli->error);
    ?>

    <div class="homepage">
        <h1>Approval Request
            <div class="OSE_Logo">
                <a href="homepage.php"><img src="OSE logo.jpg"></a>
            </div>
        </h1>
    </div>

    <div class="container">
        <form action="requirement-viewing.php" method="post">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Files</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td>
                                    <a href="uploads/<?php echo $row['file']; ?>" download><?php echo $row['file']; ?></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="back_button">
                <a href="adminhomepage.php"><button type="button">Back</button></a>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
