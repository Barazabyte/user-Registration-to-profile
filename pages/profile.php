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
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="container4">
        <div id="details">
            <form action="profile.php" method="post">
                <label for="uName">FirstName : </label> <?php echo "<span style='font-weight: bold; font-size: 18px; color: cadetblue;'> $fName </span>"; ?> <br> <br>
                <label for="uName">LastName : </label> <?php echo "<span style='font-weight: bold; font-size: 18px; color: cadetblue;'> $lName </span>"; ?> <br> <br>
                <label for="uName">UserName : </label> <?php echo "<span style='font-weight: bold; font-size: 18px; color: cadetblue;'> $uName </span>"; ?> <br> <br>
                <label for="uName">Email : </label> <?php echo "<span style='font-weight: bold; font-size: 18px; color: cadetblue;'> $email </span>"; ?> <br> <br>
                <label for="uName">Phone : </label> <?php echo "<span style='font-weight: bold; font-size: 18px; color: cadetblue;'> $phone </span>"; ?> <br> <br>
                <label for="uName">Password : </label> <?php echo "<span style='font-weight: bold; font-size: 18px; color: cadetblue;'> $pass </span>"; ?> <br> <br>
                
                <input type="submit" value="LogOut" name="logOut">
                <?php
                    if(isset($_POST['logOut'])) { 

                        header('location:login.php');
                        session_destroy();
                    } else if(isset($_POST['edit'])) {
                        header('location:edit.php');
                    }

                ?>
            </form>


        </div>
        <div id="image">
            <img src="../icons/user.png" alt="alternative mbwembwe">
            <form action="profile.php" method="post">
                <input type="submit" value="Edit Profile" id="edit" name="edit">
            </form>
        </div>
    </div>
</body>
</html>