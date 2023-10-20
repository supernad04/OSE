<!DOCTYPE html>
<html>
<head>
    <title>Submission Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .result-message {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Submission Result</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $selected_tool = $_POST['tool'];
            // Process the selected tool here
            echo "<div class='result-message'>You selected: " . $selected_tool . "</div>";
        } else {
            echo "<div class='result-message'>Invalid request.</div>";
        }
        ?>
    </div>
</body>
</html>
