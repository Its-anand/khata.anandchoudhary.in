<!DOCTYPE html>
<html lang="en">
<?php 
include'connection.php';
session_start();
if(!isset($_SESSION['logged_in']))
{
    header("location: Admin Login.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Word</title>
    <style>
        .disclaimer 
        {
             display: none;
        }
        body 
        {
            margin: 0;
            background: #0d1117;
            padding: 0%
        }
        
        ::-webkit-scrollbar 
        {
            width: 10px;
        } 
        ::-webkit-scrollbar-track 
        {
           -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        } 
        ::-webkit-scrollbar-thumb 
        {
          -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        }
        .heading
         {
           font-family: sans-serif; 
           color: #ffffff9e;
         }
        .control_panel {
            width: 29.6rem;
            padding: 3rem;
            display: flex;
            align-items: center;
            box-sizing: border-box;
            position: absolute;
            top: 0;
            
        }
    
        .form_holder form {
            text-align: center;
        }

        input,
        a {
            margin-bottom: 2rem;
            font-size: 1.04rem;
        }

        .form_input 
        {
            width: 100%;
            height: 35px;
            border: none;
            border-radius: 10px;
            padding-left: 1rem;
            box-sizing: border-box;
            border: 1px solid #25c4b5;
            background: #0fe9d421;
            outline: none;
            color: #fff;
            padding-left:1rem;
            box-sizing:border-box;
        }
        .form_input::placeholder
        {
            color: #fff;
        }
        .form_btn {
            width: 100%;
            height: 30px;
            background: transparent;
            border: none;
            cursor: pointer;
        }
        .form_text
        {
            width: 100%;
            height: 135px;
            resize: vertical;
            border-radius: 15px;
            padding-left: 1rem;
            border: 1px solid #25c4b5;
            background: #0fe9d421;
            margin-bottom: 2rem;
            padding: 10px;
            box-sizing: border-box;
            font-size: 1.03rem;
            color: #fff;
            outline:none;
            resize: none;
        }
        .form_text::placeholder
        {
            color: #fff;
        }
        #other_btn
        {
            text-decoration:none;
            color: #ffffff9e;
            font-size: 1.1rem;
            font-family: sans-serif;
        }
        #submit_btn:hover {
            background-color: #25c4b587;
        }

        #submit_btn {
            height: 35px;
            background-color: #25c4b5;
            border-radius:25px;
            color: #fff;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;

        }

   
        @media screen and (max-width:475px) {
        .control_panel
        {
        width: unset;
        padding: 30px;
        height: unset;
        }

        }
    </style>
</head>

<body >
        <div class="control_panel">
            <div class="form_holder">
            <h2 class='heading'>Add Cash out</h2>
                <form method="post" action="upload.php" enctype="multipart/form-data">          
                <input type="text" name="word" placeholder="Name *" class="form_input" required>
                <input type="date"  name="date" placeholder="Date" class="form_input" required>
                <textarea name="description" placeholder="Description.. *" class="form_text"  required></textarea>
                <input type="number" class="form_input"  name="example" placeholder="Price *" class="form_text"   required>
                <input type="submit" value="Submit" name="submit" id="submit_btn"  class="form_btn" >
                <input type="reset" name="reset"  id="submit_btn" class="form_btn">
                <a class="form_btn" href="../index.php"  id="other_btn">Go Home</a><br><br>
                <a class="form_btn" href="logout.php" id="other_btn">Log Out</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>