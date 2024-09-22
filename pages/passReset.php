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
    <div id="container2">
        <div id="imgWrap">
            <img src="../images/passw.jpg" alt="image, Mbwembwe">
        </div>

        <div id="fomWrap">
            <h2>Password Get</h2>
            <form action="passReset.php" method="post">
                <label for="uName">FirstName</label> <br>
                <input type="text" name="fName"> <br>

                <label for="uName">LastName</label> <br>
                <input type="text" name="lName"> <br>

                <label for="uName">email</label> <br>
                <input type="email" name="email"> <br>

                <label for="uName">Phone No</label> <br>
                <input type="text" name="phone"> <br>

                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(isset($_POST['submit'])) {
                            $fName = htmlspecialchars($_POST['fName']);
                            $lName = htmlspecialchars($_POST['lName']);
                            $email = htmlspecialchars($_POST['email']);
                            $phone = htmlspecialchars($_POST['phone']);
        
                            if(empty($fName) or empty($lName) or empty($uName) or empty($email) or empty($phone)) {
                                echo "<p style='color: red; font-weight: bold; margin-left: 70px;'>Fill All Fields</p>";
                            }
                        }
                    }

                ?>

                <input type="submit" name="submit" value="Get It" id="sub">
            </form>
            <div id="links">
                <a href="login.php" id="passw">Login</a>
            </div>
        </div>
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['submit'])) {
                $fName = htmlspecialchars($_POST['fName']);
                $lName = htmlspecialchars($_POST['lName']);
                $email = htmlspecialchars($_POST['email']);
                $phone = htmlspecialchars($_POST['phone']);

                if(!empty($fName) && !empty($lName) && !empty($email) && !empty($phone)) {
                    $sql = "SELECT firstName, lastName, email, password FROM members WHERE firstName = '$fName' AND lastName = '$lName' AND email = '$email' AND phone = '$phone'";
                    $data = mysqli_query($db, $sql);
                    $passd = mysqli_fetch_assoc($data);
                    $cnt = mysqli_num_rows($data);

                    if($cnt == 1) { ?>
                       <?php $password = $passd['password']; ?>

                        <script>alert('Your Password :: <?php echo $password; ?>');</script>

            <?php   } else { ?>

                        <script>alert('User Doesnot Exist');</script>
              <?php }
                }
            }
        }
 
    ?>

</body>
</html>