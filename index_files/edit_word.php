<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Word</title>
    <style>
        .disclaimer 
        {
             display: none;
        }
        body 
        {
            margin: 0;
            background:#0d1117;
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
            background:#0d1117;
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
            border: 1px solid #25c4b5;
            background: #0fe9d421;
            outline: none;
            color: #fff;
            padding-left:1rem;
            box-sizing:border-box;
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
        .form_input::placeholder
        {
            color: #fff;
        }
        .form_btn {
            width: 100%;
            height: 30px;
            height: 35px;
            background:#0d1117;
            color: #fff;
            border: none;
            font-size: 1.2rem;
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
<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['logged_in']))
{
    header("location: Admin Login.php");
}
if(isset($_POST['edit_word']))
{
$word_id = $_POST['edit_word_id'];
$query = "SELECT * FROM cew_words where id = '$word_id'";
$result = mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
        $result_fetch=mysqli_fetch_assoc($result);
        $word = $result_fetch['word']; 
        $date = $result_fetch['date'];
        $description = $result_fetch['description'];
        $example = $result_fetch['example'];
        ?>
        <body >
        <div class="control_panel">
            <div class="form_holder">
            <h2 class='heading'>Edit Cash Out</h2>
                <form action = "update.php" method="post">          
                <input type="text" name="word" placeholder="Name *" value='<?php echo $word;?>' class="form_input" require>
                <input type="text"  name="date" placeholder="Date *" value='<?php echo $date;?>' class="form_input" require>
                <textarea name="description" placeholder="Description.. *" class="form_text" require><?php echo $description;?></textarea>
                <input type="number" class="form_input"  name="example" placeholder="Price *" class="form_text" value='<?php echo $example;?>'  required>
                <input type='hidden'value='<?php echo $word_id ?>' name='word_id' >
                <input type="submit" value="Update" name="update" id="submit_btn"  class="form_btn">
                <input type="reset" name="reset" class="form_btn">
                <a class="form_btn" href="../index.php"  id="other_btn">Go Home</a><br><br>
                <a class="form_btn" href="logout.php" id="other_btn">Log Out</a>
                </form>
            </div>
        </div>
    </div>

</body>
<?php   
        }
    }
}
else 
    {
        echo"
        <script>
        alert('Click the Edit button first');
            window.location.href='../index.php';
        </script>
        "; 
    }
    
?>
</html>