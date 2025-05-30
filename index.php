<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Ticketing System</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Manrope:wght@200..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo"><h2>ETS</h2></div>
        <div class="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="user">
            <button class="user-btn"><a href="signup.php">Sign Up</a></button>
            <button class="user-btn" id="login-btn"><a href="login.php">Login</a></button>
        </div>
    </header>
    <div class="parnt">
        <div class="banner">
            <h3 class="text">Welcome to Event Ticketing System</h3>
            <div class="holder">
                <img src="./images/banner.webp" alt=" ">
            </div>
            
            <h3 class="text">Welcome to Event Ticketing System</h3>
        </div>
        <div class="event">
            <h2>Events</h2>
            <div class="container">
                <div class="grid">
                    <div class="img">
                        <img src="./images/event1.webp" alt="">
                    </div>
                    <div class="text-box">
                        <h3 id="eventName">Concert in the Park</h3>
                        <p>Date: April 15th, 2025</p>
                        <p>Artist: The Wildflowers</p>
                        <p id="eventPrice">Price: $30</p>
                        <button class="text-btn" id="addToCartButton">Add to Cart</button>

                    </div>
                </div>
                <div class="grid">
                    <div class="img">
                        <img src="./images/event2.webp" alt="">
                    </div>
                    <div class="text-box">
                        <h3 id="eventName">Jazz Night</h3>
                        <p>Date: April 17th, 2025</p>
                        <p>Artist: Georgy Band</p>
                        <p id="eventPrice">Price: $25</p>
                        <button class="text-btn" id="addToCartButton">Add to Cart</button>
                    </div>
                </div>
                <div class="grid">
                    <div class="img">
                        <img src="./images/event3.webp" alt="">
                    </div>
                    <div class="text-box">
                        <h3 id="eventName">Rock Fest</h3>
                        <p>Date: May 2nd, 2025</p>
                        <p>Artist: The Rage Boys</p>
                        <p id="eventPrice">Price: $35</p>
                        <button class="text-btn" id="addToCartButton">Add to Cart</button>
                    </div>
                </div>
                <div class="grid">
                    <div class="img">
                        <img src="./images/event1.webp" alt="">
                    </div>
                    <div class="text-box">
                        <h3 id="eventName">Indie Music Showcase</h3>
                        <p>Date: May 10th, 2025</p>
                        <p>Artist: The Dreamers</p>
                        <p id="eventPrice">Price: $35</p>
                        <button class="text-btn" id="addToCartButton">Add to Cart</button>
                    </div>
                </div>
                <div class="grid">
                    <div class="img">
                        <img src="./images/event2.webp" alt="">
                    </div>
                    <div class="text-box">
                        <h3 id="eventName">Classical Evening</h3>
                        <p>Date: May 18th, 2025</p>
                        <p>Artist: The NY Orchestra</p>
                        <p id="eventPrice">Price: $65</p>
                        <button class="text-btn" id="addToCartButton">Add to Cart</button>
                    </div>
                </div>
                <div class="grid">
                    <div class="img">
                        <img src="./images/event3.webp" alt="">
                    </div>
                    <div class="text-box">
                        <h3 id="eventName">Hip Hop Block Party</h3>
                        <p>Date: May 22nd, 2025</p>
                        <p>Artist: DJ Swift</p>
                        <p id="eventPrice">Price: $50</p>
                        <button class="text-btn" id="addToCartButton">Add to Cart</button>
                    </div>
                </div>
            
            </div>
            <div class="event-btn">
                <div class="box">
                    <button class="btn"><a href="/events.html">View More</a></button>
                </div>
            </div>
        </div>
        <div class="about">
            <h2>About</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium maiores ratione deserunt! Reiciendis fugit harum voluptatibus quibusdam eligendi accusamus quasi. Qui sapiente earum expedita sit, dignissimos perspiciatis impedit laboriosam adipisci unde harum voluptatibus omnis accusamus provident ea animi soluta eius magni blanditiis? Earum, incidunt magni. Ipsa consequatur vel voluptatibus quidem earum aut possimus voluptatem alias? Voluptatum aut distinctio temporibus illo?</p>
        </div>
        <div class="contact">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores perspiciatis sequi eligendi vero sint illum est, similique veritatis. Sint possimus nam voluptatibus reiciendis. Reiciendis, impedit accusantium et omnis architecto quis!</p>
        </div>
    </div>
    <footer>
        <p>&copy; Richyy @ 2025</p>
    </footer>
    <script src="/js/cart.js"></script>
</body>
</html>