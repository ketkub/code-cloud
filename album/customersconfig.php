<?php

@include 'config.php';


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `users` WHERE Id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:customersconfig.php');
      $message[] = 'Customer has been deleted';
   }else{
      header('location:customersconfig.php');
      $message[] = 'ustomer could not be deleted';
   };
};

if(isset($_POST['update_customer'])){
   // ตรวจสอบว่ามีการส่งข้อมูลการอัปเดตลูกค้าหรือไม่
   if(isset($_POST['update_c_id']) && isset($_POST['update_c_name']) && isset($_POST['update_c_email']) && isset($_POST['update_c_password'])){
      $update_c_id = $_POST['update_c_id'];
      $update_c_name = $_POST['update_c_name'];
      $update_c_email = $_POST['update_c_email'];
      $update_c_password = $_POST['update_c_password'];
      $update_query = mysqli_query($conn, "UPDATE `users` SET Username = '$update_c_name', Email = '$update_c_email', Password = '$update_c_password' WHERE Id = '$update_c_id'");

      if($update_query){
         $message[] = 'Customer updated successfully';
      }else{
         $message[] = 'Customer could not be updated';
      }
   }
}
 


if(isset($_GET['delete'])){
   // ตรวจสอบว่ามีการส่งข้อมูลการลบสินค้าหรือไม่
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `users` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location: customersconfig.php'); // ใส่รหัสสถานะ HTTP 302 เพื่อเปลี่ยนเส้นทางไปยังหน้าหลักของแอพพลิเคชัน
      $message[] = 'product has been deleted';
      exit(); // หยุดการทำงานหลังจากการเปลี่ยนเส้นทางเพื่อป้องกันการดำเนินการเพิ่มเติม
   } else {
      $message[] = 'product could not be deleted';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header_admin.php'; ?>

<div class="container">

<section>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>Username</th>
         <th>Email</th>
         <th>Password</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `users` WHERE user_level = 1");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><?php echo $row['Username']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Password']; ?></td>
            <td>
               <a href="customersconfig.php?delete=<?php echo $row['Id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i><p style="gray"> delete </p></a>
               <a href="customersconfig.php?edit=<?php echo $row['Id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `users` WHERE Id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_c_id" value="<?php echo $fetch_edit['Id']; ?>">
      <input type="text" class="box" required name="update_c_name" value="<?php echo $fetch_edit['Username']; ?>">
      <input type="text" class="box" required name="update_c_email" value="<?php echo $fetch_edit['Email']; ?>">
      <input type="text" min="0" class="box" required name="update_c_password" value="<?php echo $fetch_edit['Password']; ?>">
      <input type="submit" value="update the prodcut" name="update_customer" class="btn">
      <a href="customersconfig.php" class="option-btn">close</a>
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>