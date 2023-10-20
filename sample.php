<?php
$conn = new PDO('mysql:host=localhost; dbname=osedb', 'root', '') or die(mysql_error());
if (isset($_POST['submit'])) {
    $totalFiles = count($_FILES['file']['name']);
    $section = $_POST['section'];
    $username = $_POST['username'];


    for ($i = 0; $i < $totalFiles; $i++) {
        $name = $_FILES['file']['name'][$i];
        $size = $_FILES['file']['size'][$i];
        $type = $_FILES['file']['type'][$i];
        $temp = $_FILES['file']['tmp_name'][$i];

        $fname = date("YmdHis") . '_' . $name;
        $chk = $conn->query("SELECT * FROM upload WHERE name = '$name' ")->rowCount();

        if ($chk) {
            $j = 1;
            $c = 0;
            while ($c == 0) {
                $j++;
                $reversedParts = explode('.', strrev($name), 2);
                $tname = (strrev($reversedParts[1])) . "_" . ($j) . '.' . (strrev($reversedParts[0]));
                $chk2 = $conn->query("SELECT * FROM upload WHERE name = '$tname' ")->rowCount();

                if ($chk2 == 0) {
                    $c = 1;
                    $name = $tname;
                }
            }
        }

        $move = move_uploaded_file($temp, "upload/" . $fname);

        if ($move) {
            $query = $conn->prepare("INSERT INTO upload(name, fname, username, section) VALUES (:name, :fname,  :username,:section)");
            $query->bindParam(':name', $name);
            $query->bindParam(':fname', $fname);
            $query->bindParam(':username', $username);
            $query->bindParam(':section', $section);
            $result = $query->execute();

            if (!$result) {
                die(mysql_error());
            }
        }
    }
}
?>

<html>
<head>
    <title>Upload and Download Files</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #96b9d0;
        }

        .main {
            background-color: #EDD3A5;
            border-radius: 50px;
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .card-header {
            background-color: #2C2A54;
            color: white;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 0 0 10px 10px;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="container">
            <h1 class="text-center">Sending Requirements</h1>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Student Add</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="user_name" class="form-label">User Name</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="section" class="form-label">Section</label>
                                    <input type="text" name="section" id="section" class="form-control" required>
                                </div>
                              
                                <div class="mb-3">
                                    <label for="file" class="form-label">Select File(s)</label>
                                    <input type="file" name="file[]" id="file" class="form-control" multiple required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
