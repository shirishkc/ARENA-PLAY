<?php
  session_start();
  include("include/dbcon.php");
  if (!isset($_SESSION['SN'])) {
    header("Location: login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="Artboard 2.png"> 
    <title>Arena Play | Book your arena now</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img class="logo" src="Artboard 2_2.png" alt="#">
        <nav class="navigation">
            <a href="index.php">Home</a>
            <a href="#about">About</a>
            <a href="booking.php">Booking</a>
            <a href="#contact">Contact</a>
            <a href="login.php">
                <svg class="person" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
              </a>
        </nav>
    </header>
    <div class="wrapper">
        <div class="container first"></div>
        <div class="container second">
            <h2>Book Your Arena Today</h2>
            <div>
               <a href="booking.php"><button  class="btn book">Book Now</button></a> 
            </div>
        </div>
    </div>
<div class="service">
<h1>What's included?</h1>
    <div class="facility">
        <div class="fac wifi">
            <div class="content"><ion-icon class="ion" name="wifi-outline"></ion-icon>
        <div>
            <h3>Free Wifi</h3>
        </div>
        </div>
        </div>
        <div class="fac park">
        <div class="content"><ion-icon class="ion" name="car-outline"></ion-icon>
        <div>
            <h3>Free Parking</h3>
        </div>
    </div>
    </div>
        <div class="fac res">
        <div class="content"><ion-icon class="ion" name="fast-food-outline"></ion-icon>
        <div>
            <h3>Restaurant</h3>
        </div>
    </div>
    </div>
        <div class="fac med">
        <div class="content"><ion-icon class="ion" name="medkit-outline"></ion-icon>
          <div>
        <h3>First Aid Kit</h3>
        </div>    
    </div>
    </div>
        <div class="fac gym">
        <div class="content"><ion-icon class="ion" name="barbell-outline"></ion-icon>
           <div>
        <h3>Gym</h3>
        </div>
    </div>
    </div>
</div>
    </div>
    <div id="about" class="about">
        <h1>About</h1>
        <div class="about-main">
        <img src="abt.jpg" class="abt">
        <div class="container third">
            <p><b>Ranipauwa Sports Center Pvt. Ltd. is a private sports center that was established in the year 2072 (2015 AD) in Pokhara City, Nepal. The primary objective of this sports center is to provide health club facilities and promote athletics among the people of Pokhara and the surrounding areas.
                The sports center is equipped with modern fitness equipment and facilities, such as a gymnasium, zumba, futsal, a sauna, crossfit, and a restaurant. These facilities are designed to provide an optimal fitness experience for the members of the center.
                Apart from health club facilities, the Ranipauwa Sports Center also aims to promote athletics in the region by organizing various sports events and competitions. The center provides a platform for athletes to showcase their talents and compete against each other, thereby contributing to the development of the local sports community.
                Ranipauwa Sports Center Pvt. Ltd. is a significant contributor to the fitness and athletic culture of Pokhara City, Nepal. Its state-of-the-art facilities and commitment to promoting athletics have made it a popular destination for fitness enthusiasts and sports lovers in the region.</b></p>
            </div>
        </div>
    </div>
    <div class="contact" id="contact">
        <h1>Contact</h1>
        <div class="contactus">
            <div class="wrapper">
                <div class="container first">
                    <h3>Send a Message</h3>
                    <div class="information">
                        <div class="input-box">
                            <input type="text" placeholder="First Name" name="name" required>
                            <input type="text" placeholder="Last Name" name="name" required>
                        </div>
                        <div class="input-box">
                            <input type="email" placeholder="Email" name="email" required>
                            <input type="number" maxlength="10" id="num" placeholder="Mobile Number" name="number" required>
                        </div>
                        <div class="input-box">
                            <textarea class="msg" placeholder="Write your message here....."  name="message" required></textarea>
                        </div>
                        <button  class="btn submit">Submit</button>
                    </div>
                </div>
                <div class="container con">
                    <h3>Contact Info</h3>
                    <div>
                     <p><ion-icon name="location"></ion-icon> रानीपौवा मार्ग 11, Pokhara 33700</p>
                    </div>
                    <div>
                        <p><ion-icon name="call"></ion-icon>061580820</p>
                       </div>
                       <div>
                        <p><ion-icon name="mail"></ion-icon>lorem@gmail.com</p>
                       </div>
                <div class="condown"></div>
                </div>
            </div>
        </div>
    </div>
    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.0695711564754!2d83.98416397536604!3d28.235567975883885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39959442efaa08f5%3A0x60ebb8e2956b1684!2sTutisal%20Arena%20(P)%20Ltd.!5e0!3m2!1sen!2snp!4v1683958858421!5m2!1sen!2snp" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
 </div>
    </div>
    <script src="script.js"></script>
    <script type="text/javascript" src="vanilla-tilt.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll(".fac"),{
            max: 25,
            speed: 400
        });
        VanillaTilt.init(document.querySelector(".second"),{
            max: 25,
            speed: 400
        });
        VanillaTilt.init(document.querySelectorAll(".con"),{
            max: 25,
            speed: 400
        });
    </script>
    <form>
        <input type="button" value="Logout" onclick="window.location.href='logout.php'" />
      </form>
</body>
</html>