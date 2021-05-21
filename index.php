<?php 
    include "links.php";
    include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between table-header">
                <h1>Student Details</h1>
                <button class="add-btn btn-info text-white"><a href="add-data.php"> Add New</a></button>
            </div>
            
            <div class="col-12 table-body">
                <div class="table-responsive-lg">
                    <?php 
                        $query = "SELECT * FROM student";
                        $result = runQuery($query);
                        
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($rows = mysqli_fetch_assoc($result))
                            {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Mobile Number</th>
                                <th>Degree</th>
                                <th>Gender</th>
                                <th>Programming Languages</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <td><?php echo $rows['id'];?></td>
                                <td><?php echo $rows['full_name'];?></td>
                                <td><?php echo $rows['email'];?></td>
                                <td><?php echo $rows['password'];?></td>
                                <td><?php echo $rows['mobile_number'];?></td>
                                <td><?php echo $rows['degree'];?></td>
                                <td><?php echo $rows['gender'];?></td>
                                <td><?php echo $rows['pro_lang'];?></td>
                                <td>
                                    <Button class="btn-success"><a href="edit-data.php?id=<?php echo $rows['id']?>">Edit</a></Button>
                                    <Button class="btn-danger"><a href="delete-data.php?id=<?php echo $rows['id']?>">Delete</a></Button>
                                </td>
                            </tr>
                            </tbody>
                            <?php 
                                    }
                                 }
                                 else
                                 {
                                     echo "<h2>Record Not Found</h2>";
                                 }
                            ?>
                     </table>
                </div>
            </div>
        </div>    
    </div>
    
</body>
</html>