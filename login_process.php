<?php
require './libraries/lib_db.php';

$email = $_POST['email'];
$password = md5($_POST['passwd']);

$db = new db_connector();
$conn = $db->connect();

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM employee WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

$emp_name = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emp_id = $row["id"];
        $emp_name = $row["name"];
        $email = $row["email"];
        $pro_pic = $row["pro_pic"];

        //proceed to login
        $sqli = "SELECT user_level_id FROM user_level WHERE user_id = $emp_id";
        $res = $conn->query($sqli);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $auth = true;
                $user_level_id = $row["user_level_id"];
                if ($user_level_id == 3) { //admin
                    header("location:/condurre_app/admin_page.php?auth=$auth&usrid=$emp_id");
                } else {  //lower level employee
                    header("location:/condurre_app/user_page.php?auth=$auth&usrid=$emp_id");
                }
            }
        }
    }
} else {
    //msg = 2 if incorrect credentials were provided
    header("location:/condurre_app/index.php?msg=2");
}
$conn->close();
?>