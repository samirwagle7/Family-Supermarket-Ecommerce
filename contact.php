<?php 
    $activePage = 'contact';
    include "header.php";
?>



    <!-- contact details section  -->
    <section id="contact-details" class="section-p1 section-m1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit or Contact Us Today. For the best balue products and best customer service</h2>
            <h3>Head Office</h3>

            <div class="info">
                <ul>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <p>Chandragiri - 2, Kathmandu, Nepal, 44600</p>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <p>7733samir@gmail.com</p>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <p>9863948660</p>
                    <li>
                        <i class="fa-solid fa-clock"></i>
                        <p>Sun - Fri, 10:00 - 17:00</p>
                    </li>
                </ul>
                
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.9765118678897!2d85.30632157534689!3d27.718011476176414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18e35c6e7a0d%3A0xd2f1ad97505448f5!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1688670766208!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- form section -->
    <section id="form-section" class="section-p1 section-m1">
        <!-- <form action="/action_page.php">
            <span>Contact Us</span>
            <H2>We love to hear your response <span>:)</span></H2>
            <div>
                <input type="text" id="name" placeholder="Your Name" required>
            </div>
            <div>
                <input type="text" id="email" placeholder="Email" required>
            </div>
            <div>
                <input type="text" id="subject" placeholder="Subject" required>
            </div>
            <div>
                <textarea id="message" cols="30"  placeholder="Your Message"></textarea>
            </div>
            <button>Submit</button>
        </form> -->
        <?php
 // Start or resume the session

include 'dbconnect.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Sanitize inputs (you can use other validation techniques as well)
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $number = mysqli_real_escape_string($conn, $number);
    $subject = mysqli_real_escape_string($conn, $subject);
    $message = mysqli_real_escape_string($conn, $message);

    // Insert data into the database
    $sql = "INSERT INTO contact_tbl (name, email, number, subject, message) VALUES ('$name', '$email', '$number', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        if (!isset($_SESSION['message_displayed'])) {
            echo "Message sent successfully!";
            $_SESSION['message_displayed'] = true; // Set session variable to prevent further display
        }
    } else {
        echo "Error: Message didn't send";
    }

    // Close the database connection
    $conn->close();
}
?>


        <form action="#" method="post">
            <div>
                <!-- <label for="name">Name</label> -->
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>

            <div>
                <!-- <label for="email">Email</label> -->
                <input type="email" id="email" name="email" placeholder="Your Email" required>
            </div>

            <div>
                <!-- <label for="email">Phone</label> -->
                <input type="text" id="phone" name="number" placeholder="Your Number" required>
            </div>

            <div>
                <!-- <label for="subject">Subject</label> -->
                <input type="text" id="subject" name="subject" placeholder="Subject" required>
            </div>

            <div>
                <!-- <label for="message">Message</label> -->
                <textarea id="message" name="message" rows="4" cols="30"  placeholder="Your Message" required></textarea>
            </div>

            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
        
        <div class="person">
            <div class="emp-image">
                <img src="./img/people/upw.jpg" alt="ceo">
                <div class="text-container">
                    <h4>Samir Wagle</h4>
                    <ul>
                        <li>Chief Executive Officer</li>
                        <li>Phone: 9863948660</li>
                        <li>Email: 7733samir@gmail.com</li>
                    </ul>
                </div>
            </div>
        
            <div class="emp-image">
                <img src="./img/people/salmankhan.jpg" alt="ceo">
                <div class="text-container">
                    <h4>Salman Khan</h4>
                    <ul>
                        <li>Chief Operating Officer</li>
                        <li>Phone: 9863948660</li>
                        <li>Email: 7733samir@gmail.com</li>
                    </ul>
                </div>
            </div>

            <div class="emp-image">
                <img src="./img/people/sharukhkhan.jpg" alt="ceo">
                <div class="text-container">
                    <h4>Sharukh Khan</h4>
                    <ul>
                        <li>Chief Marketing Officer</li>
                        <li>Phone: 9863948660</li>
                        <li>Email: 7733samir@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- footer section -->
    <footer class="section-p1">
        <div class="col">
            <a href="index.php"><img class="logo" src="./img/logo.png" alt="logo"></a> 
            <h4>Contact</h4>
            <p> <strong>Address:</strong> Chandragiri - 2, Kathmandu, Nepal, 44600 </p>
            <p> <strong>Phone:</strong> 9863948660</p>
            <p> <strong>Hours:</strong> 10:00 - 17:00, Sun - Fri</p>
            <div class="follow">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="about.php">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="termsCondtions.php">Terms & Conditions</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="login.php">Sign In</a>
            <a href="cart.php">View cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="apple_store">
                <img src="img/pay/play.jpg" alt="googlePlay_store">

            </div>
            <p>Secured Payment Gateways</p>
            <img src="img/pay/pay.png" alt="payment methods">
        </div>

        <div class="copyright">
            <p>Copyright © 2023, Samir Wagle - All Rights Reserved</p>
        </div>
    </footer>


    <script src="script.js"></script>
    <?php include "footer.php" ?>