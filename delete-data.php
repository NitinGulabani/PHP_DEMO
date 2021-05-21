<?php 
    include "conn.php";
	
	$stu_id = $_GET['id'];
	$query = "delete from student where id ={$stu_id}";
    $result = runQuery($query);
	header("location:http://localhost/FormWithPHP/index.php");
	
?>