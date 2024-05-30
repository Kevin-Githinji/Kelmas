<?php
require_once 'session_check.php';
checkLogin();
require_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelmas Lodges and Accommodation - Available Rooms Page</title>
    <link rel="stylesheet" href="rooms.css">
</head>
<body style="display:flex; flex-direction:column;">
    <div>
        <h1>AVAILABLE ROOMS</h1>
        <section class="room-container">
            <?php
            require_once 'connect.php';
            $select_products = mysqli_query($conn, "SELECT * FROM `rooms`");
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="room-item">
                <div class="room-image">
                    <img src="admin/uploaded_img/<?php echo $fetch_product['room_image']; ?>" alt="Room Image">
                </div>
                <div class="room-details" id="room-details">
                    <div class="room-type" id="room-type">
                        <h4>Room Type: <?php echo $fetch_product['room_type']; ?></h4>
                    </div>
                    <div class="room-number" id="room-number">
                        <h4>Room Number: <?php echo $fetch_product['room_number']; ?></h4>
                    </div>
                    <div class="room-price" id="room-price">
                        <h4>Room Price: <span class="price">Ksh <?php echo $fetch_product['room_price']; ?></span></h4>
                    </div>
                </div>
                <div class="room-actions" id="room-actions">
                    <form class="booking-container" action="booking.php" method="post">
                        <input type="hidden" name="room_image" value="<?php echo $fetch_product['room_image']; ?>">
                        <input type="hidden" name="room_type" value="<?php echo $fetch_product['room_type']; ?>">
                        <input type="hidden" name="room_number" value="<?php echo $fetch_product['room_number']; ?>">
                        <input type="hidden" name="room_price" value="<?php echo $fetch_product['room_price']; ?>">
                        <button style="margin-bottom: 10px;" type="submit" class="btn" name="book">Book Now</button>
                    </form>
                </div>
            </div>
            <?php
                }
                
            }
            else {
                ?>
                <h2>No rooms available at the moment. Check after some time or call us for more information. Thank you.</h2>
            <?php
                }
            ?>
        </section>
    </div>
</body>
</html>
