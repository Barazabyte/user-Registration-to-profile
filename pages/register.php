<?php 
    $db = mysqli_connect('localhost', 'root', '', 'loginBattle'); // Connecting to a Database
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="container3">
        <div id="imgWrap">
            <img src="../images/login.jpg" alt="image, Mbwembwe">
        </div>

        <div id="fomWrap">
            <h2>Registration</h2>
            <form action="register.php" method="post">
                <label for="fName">FirstName</label> <br>
                <input type="text" name="fName"> <br>

                <label for="Lname">LastName</label> <br>
                <input type="text" name="lName"> <br>

                <label for="uName">UserName</label> <br>
                <input type="text" name="uName"> <br>

                <label for="email">email</label> <br>
                <input type="email" name="email"> <br>

                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(isset($_POST['submit'])) {
                            $email = htmlspecialchars($_POST['email']);

                            $emSql = "SELECT email FROM members WHERE email = '$email'";
                            $emData = mysqli_query($db, $emSql);
                            $cnt = mysqli_num_rows($emData);

                            if($cnt > 0) {
                                echo "<p style='color: red; font-weight: bold; margin-left: 70px;'>User Exists</p>";
                            }
                        }
                    }

                ?>

                <label for="phNo">Phone No</label> <br>
                <input type="text" name="phone"> <br>

                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(isset($_POST['submit'])) {
                            $fName = htmlspecialchars($_POST['fName']);
                            $lName = htmlspecialchars($_POST['lName']);
                            $uName = htmlspecialchars($_POST['uName']);
                            $email = htmlspecialchars($_POST['email']);
                            $phone = htmlspecialchars($_POST['phone']);
        
                            if(empty($fName) or empty($lName) or empty($uName) or empty($email) or empty($phone)) {
                                echo "<p style='color: red; font-weight: bold; margin-left: 70px;'>Fill All Fields</p>";
                            }
                        }
                    }

                ?>

                <label for="pass">Password</label> <br> 
                <input type="password" name="pass1" placeholder="Enter Password" style="text-align: center;"> <br>
                <input type="password" name="pass2" placeholder="Confirm Password" style="text-align: center;"> <br>

                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $pass1 = htmlspecialchars($_POST['pass1']);
                        $pass2 = htmlspecialchars($_POST['pass2']);
    
                        if(!empty($pass1) && !empty($pass2)) {
                            if($pass1 != $pass2) {
                                echo "<p style='color: red; font-weight: bold; margin-left: 70px;'>Wrong Password</p>";
                            }
                        } else {
                            echo "<p style='color: red; font-weight: bold; margin-left: 38px;'>Fill All Password Fields</p>";
                        }
                    }

                ?>

                <input type="submit" name="submit" value="Register" id="sub">
            </form>
            <div id="links">
                <a href="login.php" id="passw">Login</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fName = htmlspecialchars($_POST['fName']);
        $lName = htmlspecialchars($_POST['lName']);
        $uName = htmlspecialchars($_POST['uName']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        
        $pass1 = htmlspecialchars($_POST['pass1']);
        $pass2 = htmlspecialchars($_POST['pass2']);

    
    if(isset($_POST['submit'])) {
        if(!empty($fName) && !empty($lName) && !empty($uName) && !empty($email) && !empty($phone)) { // Ensures all Fields are !empty

            if(!empty($pass1) && !empty($pass2)) { // Ensures all fields are !empty and equal
                if($pass1 === $pass2) {
                    $password = $pass2;

                    $emSql = "SELECT email FROM members WHERE email = '$email'";
                    $emData = mysqli_query($db, $emSql);
                    $cnt = mysqli_num_rows($emData);

                    if($cnt == 0) {
                        $sql = "INSERT INTO members(firstName, lastName, userName, email, phone, password) VALUES ('$fName', '$lName', '$uName', '$email', '$phone', '$password' )";
                        $data = mysqli_query($db, $sql); ?>
    
                        <script>alert('Registered Successively')</script>

                   <?php }


                }
            }
        }
    }


    }
?>

