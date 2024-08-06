

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
    <title>flitz</title>
    <link rel="stylesheet" href="style/home.css">
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.
    4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xp
    aRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <div class="nav">
        <h2>Flitz</h2>
        <ul id="item">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#session">Cuts</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="edit.php">Update</a></li>
            <li><a href="logout.php">Logout</a></li>

            <?php 
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE Id = $id ");

                while($results = mysqli_fetch_assoc($query)){
                    $res_uname = $results['username'];
                    $res_email = $results['email'];
                    $res_id = $results['Id'];
                }
                echo "<li><a href='edit.php?Id=$res_id'>Update</a></li>"
            ?>
          


            <div class="icon">
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-youtube-play" aria-hidden="true"></i>
            </div>
        </ul>
        <i id="bar" class="fa fa-bars" aria-hidden="true"></i>
    </div>
    <div class="backg" id="home">
        <div class="over"></div>
    </div>
    <div class="middle">
        <p>Crafting confidence, one haircut at a time</p>
        <h2>Transform your style with expert cuts</h2>
        <div class="btn">
            <a class="first" href="#">Get Started</a>
            <a class="second" href="#">Learn More</a>
        </div>
    </div>

    <!--section 2-->
    <div class="details" data-aos="fade-right">
        <div class="one" >
            <h3>New to Flitz?</h3>
            <h6>membership is up to 3 months FREE (Ksh 1000 per month)</h6>
            <p>Welcome to Flitz Barbershop, where skilled barbers, top-notch equipment, 
                and a welcoming atmosphere come together
                 to provide you with exceptional grooming services and an unforgettable experience</p>
             <a href="#">join our membership</a>
        </div>
        <div class="two" >
            <h3>working hours</h3><br>
            <h5>Sundays : Closed</h5>
            <h5>Monday - Friday</h5>
            <p>7:00AM - 8:00PM</p><br>

            <h5>Saturdays</h5>
            <p>9:00AM - 7:00PM</p>

        </div>
    </div>

    <!--sessions-->
    <div class="train" id="about" data-aos="fade-left">
        <div class="about" >
            <h2>Hello, We are Flitz</h2>
            <p>
                "A barber is a professional who has obtained certification validating
                 their expertise in providing safe and effective grooming services tailored to individual needs.
                  Their role extends beyond merely cutting hair; they enhance clients' experiences by 
                  collaborating to achieve desired looks, offering insightful and constructive
                 feedback, and acting as a consistent and reliable source of style and grooming advice."
                <br><br>
                "Barbers ensure grooming services are beneficial, engaging, and tailored to clients' 
                preferences, fostering a supportive environment for commitment and achieving the desired look."
                </p>
        </div>
        <div class="proff">
            <div class="trainer1">
                <div class="image">
                    <img src="media/barber3.jpg" alt="">

                </div>
                <div class="trainer_info">
                    <div class="name">
                        <h4>John Hayes</h4>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                    <div class="pro">
                        <p>barber</p>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="trainer1">
                <div class="image">
                    <img src="media/barber2.jpg" alt="">

                </div>
                <div class="trainer_info">
                    <div class="name">
                        <h4>Ryan Lee</h4>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                    <div class="pro">
                        <p>barber</p>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--sessions-->
    <div class="session" id="session" data-aos="fade-right">
        <p class="paragraph">experience the perfect cut and style</p>
        <h2 class="head">our exquisite haircuts.</h2>

        <div class="cart">

            <div class="trainer1">
                <div class="image">
                    <img src="media/1.jpg" alt="">

                </div>
                <div class="trainer_info">
                    <div class="name">
                        <div class="namedetails">
                            <h4>taper fade</h4>
                            <p>Cut by - <span>Bella</span></p>
                        </div>
                        <div class="num">
                            <h5>sh 250</h5>
                        </div>
                    </div>
                    <div class="pro">
                        <p>Lorem ipsum dolor sit amet <br>consectetur adipisicing.</p>
                       
                    </div>
                </div>
            </div>


            <div class="trainer1">
                <div class="image">
                    <img src="media/style2.webp" alt="">

                </div>
                <div class="trainer_info">
                    <div class="name">
                        <div class="namedetails">
                            <h4>drop fade</h4>
                            <p>Cut by - <span>Bella</span></p>
                        </div>
                        <div class="num">
                            <h5>sh 400</h5>
                        </div>
                    </div>
                    <div class="pro">
                        <p>Lorem ipsum dolor sit amet <br>consectetur adipisicing.</p>

                    </div>
                </div>
            </div>



            <div class="trainer1">
                <div class="image">
                    <img src="media/2.jpg" alt="">

                </div>
                <div class="trainer_info">
                    <div class="name">
                        <div class="namedetails">
                            <h4>Buzz cut</h4>
                            <p>Cut by - <span>Bella</span></p>
                        </div>
                        <div class="num">
                            <h5>sh 300</h5>
                        </div>
                    </div>
                    <div class="pro">
                        <p>Lorem ipsum dolor sit amet <br>consectetur adipisicing.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--contact-->

    <div class="contact" id="contact" data-aos="fade-up">
        <div class="form">
            <form action="" method="POST">

            <h2>feel free to ask anything</h2>
            <div class="submit">
                <input type="text" name="name" id= "name" placeholder="Name">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="number" name="phone" id="phone" placeholder="phone no...">
                <textarea name="text" id="text" placeholder="Message"></textarea>
                
                <button type="submit">Send Message</button>
                <div class="message">
                 
                </div>
            </div>
            </form>
        </div>
        
        <div class="map">
            <h2>Where you can find us</h2>
            <p> <i class="fa fa-map-marker" aria-hidden="true"></i> P.O. Box 120-240 Nairobi, Kenya </p>
            
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.817053906536!2d37.651799573720524!3d0.04565126438195262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x178821e988fa7449%3A0xa4e2a8102ab1c3b7!2sJAYMAX%20SALON%20%26%20BARBER%20SHOP!5e0!3m2!1sen!2ske!4v1721214367230!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        </div>
        <div class="footer">
            <p>Copyrights @ 2024 Flitz.Co <br> Design:silasia</p>
            <p> <i class="fa fa-envelope-open" aria-hidden="true"></i> flitz@contact.ke <br>
                <i class="fa fa-phone" aria-hidden="true"></i> +254 712345678</p>
        </div>

   <script src="script.js"></script>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
     AOS.init({ 
        offset: 200,
        duration: 1000,
    });
   </script>
</body>
</html>