<?php 
    function runQuery($query)
    {
        $conn = mysqli_connect("localhost","root","","stu_details") or die("Connection Failed");
        $result = mysqli_query($conn,$query) or die("Query can't run");
        return $result;
    }
?>