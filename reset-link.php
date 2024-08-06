<?php 
    $token = $_GET["token"];

    $token_hash = hash("sha256", $token);
    $con = require __DIR__ ."/php/config.php";

    $sql = "SELECT * FROM users WHERE reset_token_hash  = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $token_hash);
    $stmt->execute();


    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user === null){
        die("token not found");
    }

    if (strtotime($user["token_expires_at"]) <= time()){
        die("token has expired");
    }

   
    ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="form">


     
            <header>Reset Password</header>
            <form action="new-password.php" method="post">

                <div class="box-input">
                    
                    <input type="hidden" name="token" value="<?=htmlspecialchars($token)?>" >
                </div>

                <div class="box-input">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="box-input">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <div class="box">
                    <input type="submit" class="btn" value="Send" name="submit">
                </div>

                
            </form>
        </div>
        
    </div>
</body>
</html>