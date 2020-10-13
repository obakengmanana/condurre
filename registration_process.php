<?php
    require './libraries/lib_db.php';

    $db = new db_connector();
    $conn = $db->connect();

    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $password1 = $_POST['passwd'];
    $password2 = $_POST['passwd_conf'];
  
    if(strcmp($password1,$password2) != 0){
        //msg = 3 if non matching password was provided
        header("location:/condurre_app/register.php?msg=3");
        die();
    }
    
    
    //uploading an image
    $target_dir = "images/pro_pics/";
    $target_file = $target_dir . basename($_FILES["pro_pic"]["name"]);
    $upload = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["pro_pic"]["tmp_name"]);
      if($check !== false) {
        echo "Image type - " . $check["mime"] . ".";
        $upload = 1;
      } else {
        echo "ERROR: uploaded file is not an image.";
        $upload = 0;
      }
      
      if (file_exists($target_file)) {
        echo "ERROR: file already exists.";
        $upload = 0;
      }
      
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "ERROR: only JPG, JPEG, PNG & GIF files are allowed";
          $upload = 0;
      }
        
      if ($upload == 0) {
        //
      } else {
        if (move_uploaded_file($_FILES["pro_pic"]["tmp_name"], $target_file)) {
          echo "SUCCESS: Profile picture uploaded";
        } else {
          echo "ERROR: Could not upload the profile picture";
        }
      }
      //end
      
      
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email']);
    $pro_pic = "/condurre_app/".$target_dir.htmlspecialchars(basename( $_FILES["pro_pic"]["name"]));
    $password = md5($_POST['passwd']);
    
    $sql = "INSERT INTO employee (name, email, password, pro_pic) VALUES ('$name', '$email_address', '$password', '$pro_pic')";
   
    
    
    if(mysqli_query($conn, $sql)){
        
         $last_id = $conn->insert_id;
         $sql2 = "INSERT INTO user_level (user_id) VALUES ('$last_id')";
        
         if(mysqli_query($conn, $sql2)){
             //msg = 1 if successfull
             $auth = true;
            header("location:/condurre_app/user_page.php?auth=$auth&usrid=$last_id");
            //echo "Employee added successfully.";
         }
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
    
    // close connection
    mysqli_close($conn);
    
?>