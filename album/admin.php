
<?php
@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_detail = $_POST['p_detail'];
   $p_category = $_POST['p_category'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, detail, category, image) VALUES('$p_name', '$p_price', '$p_detail', '$p_category', '$p_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'product add succesfully';
      header("Location: admin.php");
   }else{
      $message[] = 'could not add the product';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   // ตรวจสอบว่ามีการส่งข้อมูลการอัปเดตสินค้าหรือไม่
   if(isset($_POST['update_p_id']) && isset($_POST['update_p_name']) && isset($_POST['update_p_price']) && isset($_POST['update_p_detail'])){
      $update_p_id = $_POST['update_p_id'];
      $update_p_name = $_POST['update_p_name'];
      $update_p_detail = $_POST['update_p_detail'];
      $update_p_price = $_POST['update_p_price'];

      // ตรวจสอบว่ามีการอัปโหลดรูปหรือไม่
      if (isset($_FILES['update_p_image']) && $_FILES['update_p_image']['size'] > 0) {
         $update_p_image = $_FILES['update_p_image']['name'];
         $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
         $update_p_image_folder = 'uploaded_img/' . $update_p_image;
     
         // Validate image type and size (optional)
         $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif']; // Add allowed extensions here
         $file_extension = pathinfo($update_p_image, PATHINFO_EXTENSION);
         if (!in_array(strtolower($file_extension), $allowed_extensions)) {
             $message[] = 'Invalid image format. Please upload a jpg, jpeg, png, or gif image.';
             goto no_image_update; // Skip image update if validation fails
         }
     
         if (move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder)) {
             // Image uploaded successfully, update query with new image path
             $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', detail = '$update_p_detail', image = '$update_p_image' WHERE id = '$update_p_id' LIMIT 1");
         } else {
             // Image upload failed, handle the error
             $message[] = 'Failed to upload image.';
         }
     } else {
         // No image uploaded, update query without image modification
     no_image_update:
         $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', detail = '$update_p_detail' WHERE id = '$update_p_id' LIMIT 1");
     }
     
     if ($update_query) {
         $message[] = 'Product updated successfully.';
     } else {
         $message[] = 'Product could not be updated.';
     
         // Optional: Log the update query error for debugging
         error_log(mysqli_error($conn));
     }
      } else {
         // กรณีไม่มีการอัปโหลดรูป
         // อัปเดตเฉพาะข้อมูลสินค้า โดยไม่เปลี่ยนรูปภาพ
         $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', detail = '$update_p_detail' WHERE id = '$update_p_id' LIMIT 1");

         if($update_query){
            $message[] = 'Product updated successfully';
         } else {
            $message[] = 'Product could not be updated';
         }
      }
   } 


if(isset($_GET['delete'])){
   // ตรวจสอบว่ามีการส่งข้อมูลการลบสินค้าหรือไม่
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location: admin.php'); // ใส่รหัสสถานะ HTTP 302 เพื่อเปลี่ยนเส้นทางไปยังหน้าหลักของแอพพลิเคชัน
      $message[] = 'product has been deleted';
      exit(); // หยุดการทำงานหลังจากการเปลี่ยนเส้นทางเพื่อป้องกันการดำเนินการเพิ่มเติม
   } else {
      $message[] = 'product could not be deleted';
   }
}


if(isset($_GET['search_query'])){
   $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);  // Sanitize user input
   $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%$search_query%' ORDER BY CASE WHEN name LIKE '$search_query%' THEN 0 WHEN name LIKE '%$search_query' THEN 2 ELSE 1 END, name");
 } else {
   $select_products = mysqli_query($conn, "SELECT * FROM `products`");
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

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add product</h3>
   <input type="text" name="p_name" placeholder="กรอกชื่อสินค้า" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="กรอกราคาสินค้า" class="box"  required >
   <input type="text" name="p_detail" min="0" placeholder="กรอกรายละเอียดสินค้า" class="box"  required >
   <select name="p_category" class="box" required>
   <option value="">เลือกประเภทสินค้า</option>
    <option value="1">Mini bag</option>
    <option value="2">Clutch bag</option>
    <option value="3">Backpack</option>
    <option value="4">Card holder</option>
    <option value="5">Hobo bag</option>
</select>
   <input type="file"  name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the product" name="add_product" class="btn">
</form>

</section>
<div class="search-container"><br>
   <form action="" method="GET">
      <a href="searchadmin.php"><i class="fa fa-search" ></a></i><br><br>
   </form>
</div>

<style>
   .search-container{
      font-size: large;
      border-style: black;
   }
   .search-container form{
   height: 1.5rem;
   max-width: 165rem;
   text-align: right;
   font-size: large; /* ตรงนี้ครับ */
}; /* และที่นี่ครับ */


   .search-container i{
      font-size: 3rem;
      background-color: whitesmoke;
      cursor: pointer;
      border: black;
      margin-right: 10%;
      color: black;
   }
  
<?
if(mysqli_num_rows($select_products) > 0){
} else {
   echo "<div class='empty'>No products found.</div>";
}
?>
</style> 



<section class="display-product-table">

   <table>

      <thead>
     <th>รูปสินค้า</th>
     <th>ชื่อสินค้า</th>
     <th>รายละเอียดสินค้า</th>
     <th>ราคา</th>
     <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="200" width="200" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['detail']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i><p style="gray"> delete </p></a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
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
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="text" class="box" required name="update_p_detail" value="<?php echo $fetch_edit['detail']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <a href="admin.php" class="option-btn">close</a>
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