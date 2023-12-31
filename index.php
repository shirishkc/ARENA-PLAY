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
        <div style="color:#544c4a;">
        <?php
        $sql = "SELECT * FROM register WHERE SN = '" . $_SESSION['SN'] . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo "<h2> Welcome, " . $row["name"] ."</h2>";
        ?></div>
        <nav class="navigation">
            <a href="index.php">Home</a>
            <a class="title about" href="#about">About</a>
            <a href="booking/booking.php">Booking</a>
            <a class="title contact" href="#contact">Contact</a>
            <a href="logout.php">
                <ion-icon class="icon log" title="Logout" name="log-out-outline"></ion-icon>
            </a>
        </nav>
    </header>
    <div class="wrapper">
        <div class="container first" style="background: url(photo.jpg) repeat;
    background-size: cover;"></div>
        <div class="container second">
            <h2>Book Your Arena Today</h2>
            <p>Price: <br> On normal days- Rs 1000 <br>On Saturdays : Rs 1300</p>
            <div>
                <a href="booking/booking.php"><button class="btn book">Book Now</button></a>
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
        <form action="success/mailer/contactmailer.php" method="POST">
            <div class="contactus">
                <div class="wrapper">
                    <div class="container first">
                        <h3>Send a Message</h3>
                        <div class="information">
                            <div class="input-box">
                                <input type="text" placeholder="First Name" name="name" required>
                            </div>
                            <div class="input-box">
                                <input type="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="input-box">
                                <input type="integer" id="num" placeholder="Mobile Number" name="number" required>
                            </div>
                            <div class="input-box">
                                <textarea class="msg" placeholder="Write your message here....." name="message" required></textarea>
                            </div>
                            <button class="btn submit">Send</button>
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
                            <p><ion-icon name="mail"></ion-icon>bookarenaplay@gmail.com</p>
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
        VanillaTilt.init(document.querySelectorAll(".fac"), {
            max: 25,
            speed: 400
        });
        VanillaTilt.init(document.querySelector(".second"), {
            max: 25,
            speed: 400
        });
        VanillaTilt.init(document.querySelectorAll(".con"), {
            max: 25,
            speed: 400
        });
    </script>
</body>

</html>