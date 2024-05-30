<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Rooms</title>
    <link rel="stylesheet" href="bookedrooms.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .booking-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 48%;
        }

        .booking-container:hover {
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        .booking-details {
            padding: 15px;
        }

        .booking-details div {
            margin-bottom: 10px;
        }

        .booking-actions {
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }

        .booking-actions form {
            margin: 0;
        }

        .booking-actions button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .booking-actions button.delete {
            background-color: #dc3545;
            color: #fff;
        }

        .booking-actions button:hover {
            opacity: 0.8;
        }

        button a {
            color: #fff;
            text-decoration: none;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            display: block;
            margin: 20px auto;
            text-align: center;
        }

        button a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmed Rooms</h1>
        <?php
        include 'connect.php';

        if (isset($_POST['delete_booking'])) {
            $booking_id = $_POST['booking_id'];
            $delete_query = "DELETE FROM approved_rooms WHERE id='$booking_id'";
            $delete_result = mysqli_query($conn, $delete_query);

            if ($delete_result) {
                echo "<script>alert('Booking deleted successfully.');</script>";
            } else {
                echo "<script>alert('Failed to delete the booking.');</script>";
            }
        }

        $query = "SELECT * FROM approved_rooms";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='row'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='booking-container'>";
                echo "<div class='booking-details'>";
                echo "<div><strong>Full Name:</strong> " . htmlspecialchars($row['FullName']) . "</div>";
                echo "<div><strong>Phone Number:</strong> " . htmlspecialchars($row['PhoneNumber']) . "</div>";
                echo "<div><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</div>";
                echo "<div><strong>Gender:</strong> " . htmlspecialchars($row['Gender']) . "</div>";
                echo "<div><strong>ID Number:</strong> " . htmlspecialchars($row['IdNumber']) . "</div>";
                echo "<div><strong>Room Type:</strong> " . htmlspecialchars($row['RoomType']) . "</div>";
                echo "<div><strong>Room Number:</strong> " . htmlspecialchars($row['RoomNumber']) . "</div>";
                echo "<div><strong>Number of Guests:</strong> " . htmlspecialchars($row['NumberofGuests']) . "</div>";
                echo "<div><strong>Check-in Date:</strong> " . htmlspecialchars($row['CheckinDate']) . "</div>";
                echo "<div><strong>Check-in Time:</strong> " . htmlspecialchars($row['CheckinTime']) . "</div>";
                echo "<div><strong>Checkout Date:</strong> " . htmlspecialchars($row['CheckoutDate']) . "</div>";
                echo "<div><strong>Checkout Time:</strong> " . htmlspecialchars($row['CheckoutTime']) . "</div>";
                echo "<div><strong>Payment Method:</strong> " . htmlspecialchars($row['PaymentMethod']) . "</div>";
                echo "<div><strong>Room Price:</strong> " . htmlspecialchars($row['RoomPrice']) . "</div>";
                echo "</div>";
                echo "<div class='booking-actions'>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='booking_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='delete' name='delete_booking'>Delete</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>No confirmed rooms found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
    <button><a style="text-decoration: none;" href="admin.php">Dashboard</a></button>
</body>
</html>
