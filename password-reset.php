<?php
    $email = $_POST['email'];

    $token = bin2hex(random_bytes(16));

    $token_hash = hash("sha256" , $token);

    $expiry= date("Y-m-d H:i:s", time() + 60*40);

    $con = require __DIR__ . "/php/config.php";

    $sql = "UPDATE users SET reset_token_hash =?, token_expires_at = ? WHERE email = ?";

    $stmt = $con->prepare($sql); 
    
    $stmt->bind_param("sss", $token_hash, $expiry, $email);

    $stmt->execute();


    if($con->affected_rows){

       $mail =  require __DIR__ . "/mailer.php";

       $mail->setFrom("your email account@gmail.com", "your name");
       $mail->addAddress($email);
       $mail->Subject = "Password reset";
       $mail->Body = <<<END

      
       Click <a href="http://localhost/flitz/reset-link.php?token=$token">here</a>
       to reset password
        


       END;
        try{
            $mail->send();
        }catch(Exception $e){
            echo "message couldn't be sent. Mailer error:{$mail->ErrorInfo}";
        }
       

    }

    echo "Message sent, please check your email";
    