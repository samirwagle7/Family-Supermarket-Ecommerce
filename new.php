<body>
    <!-- header section -->
    <div class="header">
        <a href="index.html"><img src="./img/logo.png" class="logo" alt="logo"></a>
    <nav>
        <ul id="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="about.html">About</a></li>
            <li><a class="active" href="contact.html">Contact</a></li>
            <li id="shop-cart"><a href="./cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <li><a href="login.html" class="login-btn"><i class="fa-solid fa-user"></i></a></li>
            <li><a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
        </ul>
    </nav>

    <div id="mobile">
        <a href="cart.hltml"><i class="fa-solid fa-cart-shopping"></i></a>
        <i id="bar" class="fa-solid fa-bars"></i>
    </div>
</div>

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
        <form action="/action_page.php">
            <span>LEAVE A MESSAGE</span>
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


    <script src="script.js"></script>
</body>