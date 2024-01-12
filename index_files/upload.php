<?php 
include 'connection.php';
if(isset($_POST['submit']))
{   
    $word=$_POST['word'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $example=$_POST['example'];

            $query="INSERT INTO `cew_words`(`word`, `date`, `description`, `example`) VALUES ('$word','$date','$description','$example')";
            $result = mysqli_query($con,$query);
            if($result)
            {
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
                    alert('Upload Failed');
                    window.location.href='../index.php';
                    </script>
                ";
            }
}
?>