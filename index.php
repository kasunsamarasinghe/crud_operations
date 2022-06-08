<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5"></div>
        <h2>List of clients</h2>
        <a class="btn btn-primary"  href="/crud_operations/create.php" role="Button">New client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database="my_shop";


                        //Create connection
                $connection = new mysqli($servername,$username,$password,$database);


                        //check connection
                if($connection->connect_error){
                    die("connection faild : ".$connection->connect_error);
                }
                


                        // read all row from database table
                $sql = "SELECT* FROM clients";
                $result = $connection->query($sql);
                 

                        //check query work correctly
                if(!$result){
                    die("invalid query: ".$connection->error);
                }

                        //read data from each row

                while ($row = $result->fetch_assoc()){
                    echo"
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm href='/crud_operations/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm href='/crud_operations/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                   
                "; 
                }
                ?>
               
            </tbody>
        </table>
    </body>
</html> 