<?php 
 $msg_text = "";
 if(isset($_GET['msg'])){
     $msg = $_GET['msg'];
     if($msg == 1){
         $msg_text = "User successfully registered";
     }else if($msg == 2){
         $msg_text = "Invalid credentials, try again!!";
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
</style>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>    
    <div>
            <img src="./images/cond.png" width="200" height="50" alt="cond"/>
    </div>
    <div>
        <form action="/condurre_app/login_process.php" method="POST" id="cond_form">
            <table id="table">
                <th colspan="2">
                    <h3>Condurre User Portal</h3>
                </th>
                <tbody>
                    <tr>
                        <td>Email :</td>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" name="passwd"></td>
                    </tr>
                    <?php if($msg_text != ""){ ?>
                    <tr>
                        <td style="text-align: center; color: red;" colspan="2"><?=$msg_text?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2" align="center">
                            <button class="btn btn-primary" id="but" type="submit" form="cond_form" value="Submit">Login</button>
                        </td>
                    </tr>
                     <tr>
                        <td colspan="2" align="center">
                            <a role="button" href="/condurre_app/register.php" form="cond_form" value="Submit">Register</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</html>