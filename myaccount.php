<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'connect.php';

$username = $_SESSION['username'];
$query = "SELECT * FROM signUp WHERE userName='$username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_details'])) {
        $newEmail = $_POST['email'];
        $newPhoneNumber = $_POST['phoneNumber'];
        $newFirstName = $_POST['firstName'];
        $newLastName = $_POST['lastName'];
        $newPassword = $_POST['password'];
        
        $updateQuery = "UPDATE signUp SET email='$newEmail', phoneNumber='$newPhoneNumber', firstName='$newFirstName', lastName='$newLastName', password='$newPassword' WHERE userName='$username'";
        
        if ($conn->query($updateQuery) === TRUE) {
            $message = "Details updated successfully.";
            $query = "SELECT * FROM signUp WHERE userName='$username'";
            $result = $conn->query($query);
            $user = $result->fetch_assoc();
        } else {
            $message = "Error updating details: " . $conn->error;
        }
    }

    $phoneNumber = $user['phoneNumber'];
    $bookingQuery = "SELECT * FROM approved_rooms WHERE PhoneNumber='$phoneNumber' ORDER BY CheckinDate DESC";
    $bookingResult = $conn->query($bookingQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin: 10px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            margin: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        button a {
            color: #fff;
            text-decoration: none;
        }

        .message {
            color: green;
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        .booking-history {
            width: 80%;
            margin: 20px 0;
        }

        .booking-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 45%; 
            display: inline-block;
            vertical-align: top; 
            margin-right: 5%; 
            box-sizing: border-box; 
        }

        @media (max-width: 768px) {
            .booking-container {
                width: 100%;
                margin-right: 0;
            }
        }
    </style>
    <script>
        function toggleUpdateForm() {
            var form = document.getElementById('update-form');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['userName']); ?></h1>
    
    <table>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><?php echo htmlspecialchars($user['phoneNumber']); ?></td>
        </tr>
        <tr>
            <th>First Name</th>
            <td><?php echo htmlspecialchars($user['firstName']); ?></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><?php echo htmlspecialchars($user['lastName']); ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?php echo htmlspecialchars($user['userName']); ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?php echo htmlspecialchars($user['password']); ?></td>
        </tr>
        <tr>
            <th>Is Admin</th>
            <td><?php echo $user['is_admin'] ? 'Yes' : 'No'; ?></td>
        </tr>
    </table>

    <button onclick="toggleUpdateForm()">Edit</button>
    <div id="update-form" style="display: none;">
        <h2>Update Your Details</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo htmlspecialchars($user['phoneNumber']); ?>" required>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($user['firstName']); ?>" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($user['lastName']); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
            </div>
            <button type="submit" name="update_details">Update Account</button>
        </form>
    </div>
    <p class="message"><?php echo $message; ?></p>

    <form action="delete_account.php" method="post">
        <button type="submit" name="delete">Delete Account</button>
    </form>
    
    <button>
        <a href="homepage.php">Back to homepage</a>
    </button>

    <h2>Booking History</h2>
    <div class="booking-history">
        <?php
        if ($bookingResult->num_rows > 0) {
            while ($row = $bookingResult->fetch_assoc()) {
                echo "<div class='booking-container'>";
                echo "<strong>Full Name:</strong> " . htmlspecialchars($row['FullName']) . "<br>";
                echo "<strong>Phone Number:</strong> " . htmlspecialchars($row['PhoneNumber']) . "<br>";
                echo "<strong>Email:</strong> " . htmlspecialchars($row['email']) . "<br>";
                echo "<strong>Gender:</strong> " . htmlspecialchars($row['Gender']) . "<br>";
                echo "<strong>ID Number:</strong> " . htmlspecialchars($row['IdNumber']) . "<br>";
                echo "<strong>Room Type:</strong> " . htmlspecialchars($row['RoomType']) . "<br>";
                echo "<strong>Room Number:</strong> " . htmlspecialchars($row['RoomNumber']) . "<br>";
                echo "<strong>Number of Guests:</strong> " . htmlspecialchars($row['NumberofGuests']) . "<br>";
                echo "<strong>Check-in Date:</strong> " . htmlspecialchars($row['CheckinDate']) . "<br>";
                echo "<strong>Check-in Time:</strong> " . htmlspecialchars($row['CheckinTime']) . "<br>";
                echo "<strong>Checkout Date:</strong> " . htmlspecialchars($row['CheckoutDate']) . "<br>";
                echo "<strong>Checkout Time:</strong> " . htmlspecialchars($row['CheckoutTime']) . "<br>";
                echo "<strong>Payment Method:</strong> " . htmlspecialchars($row['PaymentMethod']) . "<br>";
                echo "<strong>Room Price:</strong> " . htmlspecialchars($row['RoomPrice']) . "<br>";
                echo "</div>";
            }
        } else {
            echo "<p>No booking history found.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
} else {
    echo "User not found.";
}
?>
