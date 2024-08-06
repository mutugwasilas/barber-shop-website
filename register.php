<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="form">

        <?php 
            include("php/config.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];


                //unique email
                $verify_query = mysqli_query($con, "SELECT email from users WHERE email = '$email' ");

                if(mysqli_num_rows($verify_query) != 0 ){
                    echo "<div class='message'>
                             <p> Email already exists</p>

                          </div>";
                    echo "<a href='javascript:self.history.back()' ><button class='btn'>Go Back</button></a>";
                   
                }
                else{
                    mysqli_query($con, "INSERT INTO users(username, email, password) VALUES
                    ('$username', '$email', '$password')") or die("error occurred");

                    echo "<div class='message'>
                    <p> Registration Successful</p>

                    </div>";
                    
                    echo "<a href='index.php' ><button class='btn'>Login Now</button></a>";
                }
            }
            else{

           
        ?>
            <header>Sign Up</header>
            <form action="" method="post">

                <div class="box-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="box-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>

                <div class="box-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="box">
                    <input type="submit" class="btn" value="Sign Up" name="submit">
                </div>

                <div class="links">
                    Already have an account? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>