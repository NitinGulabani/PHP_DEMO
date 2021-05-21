<?php 
    ob_start();
    include "links.php";
    include "conn.php";
    
    $errormsg = "";
    if(isset($_POST['submit']))
    {
        $validation = true;
        
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile_number = $_POST['mobile_number'];
        $degree = $_POST['degree'];
        $gender = $_POST['gender'];
        if($_POST['prog_lang'] == "")
        {
            $validation = false;
            $errormsg = "Please Select Atleast One Language";
        }
        else
        {
            $prog_lang = implode(",",$_POST['prog_lang']);
        }

        $email_check = "SELECT email FROM student where email = '$email'";
        $result = runQuery($email_check);
        
        if(mysqli_num_rows($result) > 0)
        {
            $validation = false;
            $errormsg = $email." is Already Exist";
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
        
        if($validation)
        {
            $query = "INSERT INTO student (full_name,email,password,mobile_number,degree,gender,pro_lang)
            VALUES ('$full_name','$email','$password','$mobile_number','$degree','$gender','$prog_lang')";

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
                <h1>Add Details</h1>
                <Button class="btn-info"><a href="index.php">Show Records</a></Button>
            </div>
            <form id = "form" onsubmit="return validate()"  action="<?php $_SERVER['PHP_SELF']?>" autocomplete="off" method="post">

                <div class="form-body">
                <div class="form-content">
                    <p><?php echo $errormsg; ?></p><br>
                    <label for="full_name">Full Name</label>
                    <input type="text" class="name" name="full_name" required>
                </div>
                <div class="form-content">
                    <label for="full_name">Email</label><br>
                    <input class="email" type="email" name="email" autocomplete="off" required>
                    <p class="error_msg"></p>                    
                </div>
                <div class="form-content">
                   <label for="password">Password</label>
                    <input  type="password" name="password" required>
                </div>
                <div class="form-content">
                    <label for="">Mobile Number</label>
                    <input type="number" name="mobile_number" maxlength="10" required>
                </div>

                <div class="form-content">
                    <label for="degree">Degree</label>
                    <select name="degree" class="degree" required>
                        <option disabled selected>Select Degree</option>
                        <option value="BCA">BCA</option>
                        <option value="MCA">MCA</option>
                        <option value="BSC IT">BSC IT</option>
                        <option value="BBA">BBA</option>
                        <option value="MBA">MBA</option>
                    </select>
                </div>

                <div class="form-content">
                    <span>Gender:</span>
                    <input type="radio" id = "male" value = "male" name = "gender" required>
                    <label for="male">Male</label>

                    <input type="radio" id = "female" value = "female" name = "gender">
                    <label for="female">Female</label>
                </div>
                <div class="form-content">
                   <span>Programming Language Known:</span>
                    <br>
                    <input type="checkbox" id="java" name="prog_lang[]" value="java">
                    <label for="java">java</label><br>
                    <input type="checkbox" id="javascript" name="prog_lang[]" value="javascript">
                    <label for="javascript"> Javascript</label><br>
                    <input type="checkbox" id="python" name="prog_lang[]" value="python">
                    <label for="python"> python </label><br>
                    <input type="checkbox" id="Ruby" name="prog_lang[]" value="Ruby">
                    <label for="Ruby"> Ruby </label>
                </div>

                <br>
                <input id="submit-btn" class = "btn-primary submit-btn" type = "submit" name="submit" value="submit">
                </div>

            </form>
        </div>
    </div>
    <?php
        ob_end_flush();
    ?>
</body>
</html>