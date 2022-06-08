<?php

$servername = "localhost";
$username = "root";
$password = "";
$database="my_shop";


        //Create connection
$connection = new mysqli($servername,$username,$password,$database);

 
$id ="";
$name="";
$email="";
$phone="";
$address="";

$successMessage="";
$errorMessage="";

if($_SERVER ['REQUSET_METHOD']=='GET'){
    //GET Method : show the data of client
    if(!isset($_GET["id"])){
        header("location:/crud_operations/index.php");
        exit;
    }
    $id=$_GET["id"];
    $sql ="SELECT * FROM clients WHERE id=$id";
    $result =$connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location:/crud_operations/index.php");
        exit;
    }
    
    $name=$row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
    $address=$row["address"];

}
else{
    //POST Method :Update the data of client
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New client</h2>
             

            

        <?php
        if(!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'> 
                <strong>$errorMessage</strong>
                <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
             </div>   
            ";
        }

        ?>

        <form method="post">
            <input type="hidden" value="<?php echo $id;?>">
            <div class = "row mb-3">
                <label class="col-sm-3 col-form-table">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>


            <div class = "row mb-3">
                <label class="col-sm-3 col-form-table">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
            </div>


            <div class = "row mb-3">
                <label class="col-sm-3 col-form-table">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>


            <div class = "row mb-3">
                <label class="col-sm-3 col-form-table">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                </div>
            </div>

            <?php
            if(!empty($successMessage)){
            echo"
            <div class='row mb-3'> 
                <div class='offset-sm-3 col-sm-6'
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'></button>
                    </div>   
                </div> 
            </div> 
            ";
            }

        ?>


            <div class = "row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>    
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary"href="/crud_operations/index.php" role="button">Cansel</a>
                </div>
            

            </div>


        </form>
    </div>
</body>
</html>