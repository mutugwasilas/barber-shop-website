

<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="form">

            <?php 
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);


                    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password' ")
                    or die("Select error");

                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $row['email'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['id'] = $row['Id'];

                    }else{
                        echo "<div class='message'>
                        <p> Wrong Credentials</p>

                             </div>";
                        echo "<a href='index.php' ><button class='btn'>Go Back</button></a>";
                    }
                    if(isset($_SESSION['valid'])){
                        header("Location: home.php");
                    }
                }else{

               
            ?>

            <header>Login</header>
            <form action="" method="post">

                <div class="box-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" >
                </div>

                <div class="box-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="box">
                    <input type="submit" class="btn" value="Login" name="submit">
                </div>

                <div class="links">
                    Don't have an account? <a href="register.php">Sign up</a><br>
                     <a href="forgot_password.php">Forgot Password</a>
                </div>
            </form>
        </div>
        <?php  } ?> 
    </div>
</body>
</html>