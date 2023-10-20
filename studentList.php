<?php
$conn = new PDO('mysql:host=localhost; dbname=osedb', 'root', '') or die(mysql_error());

// Check if the delete button is clicked
if (isset($_GET['delete'])) {
    $fileName = $_GET['delete'];
    $query = $conn->prepare("DELETE FROM upload WHERE fname = :fileName");
    $query->bindParam(':fileName', $fileName);
    $query->execute();
}

// Check if the form is submitted for updating file details
if (isset($_POST['update'])) {
    $userName = $_POST['userName'];
    $fileName = $_POST['fileName'];
    $section = $_POST['section'];
    $remarks = $_POST['remarks'];

    $query = $conn->prepare("UPDATE upload SET username = :userName, section = :section, Remarks = :remarks WHERE fname = :fileName");
    $query->bindParam(':userName', $userName);
    $query->bindParam(':fileName', $fileName);
    $query->bindParam(':section', $section);
    $query->bindParam(':remarks', $remarks);
    $query->execute();
}
?>

<html>
<head>
    <title>Upload and Download Files</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
</head>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<style>
    body {
        background-color: #96b9d0;
    }

    .homepage{
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
        background-color: #EDD3A5;
        border-radius: 50px;
        width: 90%;
        max-width: 1000px;
        margin: 20px auto;
        padding-top: 70px;
    }

    table {
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #2C2A54;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        color: black;
        text-decoration: none;
    }
    
    .accepted {
        color: green;
    }
    
    .rejected {
        color: red;
    }

    img {
    border-radius: 100px;
    width: 55px;
    height: 55px;
    margin-top: -45px;
    margin-bottom: 45px;
    margin-left: 93%;
    }
</style>
<body>
    <div class="homepage">
        <h1>Submitted Files</h1>
            <div class="logo">
                <a href="adminhomepage.php"><img src="OSE logo.jpg"></a>
            </div>
    </div>

    <div class="main">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th width="20%" align="center">Student Name</th>
                    <th width="40%" align="center">File Name</th>
                    <th width="40%" align="center">Section</th>
                    <th width="40%" align="center">Remarks</th>
                    <th width="40%" align="center">Action</th>
                </tr>
            </thead>
            <?php
            $query = $conn->query("SELECT * FROM upload ORDER BY id DESC");

            while ($row = $query->fetch()) {
                $name = $row['name'];
                $fileName = $row['fname'];
                $userName = $row['username'];
                $section = $row['section'];
                $remarks = $row['Remarks'];
            ?>
            <tr>
                <td>
                    &nbsp;<?php echo $userName; ?>
                </td>
                <td>
                    &nbsp;<?php echo $fileName; ?>
                </td>
                <td>
                    &nbsp;<?php echo $section; ?>
                </td>
                <td>
                    &nbsp;
                    <?php
                    if ($remarks == 'Accepted') {
                        echo '<span class="accepted">' . $remarks . '</span>';
                    } elseif ($remarks == 'Rejected') {
                        echo '<span class="rejected">' . $remarks . '</span>';
                    } else {
                        echo $remarks;
                    }
                    ?>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-success">
                            <a href="download.php?filename=<?php echo $fileName; ?>&f=<?php echo $fileName; ?>"
                                style="color: white; text-decoration: none;">Download</a>
                        </button>
                        <button class="btn btn-primary edit-button" data-file="<?php echo $fileName; ?>">
                            Edit
                        </button>
                        <button class="btn btn-danger">
                            <a href="Studentlist.php?delete=<?php echo $fileName; ?>"
                                onclick="return confirm('Are you sure you want to delete this file?')"
                                style="color: white; text-decoration: none;">Delete</a>
                        </button>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit File Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Studentlist.php" method="POST">
                        <div class="form-group">
                            <label for="userName">Student Name</label>
                            <input type="text" class="form-control" id="userName" name="userName">
                        </div>
                        <div class="form-group">
                            <label for="fileName">File Name</label>
                            <input type="text" class="form-control" id="fileName" name="fileName" readonly>
                        </div>
                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" class="form-control" id="section" name="section">
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <select class="form-control" id="remarks" name="remarks">
                                <option value="">Select</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle click on Edit button
        $('.edit-button').click(function () {
            // Get the file name from data attribute
            var fileName = $(this).data('file');

            // Get the corresponding row data
            var userName = $(this).closest('tr').find('td:eq(0)').text().trim();
            var section = $(this).closest('tr').find('td:eq(2)').text().trim();
            var remarks = $(this).closest('tr').find('td:eq(3)').text().trim();

            // Set the values in the modal form
            $('#userName').val(userName);
            $('#fileName').val(fileName);
            $('#section').val(section);
            $('#remarks').val(remarks);

            // Open the modal
            $('#editModal').modal('show');
        });
    </script>
</body>
</html>
