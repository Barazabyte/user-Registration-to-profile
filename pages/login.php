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
    <div id="container">
        <div id="imgWrap">
            <img src="../images/login.jpg" alt="image, Mbwembwe">
        </div>

        <div id="fomWrap">
            <h2>Manager Login</h2>
            <form action="login.php" method="post">
                <label for="uName">UserName</label> <br>
                <input type="text" name="uName"> <br>

                <label for="uName">Email</label> <br>
                <input type="email" name="email"> <br>

                <label for="uName">Password</label> <br>
                <input type="password" name="pass"> <br>

                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(isset($_POST['login'])) {
                            $uName = htmlspecialchars($_POST['uName']);
                            $email = htmlspecialchars($_POST['email']);
                            $pass = htmlspecialchars($_POST['pass']);
        
                            if(empty($uName) or empty($email) or empty($pass)) {
                                echo "<p style='color: red; font-weight: bold; margin-left: 70px;'>Fill All Fields</p>";
                            }
                        }
                    }

                ?>

                <input type="submit" name="login" value="Login" id="sub">
            </form>
            <div id="links">
                <a href="passReset.php">Forgot Password.?</a>
                <a href="register.php">Register</a>
            </div>
        </div>
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['login'])) {
                $uName = htmlspecialchars($_POST['uName']);
                $email = htmlspecialchars($_POST['email']);
                $pass = htmlspecialchars($_POST['pass']);

                if(!empty($uName) && !empty($email) && !empty($pass)) {
                    $sql = "SELECT userName, email, password FROM members WHERE userName = '$uName' AND email = '$email' AND password = '$pass'";
                    $data = mysqli_query($db, $sql);
                    $cnt = mysqli_num_rows($data);

                    if($cnt == 1) {

                        session_start();
                        $_SESSION['email'] = htmlspecialchars($_POST['email']);
                        $_SESSION['uName'] = htmlspecialchars($_POST['uName']);


                        $sql =  "SELECT * FROM members WHERE email = '$email' AND password = '$pass'";
                        $query = mysqli_query($db, $sql);
                        $data = mysqli_fetch_assoc($query);

                        $_SESSION['fName'] = $data['firstName'];
                        $_SESSION['lName'] = $data['lastName'];
                        $_SESSION['phone'] = $data['phone'];
                        $_SESSION['password'] = $data['password'];
                        header('location:profile.php');
                    } else { ?>

                        <script>alert('User Doesnot Exist');</script>
              <?php }
                }
            }
        }
 
    ?>

</body>
</html>
