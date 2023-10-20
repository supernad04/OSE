
    <!DOCTYPE html>
    <html lang='en'>
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
        color: white;
        margin: top 40px;
        text-indent: 30px;
        font-family: arial;
        padding-top: 20px;
        width: 100vw;
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
        height: 480px;
        border-radius: 50px;
        width: 1600px;
        margin-left: 200px;
    }
    .unknown_user{
        border-radius: 100px;
        width: 80px;
        height: 80px;
        margin-top: 30px;
        margin-left: 10px;
    }
    table{
        margin-top: 50px;
        margin-left: 80px;
    }
    th, td{
        padding: 15px;
    }
    button{
        background-color: #64483A;
        width: 400px;
        border-radius: 10px;
        border-width: 0px;
        font-size: 40px;
        color: white;
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
        margin-left: 93%;
    }
    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    </style>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title></title>
    </head>
    <body>
        <div class='homepage'>
            <h1>
            <div class='logo'>
                <a href='adminhomepage.php'><img src='OSE logo.jpg'></a>
            </div>
            </h1>
        </div>
        <div class='main'>
            <form action=''>
                <table id='inputTable'>
                    <tr>
                        <td><label for='title'>Title</label></td>
                        <td><input type='text' id='title' /></td>

                        <td><label for='description'>Description</label></td>
                        <td><textarea id='description' rows='4' cols='30'></textarea></td>

                        <td><label for='duedate'>Due Date</label></td>
                        <td><input type='date' id='duedate' /></td>
                    </tr>
                </table>

                <div class='button-container'>
                    <button class='button' type='button' onclick='addRow()'>Add Requirement</button>
                </div>
            </form>
        </div>

    <script>
        function addRow() {
            const table = document.getElementById('inputTable');
            const row = table.insertRow(-1); // Add row at the end

            // Insert cells into the row
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);

            const cell3 = row.insertCell(2);
            const cell4 = row.insertCell(3);

            const cell5 = row.insertCell(4);
            const cell6 = row.insertCell(5);

            // Add label and input field
            cell1.innerHTML = `<td><label for='title'>Title</label></td>`;
            cell2.innerHTML = `<td><input type='text' id='title' /></td>`; // Using array name to capture multiple inputs on server side

            cell3.innerHTML = `<td><label for='description'>Description</label></td>`;
            cell4.innerHTML = `<td><textarea id='description' rows='4' cols='30'></textarea></td>`;

            cell5.innerHTML = `<td><label for='duedate'>Due Date</label></td>`;
            cell6.innerHTML = `<td><input type='date' id='duedate' /></td>`;

            // Add a delete button cell at the end of the row
            const deleteCell = row.insertCell(-1);
            deleteCell.innerHTML = '<button class=\'delete-button\' type=\'button\'>Delete</button>';
        }

        document.getElementById('inputTable').addEventListener('click', function(e) {
            if(e.target && e.target.classList.contains('delete-button')) {
                // Delete the parent row of the button
                e.target.closest('tr').remove();
            }
        });
    </script>
    </body>
    
    </html>
    