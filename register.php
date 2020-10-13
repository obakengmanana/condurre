<?php 
 $msg_text = "";
 if(isset($_GET['msg'])){
     $msg = $_GET['msg'];
     if($msg == 3){
         $msg_text = "Error : Please make sure your passwords match.";
     }
 }
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
    
    .tableH{
        text-align: center;
    }
</style>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>  
    <div>
            <img src="./images/cond.png" width="200" height="50" alt="cond"/>
    </div>
    <div>
        <form action="/condurre_app/registration_process.php" method="POST" id="cond_form"  enctype="multipart/form-data">
            <table id="table">
                <th class="tableH" colspan="2">
                    <h3>New User</h3>
                </th>
                <tbody>
                     <tr>
                        <td>Name :</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td>Profile Picture :</td>
                        <td><input type="file" name="pro_pic" id="pro_pic"/></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" name="passwd"></td>
                    </tr>
                    <tr>
                        <td>Confirm Password :</td>
                        <td><input type="password" name="passwd_conf"></td>
                    </tr>
                    <?php if($msg_text != ""){ ?>
                    <tr>
                        <td style="text-align: center; color: red;" colspan="2"><?=$msg_text?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2" align="center">
                            <button id="but" type="submit"  type="button" class="btn btn-primary" form="cond_form" value="Submit">Register</button>
                        </td>
                    </tr>
                     <tr>
                        <td colspan="2" align="center">
                            <a  role="button" href="/condurre_app/index.php" form="cond_form" value="Submit">Login</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</html>