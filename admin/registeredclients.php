<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Clients</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .clients-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .client-card {
            border: solid 1px #ddd;
            border-radius: 5px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .client-card div {
            margin-bottom: 10px;
        }
        .client-card form {
            margin: 0;
        }
        .client-card button, button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .client-card button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registered Clients</h1>
        <button  onclick="window.location.href = 'admin.php';">
            Back to dashboard
        </button>
        <div class="clients-grid">
        <?php
        session_start();
        require_once 'connect.php';

        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
            $userId = intval($_POST['delete_id']);
            $query = "DELETE FROM signUp WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $userId);

            if ($stmt->execute()) {
                echo "<script>alert('User deleted successfully.');</script>";
            } else {
                echo "<script>alert('Error deleting user.');</script>";
            }

            $stmt->close();
        }

        $sql = "SELECT * FROM signUp ORDER BY id ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="client-card">
                    <div class="email" id="email">
                        <strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?>
                    </div>
                    <div class="phone-number" id="phone-number">
                        <strong>Phone Number:</strong> <?php echo htmlspecialchars($row['phoneNumber']); ?>
                    </div>
                    <div class="first-name" id="first-name">
                        <strong>First Name:</strong> <?php echo htmlspecialchars($row['firstName']); ?>
                    </div>
                    <div class="last-name" id="last-name">
                        <strong>Last Name:</strong> <?php echo htmlspecialchars($row['lastName']); ?>
                    </div>
                    <div class="user-name" id="user-name">
                        <strong>User Name:</strong> <?php echo htmlspecialchars($row['userName']); ?>
                    </div>
                    <div class="is_admin" id="is_admin">
                        <strong>Is Admin:</strong> <?php echo ($row["is_admin"] ? "Yes" : "No"); ?>
                    </div>
                    <div>
                        <form method="POST" action="">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>No results found.</p>";
        }

        $conn->close();
        ?>
        </div>
        
    </div>
</body>
</html>
