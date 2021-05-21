<?php 
    ob_start();
    include "links.php";
    include "conn.php";

    $errormsg = "";
    if(isset($_POST['submit']))
    {
        $validation = true;

        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile_number = $_POST['mobile_number'];
        $degree = $_POST['degree'];
        $gender = $_POST['gender'];
        

        $email_check = "SELECT * FROM student where email = '$email'";
        $result_email = runQuery($email_check);

        $row = mysqli_fetch_assoc($result_email);
        
        if(mysqli_num_rows($result_email) > 0)
        {
            $validation = false;
            $errormsg = "This Email Already Exist";
        }

        if($email == $row['email'])
        {
            $validation = true;
        }

        if(strlen($password) < 8)
        {
            $validation = false;
            $errormsg = "Please Enter 8 Character Password";
        }
        if(strlen($mobile_number) != 10)
        {
            $validation = false;
            $errormsg = "Please Enter 10 Digit Number";
        }
        if($_POST['prog_lang'] == "")
        {
            $validation = false;
            $errormsg = "Please Select Atleast One Language";
        }
        else
        {
            $prog_lang = implode(",",$_POST['prog_lang']);
        }
        
        if($validation)
        {
            $query = "UPDATE student SET full_name = '$full_name',email = '$email',
            password = '$password',mobile_number = '$mobile_number',degree = '$degree'
            ,gender = '$gender',pro_lang = '$prog_lang' WHERE id = '$id'";
            
            $result = runQuery($query);

            header("location:http://localhost/FormWithPHP/index.php");   
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container"> 
        <div class="row">
       
        <div class="col-12 d-flex align-items-center justify-content-between table-header w-50">
                <h1>Update Details</h1>
                <Button class="btn-info"><a href="index.php">Show Records</a></Button>
            </div>
            <?php 
                $stu_id = $_GET['id'];
                $query1 = "SELECT * FROM student WHERE id = '$stu_id'";
                
                $result1 = runQuery($query1);
                
                if(mysqli_num_rows($result1) > 0)
                {
                    while($rows = mysqli_fetch_assoc($result1))
                    {
                        $prog_lang = explode(",",$rows['pro_lang']);
            ?>
            <form id = "form" action="<?php $_SERVER['PHP_SELF']?>" method="post">

                <div class="form-body">
                <div class="form-content input-text">
                    <input hidden value = "<?php echo $rows['id'];?>" type="text" name="id" required>
                </div>
                <div class="form-content input-text">
                    <p><?php echo $errormsg; ?></p><br>
                    <label for="full_name">Full Name</label>
                    <input value = "<?php echo $rows['full_name'];?>" type="text" name="full_name" required>
                </div>
                <div class="form-content input-text">
                    <label for="full_name">Email</label><br>
                    <input value = "<?php echo $rows['email'];?>" type="email" name="email" required>
                </div>
                <div class="form-content input-text">
                   <label for="password">Password</label>
                    <input value = "<?php echo $rows['password'];?>" type="password" name="password" required>
                </div>
                <div class="form-content input-text">
                    <label for="">Mobile Number</label>
                    <input value = "<?php echo $rows['mobile_number'];?>" type="number" name="mobile_number" required>
                </div>

                <div class="form-content">
                    <label for="degree">Degree</label>
                    <select name="degree" required>
                      <option disabled>Select Degree</option>
                        <option value="BCA"
                        <?php 
                            if($rows['degree'] == 'BCA')
                            {
                                echo "selected";
                            }
                        ?>
                        >BCA</option>

                        <option value="MCA"
                        <?php 
                            if($rows['degree'] == 'MCA')
                            {
                                echo "selected";
                            }
                        ?>>MCA</option>

                        <option value="BSC IT"
                        <?php 
                            if($rows['degree'] == 'BSC IT')
                            {
                                echo "selected";
                            }
                        ?>>BSC IT</option>

                        <option value="BBA"
                        <?php 
                            if($rows['degree'] == 'BBA')
                            {
                                echo "selected";
                            }
                        ?>>BBA</option>

                        <option value="MBA"
                        <?php 
                            if($rows['degree'] == 'MBA')
                            {
                                echo "selected";
                            }
                        ?>>MBA</option>
                    </select>
                    
                </div>

                <div class="form-content">
                    <span>Gender:</span>
                    <input type="radio" id = "male" value = "male" name = "gender" required
                    <?php 
                            if($rows['gender'] == 'male')
                            {
                                echo "checked";
                            }
                        ?>>
                    <label for="male">Male</label>

                    <input type="radio" id = "female" value = "female" name = "gender"
                    <?php 
                            if($rows['gender'] == 'female')
                            {
                                echo "checked";
                            }
                        ?>>
                    <label for="female">Female</label>
                </div>
                <div class="form-content">
                   <span>Programming Language Known:</span>
                    <br>
                    <input type="checkbox" id="java" name="prog_lang[]" value="java"
                    <?php 
                        if(in_array("java",$prog_lang))
                        {
                            echo "checked";
                        }
                    ?>>
                    <label for="java">java</label><br>
                    <input type="checkbox" id="javascript" name="prog_lang[]" value="javascript"
                    <?php 
                        if(in_array("javascript",$prog_lang))
                        {
                            echo "checked";
                        }
                    ?>>
                    <label for="javascript"> Javascript</label><br>
                    <input type="checkbox" id="python" name="prog_lang[]" value="python"
                    <?php 
                        if(in_array("python",$prog_lang))
                        {
                            echo "checked";
                        }
                    ?>>
                    <label for="python"> python </label><br>
                    <input type="checkbox" id="Ruby" name="prog_lang[]" value="Ruby"
                    <?php 
                        if(in_array("Ruby",$prog_lang))
                        {
                            echo "checked";
                        }
                    ?>>
                    <label for="Ruby"> Ruby </label>
                </div>

                <br><input class = "btn-primary submit-btn" type = "submit" name="submit" value="Update">
                </div>

            </form>
            <?php 
                }
            }
            ob_end_flush();
            ?>
        </div>
    </div>
</body>
</html>