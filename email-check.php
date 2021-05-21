<?php 
    include "conn.php";
    $email = $_POST['email'];
    $email_check = "SELECT email FROM student where email = '$email'";
    $result = runQuery($email_check);
    
    if(mysqli_num_rows($result) > 0)
    {
        echo true;
    }
    else
    {
        echo false;
    }
?>