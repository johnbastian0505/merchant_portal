<?php
require_once('conn.php');
session_start();
    if(isset($_POST['submit']))
    {

       $username =  $_POST['username'];
       $password =  $_POST['password'];

       if(empty($username) || empty($password))
       {
            header("location:index.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from merchant_accounts where username='".$username."' and password='".$password."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                
                $_SESSION['username'] =  $username;
                $_SESSION['password'] =  $password;


                header("location:users/dashboard_user.php");
            }
            else
            {
                header("location:index.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }


?>	