<?php
require './libraries/lib_db.php';

$db = new db_connector();
$conn = $db->connect();

$emp_id = $_GET['usrid'];


// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM employee WHERE id = $emp_id";
$result = $conn->query($sql);

$emp_name = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emp_id = $row["id"];
        $emp_name = $row["name"];
        $email = $row["email"];
        $pro_pic = $row["pro_pic"];
    }
}
$conn->close();
?>
<style>
    #table{
        margin-left: auto;
        margin-right: auto;
    }

    #but{
        margin-top: 20px;
        width: 100%;
    }
</style>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>    
    <div style="height: 100%;">
        <div class="container">
            <div class="row" style="text-align: center; width: 100%;">
                <div class="col">
                    <img src="./images/cond.png" width="200" height="50" alt="cond"/>
                </div>
                <div class="col">
                </div>
                <div class="col" style="padding-top: 2%">
                    <p><b>Logged in as : </b><?= $emp_name ?><a href="/condurre_app/index.php"> (Log out)</a></p>
                </div>
            </div>
            <div class="row" style="text-align: center; width: 100%;">
                <div style="text-align: center;" class="col">
                    <h3>ADMIN HOME PAGE</h3>
                </div>
            </div>
            <div class="row" style="text-align: center; width: 100%; margin-top: 50px;">
                <div class="col">
                    <img src="<?= $pro_pic ?>" width="150" height="150" alt="cond"/>
                </div>
                <div class="col">
                     <p style="font-size: 15px;"> 
                        admin content goes here admin content goes here admin content goes here admin content goes here
                        admin content goes here admin content goes here admin content goes here <br>
                        admin content goes here admin content goes here admin content goes here admin content goes here
                        admin content goes here admin content goes here admin content goes here <br>
                        admin content goes here admin content goes here admin content goes here admin content goes here
                        admin content goes here admin content goes here admin content goes here <br>
                        admin content goes here admin content goes here admin content goes here admin content goes here
                        admin content goes here admin content goes here admin content goes here <br>
                    </p>
                </div>
                <div class="col">
                    <table style="margin-left: 20%;">
                        <tr>
                            <td>User ID</td>
                            <td>: <?=$emp_id?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>: <?=$emp_name?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: <?=$email?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</html>