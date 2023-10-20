<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
</head>
<style>
    body {
        background-color: #96b9d0;
    }

    .register {
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

    .main {
        top: 30px;
        background-color: #EDD3A5;
        height: 400px;
        border-radius: 50px;
        width: 600px;
        margin: 20px auto;
        padding-top: 70px;
    }

    form {
        text-align: center;
        font-size: large;
        font-family: arial;
        font-weight: bold;
    }

    tr {
        text-align: left;
    }

    input {
        padding: 5px;
        border-radius: 10px;
        width: 280px;
        height: 15px;
        border-color: beige;
        margin-left: 30px;
        margin-bottom: 25px;
    }

    button {
        background-color: #64483A;
        width: 150px;
        border-radius: 10px;
        border-width: 0px;
        font-size: 30px;
        color: white;
        margin-top: 30px;
    }

    img {
        border-radius: 100px;
        width: 55px;
        height: 55px;
        margin-top: -45px;
        margin-bottom: 45px;
        margin-left: 1130px;
    }

    a {
        color: white;
        text-decoration: none;
    }
</style>
<body>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "osedb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $files = $_FILES["files"];

        $fileCount = count($files["name"]);
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $files["name"][$i];
            $fileTmpName = $files["tmp_name"][$i];

            $targetDir = "upload/";
            $targetFile = $targetDir . basename($fileName);

            if (move_uploaded_file($fileTmpName, $targetFile)) {
                // Insert the name and file information into the database
                $sql = "INSERT INTO uploads ( file) VALUES ('$fileName')";

                if ($conn->query($sql) !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        echo "File(s) uploaded successfully.";
    }

    $conn->close();
    ?>

    <div class="main">
        <form method="post" enctype="multipart/form-data">

            <label for="files">Files:</label>
            <input type="file" name="files[]" multiple required><br><br>

            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
