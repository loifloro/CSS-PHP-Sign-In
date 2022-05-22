<?php 
//signup.php
include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="color-scheme" content="dark"> --> 
    <title>Registration</title>
    <script src="../js/app.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <!-- hello -->
</head>
<body>
    <!-- jumbotron -->
    <form action="" method="POST">
        <div class="card">
            <div>
                <h2> Registration</h2>
                <div>
                    <span> Status </span>
                    <select name="Status" id="" required>
                        <option value="Administrator"> Administrator </option>
                        <option value="Student"> Student </option>
                        <option value="Teacher"> Teacher </option>
                    </select>
                </div>
                <div>
                    <span> First Name </span>
                    <input type="text" name="FirstName" required>
                </div>
                <div>
                    <span> Middle Name </span>
                    <input type="text" name="MiddleName" id="" required>
                </div>
                <div>
                    <span> Last Name </span>
                    <input type="text" name="LastName" id="" required>
                </div>
                <div>
                    <span> Sex </span>
                    <div class="sex">
                        <span> Male  </span>
                        <input type="radio" name="Sex" id="" value="Male" required>
                        <span> Female  </span>
                        <input type="radio" name="Sex" id="" value="Female">
                    </div>
                </div>
                <div>
                    <span> Username </span>
                    <input type="text" name="Username" id="" required>
                </div>
                <div>
                    <span> Password </span>
                    <input type="password" name="Password" id="" required>
                </div>
                <div>
                    <span> Confirm Password </span>
                    <input type="password" name="ConfirmPassword" id="" required>
                </div>
                <div>
                    <input type="submit" value="Sign Up" name="Register">
                </div>
            </div>
        </div>
    </form>

    <?php 
        if(isset($_REQUEST['Register'])) {
            // $FirstName = "FirstName";
            $Status = mysqli_real_escape_string($con, $_POST['Status']);
            $FirstName = mysqli_real_escape_string($con, $_POST['FirstName']);
            $MiddleName = mysqli_real_escape_string($con, $_POST['MiddleName']);
            $LastName = mysqli_real_escape_string($con, $_POST['LastName']);
            $Sex = mysqli_real_escape_string($con, $_POST['Sex']);
            $Username = mysqli_real_escape_string($con, $_POST['Username']);
            $Password = mysqli_real_escape_string($con, $_POST['Password']);
            $ConfirmPassword = mysqli_real_escape_string($con, $_POST['ConfirmPassword']);
            $RegDate = date('Y-n-d');
            // $SpecialChar = '[!@#$%^&*(),.?":{}|<>]';
        
            if (($Password != $ConfirmPassword)){
    ?>
                <script type="text/javascript">
                    errorMismatch();
                </script>
    <?php        
            } //end of if
            elseif (strlen($Password) <= 9 ){
    ?>          
                <script type="text/javascript">
                    errorLength();
                </script>
    <?php 
            }//end of else if
            elseif ((preg_match("/[0-9]+/" , $Password) == false) && (preg_match("/[!@#$%^&*(),.?:{}|<>]+/", $Password) == false)){
    ?>          
                <script type="text/javascript">
                    errorNumberSpecialChar();
                </script>
    <?php 
            }//end of else if       
            elseif ((preg_match("/[a-zA-Z]+/", $Password) == false) && (preg_match("/[!@#$%^&*(),.?:{}|<>]+/" , $Password) == false)){
    ?>          
                <script type="text/javascript">
                    errorLetterSpecialChar();
                </script>
    <?php 
            }//end of if /^[0-9a-zA-Z]+$/
            elseif (preg_match("/[0-9]+/" , $Password) == false){
    ?>          
                <script type="text/javascript">
                    errorNumber();
                </script>
    <?php 
            }//end of else if
            elseif (preg_match("/[a-zA-Z]+/" , $Password) == false ){
    ?>          
                <script type="text/javascript">
                    errorLetter();
                </script>
    <?php 
            }//end of else if
            elseif  (preg_match("/[!@#$%^&*(),.?:{}|<>]+/" , $Password) == false){
    ?>          
                <script type="text/javascript">
                    errorSpecialChar();
                </script>
    <?php 
            }//end of else if       
            else {
                 // insert data to table
                $sql = "INSERT INTO tbl_accounts VALUES (0 , '$FirstName' ,  '$MiddleName' , '$LastName' , '$Sex' , '$Status' , '$Username' , '$Password' , '$RegDate')";
                mysqli_query($con , $sql);
    ?>      
                <script type="text/javascript">
                    alert("You have successfully created your account!");
                    window.location = "signup.php";
                </script>
    <?php 
            }        
        }
    mysqli_close($con); 
    ?>
</body>
</html>