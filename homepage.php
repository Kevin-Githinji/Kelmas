<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelmas Lodges and Accommodation-homepage</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <div  class="body-container">
        <div class="header" id="header">
            <div class="left-section" id="left-section">
                <header>
                    <button id="menu-button" class="menu-button">
                        <img 
                            src="icons/menuicon.png" 
                            alt="menu-icon" 
                            class="menu-icon"
                            id="icons"
                        >
                    </button>
                </header>
            </div>
            <div class="middle-section" id="middle-section"></div>
            <div class="right-section" id="right-section">
                <button id="menu-button" class="menu-button">
                    <img 
                        class="icon-images"
                        id="icons" 
                        src="icons/myaccount.jpg" 
                        alt="Account Icon"
                    >
                </button>
                <div id="dropdown-menu" class="dropdown-menu">
                    <a href="myaccount.php">My Account</a>
                    <a href="index.php" onclick="window.location.href = '../index.php';">Log Out</a>
                    <a href="bookinghistory.php">Booking History</a>
                </div>
            </div>
        </div>

        <div id="body" class="body">
            <div class="sidebar"  id="sidebar">
                <nav>
                    <li>
                        <a href="homepage.html">Home</a>
                
                    </li>
                    <li>
                        <a 
                        href="rooms.php"
                        onclick="goToRoomsPage()"
                        >Rooms Available</a>
                    </li>
                
                    <li>
                        <a 
                        href="aboutus.html"
                        onclick="goToAboutUsPage()"
                        >About Us</a>
                    </li>
                
                    <li>
                        <a 
                        href="contact.html"
                        onclick="goToContactsPage()"
                        >Contact</a>
                    </li>
                        
                    <li>
                        <a 
                        href="terms-and-conditions.html" 
                        onclick="goToTermsAndConditionsPage()"
                        >Terms & Conditions</a>     
                    </li>
        
                    <li>
                        <a 
                        href="food-and-drinks.html" 
                        onclick="goToFoodAndDrinksPage()"
                        >Food and Drinks</a>     
                    </li>
                       
                    <li>
                        <a 
                        href="myaccount.php"
                        onclick="goToMyAccountPage()"
                        >My Account</a>
                    </li>
        
                    <li>
                        <a 
                        href="index.php"
                        onclick="window.location.href = '../index.php';"
                        >Log Out</a>
                    </li>
                </nav>
            </div>
        
            <div class="right-side" id="right-side">
                <div id="original" class="original">
                    <div id="room-description">
                        <h2>Amenities</h2>
                        <p id="amenities">Linen, Slippers, Bathrobe, Work Desk, Towels, Electric kettle</p>
                        <h2>The rooms contains </h2>
                        <p>Flat-Screen TV, Mini Bar, Jacuzzi Bathtub, Free Toiletries, Safe Deposit Box, Hair Dryer</p>
                    </div>
            
                    <select 
                        id="choice" 
                        required
                        onchange="showContent()" 
                        style="font-size: 16px; margin-top: 6px; padding: 2px;"
                        >
                            <option value="">Select the type of room</option>
                            <option value="option1">Rooms with one bed</option>
                            <option value="option2">Rooms with two beds</option>
                    </select>
                </div>
                
                <div class="container" id="content-1" style="display: none;">
                    <h2>All Rooms With One Bed</h2>
                    <main>
                      <div class="video-card" id="F2R1">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic1.jpg" 
                            alt="image 1"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R1</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R2">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic2.png" 
                            alt="image 2"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R2</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R3">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic3.jpg" 
                            alt="image 3"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R3</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                href="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R4">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic4.jpg" 
                            alt="image 4"
                        >
                        <h2>Self contained room with one</h2>
                        <h2>room number: F2R4</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R5">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic5.jpg" 
                            alt="image 5"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R5</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R6">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic6.jpg" 
                            alt="image 6"
                        >
                        <h2>Self contained room with one</h2>
                        <h2>room number: F2R6</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R7">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic7.jpg" 
                            alt="image 7"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R7</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R8">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic8.jpg" 
                            alt="image 8"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R8</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R9">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic9.jpg" 
                            alt="image 9"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R9</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R10">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic10.jpg" 
                            alt="image 10"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R10</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R11">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic11.jpg" 
                            alt="image 11"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R11</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F2R12">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/pic12.jpg" 
                            alt="image 12"
                        >
                        <h2>Self contained room with one bed</h2>
                        <h2>room number: F2R12</h2>
                        <p>Amount: Ksh4500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
                    </main>
                </div>
            
                <div class="container " id="content-2" style="display: none;">
                    <h2>All Rooms With Two Beds</h2>
                    <main>
                      <div class="video-card" id="F3R1">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed1.jpg" 
                            alt="image 1"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R1</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R2">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed2.jpg" 
                            alt="image 2"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R2</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R3">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed3.jpg" 
                            alt="image 3"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R3</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R4">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed4.jpg" 
                            alt="image 4"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R4</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R5">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed5.jpg" 
                            alt="image 5"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R5</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R6">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed6.jpg" 
                            alt="image 6"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R6</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R7">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed7.jpg" 
                            alt="image 7"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R7</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>

                      <div class="video-card" id="F3R8">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed8.jpg" 
                            alt="image 8"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R8</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R9">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed9.jpg" 
                            alt="image 9"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R9</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R10">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed10.jpg" 
                            alt="image 10"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R10</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R11">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed11.jpeg" 
                            alt="image 11"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R11</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
            
                      <div class="video-card" id="F3R12">
                        <img 
                            class="image-room" 
                            id="image-room"
                            src="images/2bed12.jpg" 
                            alt="image 12"
                        >
                        <h2>Self contained room with two beds</h2>
                        <h2>room number: F3R12</h2>
                        <p>Amount: Ksh6500 per night</p>
                        <p id="booking-text">Continue to 
                            <input 
                                type="button" 
                                value="Booking"
                                onclick="goToRoomsPage()"
                                id="book-button"
                                class="book-button"
                            >
                        </p>
                      </div>
                    </main>
                </div>
            
                <div id="facility-info" class="facility-info">
                    <div class="div-list" id="div-list">
                        <h2>Why to choose our lodges</h2>
                        <h3>Always consider a stay in Kelmas Lodges and Accommodation we offer the following:</h3>
                        <li>1. Room cleaning and housekeeping services.</li>
                        <li>2. Complimentary breakfast or meal options.</li>
                        <li>3. 24/7 front desk and concierge services.</li>
                        <li>4. Free Wi-Fi or internet access for guests.</li>
                        <li>5. In-room amenities such as toiletries, towels, and linens.</li>
                        <li>6. Laundry and dry cleaning services.</li>
                        <li>7. On-site restaurant or dining options.</li>
                        <li>8. Fitness center or gym facilities.</li>
                        <li>9. Swimming pool or spa services.</li>
                        <li>10. Shuttle service or transportation assistance.</li>
                        <p>~Kelmas Lodges and Accommodation  caters to a perfect stay for all age groups with all the services and facilities needed for a perfect stay.</p>
                    </div>
    
                    <div id="our-description" class="our-description">
                        <div id="description-text" class="description-text">
                            <h2>Kelma's Lodges & Accommodation </h2>
                            <p>
                                Kelma's Lodges & Accommodation is located at the crossroads of
                                 Argwings Kodhek and Valley Road, opposite Nairobi Hospital, 
                                 in the charming Hurlingham neighbourhood. 
                                 The hotel is located in the heart of a bustling commercial neighbourhood
                                  dotted with landmarks like Kenyata International Convention Center, 
                                  Britam Tower, University of Nairobi, Kenyata Hospital among many other commercial establishments. 
                                  Just 3 km from the city centre, and conveniently located 3 km from Wilson Airport,
                                   our hotel is an optimal choice for delegates, business professionals, and tourists. 
                                   For guests exploring Nairobi, our location facilitates easy access to cultural and 
                                   natural wonders, including national museums and the unique safari experience of 
                                   Nairobi National Park. The 171 unique rooms, 12 flexible meeting spaces, 
                                   all day dining restaurants and leisure facilities like the Swimming Pool 
                                   and Gymnasium offer a comfortable stay enhanced by exceptional service and 
                                   African warmth.
                            </p>
                        </div>
                        <div id="description-img-div" class="description-img-div">
                            <a href="images/background.jpg"
                            target="_blank">
                                <img 
                                    src="images/background.jpg" 
                                    alt="our facility"
                                    
                                    id="description-img"
                                    class="description-img"
                                >
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     
    <footer>
        <p>&copy; 2024 Kelma's Lodges & Accommodation. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>    
</body>
</html>