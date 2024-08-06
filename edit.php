

<?php 
    session_start();
    include("php/config.php");

    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="form">

        <?php 
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];

                $id = $_SESSION['id'];

                $edit = mysqli_query($con, "UPDATE users SET username='$username', email='$email' WHERE Id = $id")
                or die("couldn't update");

                if($edit){
                    echo "<div class='message'>
                    <p> Update Successful</p>

                    </div>";
                    
                    echo "<a href='home.php' ><button class='btn'> Go Home</button></a>";
                }
            }else{
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE Id = $id");

                while($result = mysqli_fetch_assoc($query)){
                    $res_uname = $result['username'];
                    $res_email = $result['email'];

                }
          
        ?>
            <header>Change Profile</header>
            <form action="" method="post">

                <div class="box-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_uname; ?>">
                </div>

                <div class="box-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res_email; ?>">
                </div>

                <div class="box">
                    <input type="submit" class="btn" value="Update" name="submit">
                </div>

                <div class="links">
                    Home Page <a href="home.php">Home</a>
                </div>

            </form>
        </div>
        <?php   } ?>
    </div>
</body>
</html>