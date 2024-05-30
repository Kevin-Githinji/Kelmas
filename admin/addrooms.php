<?php

include 'connect.php';

if(isset($_POST['add_room'])){
   $room_type = $_POST['room_type'];
   $room_number = $_POST['room_number'];
   $room_price = $_POST['room_price'];
   $room_image = $_FILES['room_image']['name'];
   $room_image_tmp_name = $_FILES['room_image']['tmp_name'];
   $room_image_folder = 'uploaded_img/'.$room_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `rooms`(room_type, room_number, room_price, room_image) VALUES('$room_type','$room_number','$room_price','$room_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($room_image_tmp_name, $room_image_folder);
      echo "<script type='text/javascript'>
         alert('Room Added Successfully.');
         window.location = 'addrooms.php';
         </script>";
   } else {
      echo "<script type='text/javascript'>
         alert('Room could not be added.');
         window.location = 'addrooms.php';
         </script>";
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `rooms` WHERE id = $delete_id") or die('query failed');
   if($delete_query){
      echo "<script type='text/javascript'>
         alert('Room Deleted Successfully.');
         window.location = 'addrooms.php';
         </script>";
   } else {
      echo "<script type='text/javascript'>
         alert('Room could not be deleted.');
         window.location = 'addrooms.php';
         </script>";
   }
}

if(isset($_POST['update_room'])){
   $update_room_id = $_POST['update_room_id'];
   $update_room_type = $_POST['update_room_type'];
   $update_room_number = $_POST['update_room_number'];
   $update_room_price = $_POST['update_room_price'];
   $update_room_image = $_FILES['update_room_image']['name'];
   $update_room_image_tmp_name = $_FILES['update_room_image']['tmp_name'];
   $update_room_image_folder = 'uploaded_img/'.$update_room_image;

   $update_query = mysqli_query($conn, "UPDATE `rooms` SET room_type = '$update_room_type', room_number = '$update_room_number', room_price = '$update_room_price', room_image = '$update_room_image' WHERE id = '$update_room_id'");

   if($update_query){
      move_uploaded_file($update_room_image_tmp_name, $update_room_image_folder);
      echo "<script type='text/javascript'>
         alert('Room updated successfully.');
         window.location = 'addrooms.php';
         </script>";
   } else {
      echo "<script type='text/javascript'>
         alert('Room could not be updated.');
         window.location = 'addrooms.php';
         </script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <link href="addrooms.css" rel="stylesheet">
      <title>Add and Manage Rooms</title>
   </head>

   <body>
      <section id="add_rooms" class="add_rooms">
         <h2>Add and Manage Rooms</h2>
        
         <form action="" method="post" enctype="multipart/form-data">
            <h3>ADD A NEW ROOM</h3>
            <div id="room-type-div" class="room-type-div">
               <label for="room_type">Room type:</label>
               <select id="room_type" name="room_type" required>
                  <option value="">Select the type of room</option>
                  <option value="One Bed">one Bed</option>
                  <option value="Two Beds">Two beds</option>
               </select>
            </div>

            <div id="room-number-div" class="room-number-div">
               <label for="room_number">Room number:</label>
               <select id="room_number"  name="room_number" required>
                  <option value=""><p style="font-weight: bold;">Select Room Number</p></option>
                  <?php
                     $select_products = mysqli_query($conn, "SELECT DISTINCT room_number FROM `rooms`");
                     if(mysqli_num_rows($select_products) > 0){
                           while($row = mysqli_fetch_assoc($select_products)){
                              $room_number = $row['room_number'];
                              echo "<option value='$room_number'>$room_number</option>";
                           }
                     } else {
                           echo "<option value=''>No room numbers found</option>";
                     }
                  ?>
                  <div id="rooms-with-two-beds" class="rooms-with-one-bed">
                     <option value=""><p style="font-weight: bold;">Rooms with one bed</p></option>
                     <option value="F2R1">F2R1</option>
                     <option value="F2R2">F2R2</option>
                     <option value="F2R3">F2R3</option>
                     <option value="F2R4">F2R4</option>
                     <option value="F2R5">F2R5</option>
                     <option value="F2R6">F2R6</option>
                     <option value="F2R7">F2R7</option>
                     <option value="F2R8">F2R8</option>
                     <option value="F2R9">F2R9</option>
                     <option value="F2R10">F2R10</option>
                     <option value="F2R11">F2R11</option>
                     <option value="F2R12">F2R12</option>
                  </div>
                  <div id="rooms-with-two-bed" class="rooms-with-two-beds">
                     <option value=""><p style="font-weight: bold;">Rooms with two beds</p></option>
                     <option value="F3R1">F3R1</option>
                     <option value="F3R2">F3R2</option>
                     <option value="F3R3">F3R3</option>
                     <option value="F3R4">F3R4</option>
                     <option value="F3R5">F3R5</option>
                     <option value="F3R6">F3R6</option>
                     <option value="F3R7">F3R7</option>
                     <option value="F3R8">F3R8</option>
                     <option value="F3R9">F3R9</option>
                     <option value="F3R10">F3R10</option>
                     <option value="F3R11">F3R11</option>
                     <option value="F3R12">F3R12</option>
                  </div>  
               </select>
            </div>

            <div class="room-price-div" id="room-price-div">
               <label for="room_price">Room Price:</label>
               <select id="room_price" name="room_price" required>
                  <option value="">Select a price range</option>
                  <option value="4500">KSH 4,500</option>
                  <option value="6500">KSH 6,500</option>
               </select>
            </div>

            <div id="room-image-div" class="room-image-div">
               <label for="room_image">Room Image:</label>
               <input type="file" id="room_image" name="room_image" required>
            </div>

            <div>
               
            </div>

            <div id="addrooms-buttons-div" class="addrooms-buttons-div">
               <button 
                  type="submit" 
                  class="add-rooms-button" 
                  id="add-rooms-button"
                  name="add_room"
                  >Add room
               </button>
               <button
                  id="back-to-dashboard"
                  onclick="goToDashboard()"
               >
                  <a 
                     style="text-decoration: none;" 
                     href="admin.php"
                     >Dashboard
                  </a>
               </button>
            </div>
         </form>
      </section>

      <section id="manage-rooms-div" class="manage-rooms-div">
         <div class="manage-room-introduction" id="manage-room-introduction">
            <h1>Manage Rooms</h1>
            
            <p>
               As the admin of the company, you have the authority and ability to edit the rooms. <br>
               For edditing and updating the rooms information, use the update link.<br>
               For deleting a room info, use delete function.
            </p>
            <h1>Recently added available rooms</h1>
         </div>

         <div class="room-container">
            <?php
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
                     <a href="addrooms.php?edit=<?php echo $row['id']; ?>" class="update-link"> <i class="fas fa-edit"></i> UPDATE </a>
                     <a href="addrooms.php?delete=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this room?');"> DELETE </a>
               </div>
            </div>
            <?php
               };
            }else{
               echo "<div class='empty'>No room added</div>";
            };
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
         <div>
            <form action="" method="post" enctype="multipart/form-data" >
               <img src="uploaded_img/<?php echo $fetch_edit['room_image']; ?>" height="200" alt="">
               <input type="hidden" name="update_room_id" value="<?php echo $fetch_edit['id']; ?>">
               <input type="text" class="box" required name="update_room_type" value="<?php echo $fetch_edit['room_type']; ?>">
               <input type="text" class="box" required name="update_room_number" value="<?php echo $fetch_edit['room_number']; ?>">
               <input type="number" min="0" class="box" required name="update_room_price" value="<?php echo $fetch_edit['room_price']; ?>">
               <input type="file" class="box" required name="update_room_image" accept="image/png, image/jpg, image/jpeg">
               <input type="submit" value="update room" name="update_room" class="btn">
               <input type="button" value="cancel" onClick="document.location.href='addrooms.php';" />
            </form>
         </div>   

         <?php
                  };
               };
               
            };
         ?>
      </section>
      <script src="script.js"></script>
   </body>
</html>