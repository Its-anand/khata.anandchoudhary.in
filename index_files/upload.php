<?php 
include 'connection.php';
if(isset($_POST['submit']))
{   
    $word=$_POST['word'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $example=$_POST['example'];
    
    $word_exist_query="SELECT * FROM `cew_words` where `word`= '$_POST[word]'";
    $result=mysqli_query($con,$word_exist_query);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {

            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['word']==$_POST['word'])
            {
                echo"
                <script>
                    alert('$result_fetch[word] - word already exist');
                    window.location.href='Add Word.php';
                </script>
                 ";              
            }
        }
        else
        {
    $query="INSERT INTO `cew_words`(`word`, `date`, `description`, `example`) VALUES ('$word','$date','$description','$example')";
    $result = mysqli_query($con,$query);
    if($result)
    {
        echo"
        <script>
        alert('Uploaded Successfully');
        window.location.href='../index.php';
        </script>
        ";
    }
    else
    {
        echo"
        <script>
        alert('Upload Failed');
        window.location.href='../index.php';
        </script>
        ";
    }
    }
    }
}
?>