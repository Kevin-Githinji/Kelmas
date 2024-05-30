<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms Added</title>
    <link href="addrooms.css" rel="stylesheet">
</head>
<body>
    <section id="manage-rooms-div" class="manage-rooms-div">
        <div class="manage-room-introduction" id="manage-room-introduction">
            <h1>Manage Rooms</h1>
            <p>
                As the admin of the company, you have the authority and ability to edit the rooms. <br>
                For editing and updating the rooms information, use the update button.<br>
                For deleting a room info, use delete button.
            </p>
            <button id="back-to-dashboard" onclick="windows.location.href='admin.php';">
                <a href="admin.php">Dashboard</a>
            </button>
            <h1>Recently added available rooms</h1>
        </div>

        <div class="room-container">
            <?php
            include 'connect.php';
            $select_products = mysqli_query($conn, "SELECT * FROM `rooms`");
            if(mysqli_num_rows($select_products) > 0){
                while($row = mysqli_fetch_assoc($select_products)){
            ?>
            <div class="room-item">
                <div class="room-image">
                    <img src="uploaded_img/<?php echo $row['room_image']; ?>" alt="">
                </div>

                <div class="room-details" id="room-details">
                    <div class="room-type" id="room-type">
                        <?php echo $row['room_type']; ?>
                    </div>
                    <div class="room-number" id="room-number">
                        <?php echo $row['room_number']; ?>
                    </div>
                    <div class="room-price" id="room-price">
                        Ksh <?php echo $row['room_price']; ?>
                    </div>
                </div>

                <div class="room-actions" id="room-actions">
                    <a href="addrooms.php?edit=<?php echo $row['id']; ?>" class="update-link">UPDATE</a>
                    <a href="addrooms.php?delete=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this room?');">DELETE</a>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<div class='empty'>No available room. Kindly Update the available ones</div>";
            }
            ?>
        </div>
    </section>

    <section>
        <?php
        if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `rooms` WHERE id = $edit_id");
            if(mysqli_num_rows($edit_query) > 0){
                while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
        <div class="edit-form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <img src="uploaded_img/<?php echo $fetch_edit['room_image']; ?>" height="200" alt="">
                <input type="hidden" name="update_room_id" value="<?php echo $fetch_edit['id']; ?>">
                <input type="text" class="box" required name="update_room_type" value="<?php echo $fetch_edit['room_type']; ?>">
                <input type="text" class="box" required name="update_room_number" value="<?php echo $fetch_edit['room_number']; ?>">
                <input type="number" min="0" class="box" required name="update_room_price" value="<?php echo $fetch_edit['room_price']; ?>">
                <input type="file" class="box" required name="update_room_image" accept="image/png, image/jpg, image/jpeg">
                <input type="submit" value="Update Room" name="update_room" class="btn">
                <input type="button" value="Cancel" onClick="document.location.href='addrooms.php';" />
            </form>
        </div>
        <?php
                }
            }
        }
        ?>
    </section>
    <script src="script.js"></script>
</body>
</html>
