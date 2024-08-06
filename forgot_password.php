


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="form">

            <header>Forgot Password</header>
            <form action="password-reset.php" method="post">

                <div class="box-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" >
                </div>

                <div class="box">
                    <input type="submit" class="btn" value="Reset" name="submit">
                </div>

                <div class="links">
                    go back to login page <a href="index.php">Sign in</a>
                </div>
            </form>
        </div>
     
    </div>
</body>
</html>