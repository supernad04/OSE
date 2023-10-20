<!DOCTYPE html>
<html>
<head>
    <title>Requirement Submission</title>
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

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        select,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Requirement Submission</h1>
        <form method="POST" action="process_submission.php">
            <label for="tool">Select a tool:</label>
            <select id="tool" name="tool">
                <option value="Qase">Qase (case for test cases)</option>
                <option value="Tuskr">Tuskr (case for test cases)</option>
            </select>
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
