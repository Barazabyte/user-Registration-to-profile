<?php 
    session_start();
    $fName = $_SESSION['fName'];
    $lName = $_SESSION['lName'];
    $phone = $_SESSION['phone'];
    $pass = $_SESSION['password'];
    $email = $_SESSION['email'];
    $uName = $_SESSION['uName'];

    $db = mysqli_connect('localhost', 'root', '', 'loginBattle'); // Connecting to a Database
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="container3">
        <div id="imgWrap">
            <img src="../images/login.jpg" alt="image, Mbwembwe">
        </div>

        <div id="fomWrap">
            <h2>Profile Update</h2>
            <form action="edit.php" method="post">
                <label for="fName">FirstName</label> <br>
                <input type="text" name="fName" value=<?php echo $fName ?>> <br>

                <label for="Lname">LastName</label> <br>
                <input type="text" name="lName" value=<?php echo $lName ?>> <br>

                <label for="uName">UserName</label> <br>
                <input type="text" name="uName" value=<?php echo $uName ?>> <br>

                <label for="phNo">Phone No</label> <br>
                <input type="text" name="phone" value=<?php echo $phone ?>> <br>

                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(isset($_POST['submit'])) {
                            $fName = htmlspecialchars($_POST['fName']);
                            $lName = htmlspecialchars($_POST['lName']);
                            $uName = htmlspecialchars($_POST['uName']);
                            $phone = htmlspecialchars($_POST['phone']);
        
                            if(empty($fName) or empty($lName) or empty($uName) or empty($email) or empty($phone)) {
                                echo "<p style='color: red; font-weight: bold; margin-left: 70px;'>Fill All Fields</p>";
                            }
                        }
                    }

                ?>

                <label for="pass">Password</label> <br> 
                <input type="text" name="pass1" value=<?php echo $pass ?>> <br>

                <input type="submit" name="submit" value="Update" id="sub">
            </form>
            <div id="links">
                <a href="profile.php" id="passw">Profile</a>
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
        $phone = htmlspecialchars($_POST['phone']);
        $pass = htmlspecialchars($_POST['pass1']);
    
    if(isset($_POST['submit'])) {
        if(!empty($fName) && !empty($lName) && !empty($uName) && !empty($phone) && !empty($pass)) { // Ensures all Fields are !empty

                        $sql = "UPDATE members SET firstName = '$fName', lastName = '$lName', userName = '$uName', email = '$email', phone = '$phone', password = '$pass' WHERE email = '$email'";
                        $data = mysqli_query($db, $sql); ?>
    
                        <script>alert('Updated Successively')</script>

                   <?php 
                   
                   $sql =  "SELECT * FROM members";
                   $query = mysqli_query($db, $sql);
                   $data = mysqli_fetch_assoc($query);
           
                   $_SESSION['fName'] = $data['firstName'];
                   $_SESSION['lName'] = $data['lastName'];
                   $_SESSION['phone'] = $data['phone'];
                   $_SESSION['password'] = $data['password'];
                                
                }


            
        }
    }

?>

