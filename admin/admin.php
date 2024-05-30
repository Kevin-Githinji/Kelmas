<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <style>
        #logout-btn {
            padding: 10px 20px;
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2> Admin</h2>
        </div>
        <ul class="nav">
            <li>
                <a href="admin.php">Dashboard</a>
            </li>
            <li>
                <a href="addrooms.php">Add Room</a>
            </li>
            <li>
                <a href="registeredclients.php">Manage Clients</a>
            </li>
            <li>
                <a href="roomsadded.php">Manage Rooms</a>
            </li>
            <li>
                <a href="bookedrooms.php">Manage booked rooms</a>
            </li>
            <li>
                <a href="confirmedrooms.php">Manage Confirmed rooms</a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="dashboard-header">
            <h1>Welcome Admin!</h1>  
            <button
                class="logout-button"
                id="logout-btn"
                onclick="window.location.href = '../index.php';"
                >Log Out
            </button>  
        </div>
        
        <div class="dashboard-stats">
            <div 
                class="stat-item" 
                id="total-number-of-rooms-added" 
                style="background-color: blue;"
                onclick="window.location.href = 'roomsadded.php';"
                >
                    <?php
                        require_once 'connect.php'; 

                        $sql = "SELECT COUNT(*) AS total_rooms FROM rooms";
                        $result = $conn->query($sql);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            $totalRooms = $row['total_rooms'];
                        } else {
                            $totalRooms = "Error fetching data";
                        }
                    ?>
                    <div class="stat-item">
                        <h2>Available Rooms</h2>
                        <h1><?php echo $totalRooms; ?></h1>
                    </div>
            </div>

            
            <div 
                class="stat-item" 
                id="total-confirmed-rooms" 
                style="background-color: green;" 
                onclick="window.location.href = 'confirmedrooms.php';"
                >
                    <?php
                        $sql = "SELECT COUNT(*) AS total_confirmed_rooms FROM approved_rooms";
                        $result = $conn->query($sql);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            $totalConfirmedRooms = $row['total_confirmed_rooms'];
                        } else {
                            $totalConfirmedRooms = "Error fetching data";
                        }
                    ?>
                    <div class="stat-item">
                        <h2>Booked Rooms (Confirmed)</h2>
                        <h1><?php echo $totalConfirmedRooms; ?></h1>
                    </div>
            </div>

            
            <div 
                class="stat-item" 
                id="total-booked-rooms" 
                style="background-color: red;"
                onclick="window.location.href = 'bookedrooms.php';"
                >
                    <?php
                        $sql = "SELECT COUNT(*) AS total_booked_rooms FROM records";
                        $result = $conn->query($sql);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            $totalBookedRooms = $row['total_booked_rooms'];
                        } else {
                            $totalBookedRooms = "Error fetching data";
                        }
                    ?>
                    <div class="stat-item">
                        <h2>Booked Rooms (Unconfirmed)</h2>
                        <h1><?php echo $totalBookedRooms; ?></h1>
                    </div>
            </div>


            <div 
                class="stat-item" 
                id="total-registered-clients" 
                style="background-color: orange;"
                onclick="window.location.href = 'registeredclients.php';"
                >
                    <?php
                        $sql = "SELECT COUNT(*) AS total_clients FROM signUp";
                        $result = $conn->query($sql);

                        if ($result) {
                            $row = $result->fetch_assoc();
                            $totalClients = $row['total_clients'];
                        } else {
                            $totalClients = "Error fetching data";
                        }
                        $conn->close();
                    ?>
                    <div class="stat-item">
                        <h2>Registered Clients</h2>
                        <h1><?php echo $totalClients; ?></h1>
                    </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
