<?php
include 'connect.php';

if (isset($_POST['action']) && isset($_POST['booking_id'])) {
    $action = $_POST['action'];
    $booking_id = $_POST['booking_id'];

    if ($action === 'approve') {
        $room_query = "SELECT * FROM records WHERE id = $booking_id";
        $room_result = mysqli_query($conn, $room_query);
        if ($room_result && mysqli_num_rows($room_result) > 0) {
            $room_row = mysqli_fetch_assoc($room_result);
            $room_number = $room_row['RoomNumber'];

            $move_query = "INSERT INTO approved_rooms SELECT * FROM records WHERE id = $booking_id";
            $result = mysqli_query($conn, $move_query);
            if ($result) {
                $delete_query = "DELETE FROM records WHERE id = $booking_id";
                $delete_result = mysqli_query($conn, $delete_query);
                if ($delete_result) {
                    $remove_room_query = "DELETE FROM rooms WHERE room_number = '$room_number'";
                    $remove_room_result = mysqli_query($conn, $remove_room_query);
                    if ($remove_room_result) {
                        $to = $room_row['email'];
                        $subject = "Booking Confirmation";
                        $message = "Dear " . $room_row['FullName'] . ",\n\nYour booking has been approved. Here are the details:\n\n";
                        $message .= "Room Type: " . $room_row['RoomType'] . "\n";
                        $message .= "Room Number: " . $room_row['RoomNumber'] . "\n";
                        $headers = "From: kyvogithe@gmail.com";

                        if (mail($to, $subject, $message, $headers)) {
                            echo "<script>alert('Booking approved and room removed from available rooms. Email sent to customer.');</script>";
                        } else {
                            echo "<script>alert('Error sending email to customer.');</script>";
                        }
                    } else {
                        echo "<script>alert('Error removing room from available rooms.');</script>";
                    }
                } else {
                    echo "<script>alert('Error deleting booking after approval.');</script>";
                }
            } else {
                echo "<script>alert('Error moving booking to confirmed rooms.');</script>";
            }
        } else {
            echo "<script>alert('Error fetching booking details.');</script>";
        }
    } elseif ($action === 'delete') {
        $delete_query = "DELETE FROM records WHERE id = $booking_id";
        $result = mysqli_query($conn, $delete_query);
        if ($result) {
            echo "<script>alert('Booking deleted successfully.');</script>";
        } else {
            echo "<script>alert('Error deleting booking.');</script>";
        }
    }
}

$query = "SELECT * FROM records";
$result = mysqli_query($conn, $query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="bookedrooms.css"> 
</head>
<body>
    <h1>Manage Bookings</h1>
    <div class="booking-list">
        <?php
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='booking-container'>";
                    echo "<div class='booking-details'>";
                        echo "<div><strong>Full Name:</strong> ".$row['FullName']."</div>";
                        echo "<div><strong>Phone Number:</strong> ".$row['PhoneNumber']."</div>";
                        echo "<div><strong>Email:</strong> ".$row['email']."</div>";
                        echo "<div><strong>Gender:</strong> ".$row['Gender']."</div>";
                        echo "<div><strong>ID Number:</strong> ".$row['IdNumber']."</div>";
                        echo "<div><strong>Room Type:</strong> ".$row['RoomType']."</div>";
                        echo "<div><strong>Room Number:</strong> ".$row['RoomNumber']."</div>";
                        echo "<div><strong>Number of Guests:</strong> ".$row['NumberofGuests']."</div>";
                        echo "<div><strong>Check-in Date:</strong> ".$row['CheckinDate']."</div>";
                        echo "<div><strong>Check-in Time:</strong> ".$row['CheckinTime']."</div>";
                        echo "<div><strong>Checkout Date:</strong> ".$row['CheckoutDate']."</div>";
                        echo "<div><strong>Checkout Time:</strong> ".$row['CheckoutTime']."</div>";
                        echo "<div><strong>Payment Method:</strong> ".$row['PaymentMethod']."</div>";
                        echo "<div><strong>Room Price:</strong> ".$row['RoomPrice']."</div>";
                    echo "</div>";
                    echo "<div class='booking-actions'>";
                        echo "<form method='post'>";
                            echo "<input type='hidden' name='booking_id' value='".$row['id']."'>";
                            echo "<button type='submit' name='action' value='approve' class='approve'>Approve</button>";
                            echo "<button type='submit' name='action' value='delete' class='delete'>Delete</button>";
                        echo "</form>";
                    echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No bookings found.";
        }

        mysqli_close($conn);
        ?>
    </div>
    <button><a style="text-decoration: none;" href="admin.php">Dashboard</a></button>
</body>
</html>
