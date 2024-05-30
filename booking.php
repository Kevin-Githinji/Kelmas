<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['booknow'])) {
    include 'connect.php';

    $user_id = $_SESSION['user_id'];
    $user_query = "SELECT * FROM signUp WHERE id='$user_id'";
    $user_result = $conn->query($user_query);

    if ($user_result->num_rows > 0) {
        $user = $user_result->fetch_assoc();
        $fullName = $user['firstName'] . " " . $user['lastName'];
        $phoneNumber = $user['phoneNumber'];
        $email = $user['email'];
    } else {
        echo "<script>
            alert('User details not found.');
            window.location.href='homepage.php';
          </script>";
        exit();
    }

    $Gender = $_POST['Gender'];
    $IdNumber = $_POST['IdNumber'];
    $RoomType = $_POST['RoomType'];
    $RoomNumber = $_POST['RoomNumber'];
    $NumberofGuests = $_POST['NumberofGuests'];
    $CheckinDate = $_POST['CheckinDate'];
    $CheckinTime = $_POST['CheckinTime'];
    $CheckoutDate = $_POST['CheckoutDate'];
    $CheckoutTime = $_POST['CheckoutTime'];
    $PaymentMethod = $_POST['PaymentMethod'];
    $RoomPrice = $_POST['RoomPrice'];

    $insert_query = mysqli_query($conn, "INSERT INTO `records` (FullName, PhoneNumber, email, Gender, IdNumber, RoomType, RoomNumber, NumberofGuests, CheckinDate, CheckinTime, CheckoutDate, CheckoutTime, PaymentMethod, RoomPrice) 
VALUES ('$fullName', '$phoneNumber', '$email', '$Gender', '$IdNumber', '$RoomType', '$RoomNumber', '$NumberofGuests', '$CheckinDate', '$CheckinTime', '$CheckoutDate', '$CheckoutTime', '$PaymentMethod', '$RoomPrice')") or die('query failed');

    if ($insert_query) {
        echo "<script>alert('Room booked successfully.'); window.location.href='homepage.php';</script>";
    } else {
        echo "<script>alert('Room could not be booked. Try again.') ;window.location.href='booking.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="booking.css">
</head>
<body>
    <div id="container" class="container">
        <div id="leftside" class="left-side">
            <div id="room-booking-info">
                <?php
                if (isset($_POST['book'])) {
                    $room_image = $_POST['room_image'];
                    $room_type = $_POST['room_type'];
                    $room_number = $_POST['room_number'];
                    $room_price = $_POST['room_price'];

                    echo "<h2>Booking Details</h2>";
                    echo "<div class='room-details'>";
                    echo "<img src='admin/uploaded_img/$room_image' alt='Room Image'>";
                    echo "<p>Room Type: $room_type</p>";
                    echo "<p>Room Number: $room_number</p>";
                    echo "<p>Room Price per Night: Ksh $room_price</p>";
                    echo "</div>";
                } else {
                    header("Location: homepage.php");
                    exit();
                }
                ?>
            </div>
            <div id="extra-info" class="extra-info">
                <p>
                    Spaciously designed, our deluxe suites offer a comfortable 
                    escape with a regal four-poster king-size bed, 
                    a sophisticated dining area, and a lounge space with a TV. 
                    The private bathroom offers opulence with a double sink, 
                    a sumptuous Jacuzzi bathtub, and a separate shower, 
                    providing a lavish retreat for your comfort and relaxation.
                </p>  
                <h3>For rooms with one bed, a stay for a whole day (24hrs) is Ksh 4,500. <br>
                    For rooms with two beds, a stay for a whole day (24hrs) is Ksh 6,500.
                </h3>
                <h3>
                    Currently, we only accept cash payment. 
                    Book your Stay online and pay your dues in the reception.
                </h3>
            </div> 
        </div>
    
        <div class="right-side" id="right-side">  
            <form id="booking-form" class="booking-form" action="" method="post">
                <div id="customer-details" class="input-group customer-details">
                    <h2>Customer details</h2>
                    <div id="name-container" class="name-container">
                        <label for="full-name">Full Name:</label>
                        <input 
                            type="text" 
                            id="full-name" 
                            name="FullName" 
                            placeholder="Enter your full name as in your ID/Passport" 
                            required
                            value="<?php echo htmlspecialchars($fullName); ?>"
                            readonly
                        >
                    </div>
    
                    <div id="phone-number-container" class="input-group">
                        <label for="phone-number">Phone Number:</label>
                        <input 
                            type="tel" 
                            id="phone-number" 
                            name="PhoneNumber" 
                            placeholder="Enter your phone number" 
                            required
                            value="<?php echo htmlspecialchars($phoneNumber); ?>"
                            readonly
                        >
                    </div>

                    <div id="email-container" class="email-container">
                        <label for="email">Email:</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="Enter a valid email" 
                            required
                            value="<?php echo htmlspecialchars($emai); ?>"
                            readonly
                        >
                    </div>
    
                    <div id="gender-container" class="input-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="Gender" required>
                            <option value="">Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
            
                    <div id="id-container" class="input-group">
                        <label for="id-type">ID Type:</label>
                        <select required id="id-type" name="IdType">
                            <option value="">Select either Id or Passport</option>
                            <option value="passport">Passport</option>
                            <option value="identity-card">Identity Card (Kenya)</option>
                        </select>
                    </div>
                    
                    <div id="id-number-container" class="input-group">
                        <label for="id-number">ID Number:</label>
                        <input 
                            type="text" 
                            id="id-number" 
                            name="IdNumber" 
                            maxlength="8" 
                            pattern="[A-Za-z0-9]{8}" 
                            title="ID number must be 8 characters long and alphanumeric"
                            placeholder="Enter valid ID/Passport number"
                            required
                        >
                    </div>
                </div>

                <div class="customer-room-info" id="customer-room-info">
                    <h2>Room Details</h2>
                    <div id="room-number-container" class="input-group">
                        <label for="choice">Room type:</label>
                        <input type="text" id="room-type" name="RoomType" value="<?php echo $room_type; ?>" readonly>
                        <br>

                        <label for="room-number">Room Number:</label>
                        <input type="text" id="room-number" name="RoomNumber" value="<?php echo $room_number; ?>" readonly>
                    </div>

                    <div class="input-group" id="guests-container">
                        <label for="number-of-guests">Number of Guests:</label>
                        <select id="number-of-guests" name="NumberofGuests" required>
                            <option value="">Select number of guests</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
               </div>

               <div id="duration-container" class="duration-container">
                    <h2>Check-in</h2>
                    <label for="checkin-date">Check-in Date:</label>
                    <input 
                        type="date" 
                        id="checkin-date" 
                        class="checkin-date"
                        name="CheckinDate"
                        onchange="calculateDaysAndNights()"
                        required
                    >
                    <br>

                    <label for="checkin-time">Check-in Time:</label>
                    <input 
                        type="time" 
                        id="checkin-time"
                        class="checkin-time" 
                        name="CheckinTime"
                        required
                    >
                    <br>
                    
                    <h2>Check-out</h2>
                    <label for="checkout-date">Check-out Date:</label>
                    <input 
                        type="date" 
                        id="checkout-date" 
                        class="checkout-date"
                        name="CheckoutDate"
                        onchange="calculateDaysAndNights()"
                        required
                    >
                    <br>

                    <label for="checkout-time">Check-out Time:</label>
                    <input 
                        type="time" 
                        id="checkout-time" 
                        class="checkout-time"
                        name="CheckoutTime"
                        onchange="calculateDaysAndNights()"
                        required
                    >
                    <br>
                   
                    <h2>Days and nights</h2>
                    <label for="number-of-nights">Number of Nights:</label>
                    <input 
                        type="number" 
                        id="numberOfNights"
                        class="numberOfNights"
                        name="NumberOfNights" 
                        min="1" 
                        required
                        placeholder="Enter number of nights of your stay"
                        readonly
                    >
                    <br>

                    <label for="number-of-days">Number of Days:</label>
                    <input 
                        type="number" 
                        id="numberOfDays" 
                        class="numberOfDays"
                        name="NumberOfDays" 
                        min="1" 
                        placeholder="Enter number of days of your stay"
                        required
                        readonly
                    >
                </div>
    
                <div id="finalizing" class="finalizing">
                    <h2>Payment method and prices</h2>
                    <div id="mode-of-payment-container" class="input-group mode-of-payment">
                        <label for="payment-method">Payment Method:</label>
                        <select required id="payment-method" name="PaymentMethod">
                            <option value="">Select Payment Method</option>
                            <option value="cash">Cash</option>
                        </select>
                    </div>

                    <div id="price" class="price">
                        <label for="price">Total Price:</label>
                        <input 
                            id="totalCost"
                            class="price"
                            name="RoomPrice"
                            type="number"
                            required
                            readonly
                        >
                        <button 
                            class="totalCostBtn" 
                            id="totalCostBtn"
                            type="button"
                            onclick="calculateTotalCost()"
                        >
                            Calculate Total Cost
                        </button>

                    </div>
                </div>
    
                <div class="buttons" id="buttons">
                    <button 
                        id="backbutton"
                        class="backbutton"
                        onclick="goToHomePage()"
                        type="button"
                      ><a href="homepage.php"></a>Back to Home Page
                    </button>

                    <button 
                        class="booking-button"
                        type="submit"
                        value="submit booking"
                        name="booknow"
                      >Proceed Booking
                    </button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Kelma's Lodges & Accommodation. All rights reserved.</p>
    </footer>

    <script>
        function calculateDaysAndNights() {
            const checkinDate = new Date(document.getElementById('checkin-date').value);
            const checkoutDate = new Date(document.getElementById('checkout-date').value);

            if (checkinDate && checkoutDate) {
                const timeDiff = Math.abs(checkoutDate - checkinDate);
                const dayCount = timeDiff / (1000 * 3600 * 24);

                document.getElementById('numberOfNights').value = Math.floor(dayCount);
                document.getElementById('numberOfDays').value = Math.ceil(dayCount) + 1;
            } else {
                document.getElementById('numberOfNights').value = '';
                document.getElementById('numberOfDays').value = '';
            }
        }

        function calculateTotalCost() {
            const pricePerNight = <?php echo $room_price; ?>;
            const nights = document.getElementById('numberOfNights').value;

            if (pricePerNight && nights) {
                const totalCost = pricePerNight * nights;
                document.getElementById('totalCost').value = totalCost;
            } else {
                document.getElementById('totalCost').value = '';
            }
        }

        document.getElementById('totalCostBtn').addEventListener('click', calculateTotalCost);
    </script>
</body>
</html>