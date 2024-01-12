<!DOCTYPE html>
<html lang="en">
<?php 
require('connection.php');
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
    <style>
            .disclaimer 
        {
             display: none;
        }
        body 
        {
            background: #0d1117;
            margin: 0;
            padding: 0%
        }
         .heading
         {
           font-family: sans-serif; 
           color: #ffffff9e;
          }
         .signIn_holder
         {
            width: 29.6rem;
            height: 100vh;
            padding: 3rem;
            display: flex;
            align-items: center;
            box-sizing: border-box;
            position: absolute;
            top: 0;
        }
        .hidden {
            display: none;
        }
        .leftDiv form {
            text-align: center;
        }

        input,a {
            margin-bottom: 2rem;
            font-size: 1.04rem;
        }

        .form_input 
        {
            width: 100%;
            height: 40px;
            backdrop-filter: blur( 4px );
            -webkit-backdrop-filter: blur( 4px );
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            outline: none;
            color: #fff;
            border-radius: 15px;
            padding-left: 1rem;
            box-sizing: border-box;
            border: 1px solid #25c4b5;
            background: #0fe9d421;
        }
        .form_input::placeholder
        {
            color: #fff;
        }
        .form_btn {
            width: 100%;
            height: 30px;
            cursor: pointer;
        }

        #submit_btn:hover {
            background-color: #25c4b587;
        }

        #submit_btn {
            height: 40px;
            background-color: #25c4b5;
            color: #fff;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            border-radius:25px;
        }
        #other_btn
        {
            text-decoration:none;
            color: #ffffff9e;
            font-size: 1.1rem;
            font-family: sans-serif;
        }
    @media screen and (max-width:475px) {

        .signIn_holder{
        width: unset;
        padding: 30px;
        }
    }
    </style>
</head>

<body>
</div>

    <div id="form_div">
        <div class="signIn_holder">
            <div class="leftDiv">
            <h2 class='heading'>Admin Login</h2>
                <form method="post">
                    <input type="text" placeholder="Email *" name="username" class="form_input" require>
                    <input type="password" placeholder="Password *" name="password" class="form_input" require>
                    <input type="submit" name="Signin" value="Submit" id="submit_btn" class="form_btn">
                    <a class="form_btn" href='../index.php' id="other_btn">Go Home</a><br><br>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
#This is the code for login
if(isset($_POST['Signin']))
{
    $query = "SELECT * FROM `admin_login` WHERE  `admin_email`= '$_POST[username]'  OR `admin_name`='$_POST[username]'  AND `admin_password`='$_POST[password]'";

    $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)==1)
        {
        $result_fetch=mysqli_fetch_assoc($result);
        $_SESSION['logged_in']=true;
        echo"
        <script>
        window.location.href='../index.php';
        </script>
        ";
        }
        else
        {
        echo"
            <script>
                alert('Looks like you are not admin');
            </script>
        ";
        }

}

?>
</html>
