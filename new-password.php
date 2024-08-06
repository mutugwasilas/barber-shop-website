
<?php 
    $token = $_POST["token"];

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

    <?php
 
    // Get new passwords from form
    $new_password = $_POST["password"];
    $password_confirmation = $_POST["password_confirmation"];
    
    // Validate passwords
    if ($new_password !== $password_confirmation) {
        die("Passwords do not match");
    }

  

    // Update the password in the database
    $update_sql = "UPDATE users SET password = ?, reset_token_hash = NULL, token_expires_at = NULL WHERE email = ?";
    $update_stmt = $con->prepare($update_sql);
    $update_stmt->bind_param("ss", $new_password, $user["email"]);
    $update_stmt->execute();
    
    if ($update_stmt->affected_rows > 0) {
        echo "Password updated successfully!";


    } else {
        echo "Failed to update password. Please try again.";
    }
?>
