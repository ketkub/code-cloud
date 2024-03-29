<?php
session_start();

// ตรวจสอบว่ามีการเข้าสู่ระบบหรือไม่
if(!isset($_SESSION['id'])) {
    // ถ้าไม่ได้เข้าสู่ระบบ ให้ redirect ไปยังหน้า login
    header("Location: login.php");
    exit(); // ออกจากการทำงานของ script
}

// ต่อโค้ดที่คุณต้องการตรวจสอบด้านล่างนี้
?>
<?php

@include 'config.php';

if(isset($_POST['order_btn'])){
   $product_name = array();
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $city = $_POST['city'];
   $pin_code = $_POST['pin_code'];
   $status = 1;
   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   mysqli_query($conn, "DELETE FROM `cart`");
if(mysqli_num_rows($cart_query) > 0){
   while($product_item = mysqli_fetch_assoc($cart_query)){
      $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
      // Initialize $product_price as a numeric value
      $product_price = floatval($product_item['price'] * $product_item['quantity']);
      $price_total += $product_price;
   }; 
   };

   $total_product = implode(', ',$product_name);
   $order_date = date("Y-m-d H:i:s"); // กำหนดค่าวันที่และเวลาปัจจุบัน
   $user_id = $_SESSION['id'];
 

   $detail_query = mysqli_query($conn, "INSERT INTO `order`(user_id, name, number, email, method, flat,  city,  pin_code, total_products, total_price, order_date, status) VALUES('$user_id','$name','$number','$email','$method','$flat','$city','$pin_code','$total_product','$price_total','$order_date','$status')") or die('query failed');


   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>ขอบคุณสำหรับการซื้อฮาฟฟู่ว</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> ชื่อ-นามสกุล : <span>".$name."</span> </p>
            <p> เบอร์โทร : <span>".$number."</span> </p>
            <p> email : <span>".$email."</span> </p>
            <p> ที่อยู่ : <span>".$flat.", ".$city.", - ".$pin_code."</span> </p>
            <p> ชำระโดย : <span>".$method."</span> </p>
            <p>(รอรับสินค้าได้เลย)</p>
         </div>
            <a href='products.php' class='btn'>เลือกซื้อสินค้าเพิ่มเติม</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading"></h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $total += $total_price; // เพิ่มราคารวมในตัวแปร $total
            echo "<div class='item'>";
            echo "<span class='item-name'>" . $fetch_cart['name'] . "</span>";
            echo "<span class='item-price'>$" . number_format($fetch_cart['price'], ) . "</span>";
            echo "<span class='item-quantity'>" . $fetch_cart['quantity'] . "</span>";
            echo "<span class='item-total'>$" . number_format($total_price, ) . "</span>";
            echo "</div>";
         }
         $grand_total = $total;

      
      if(mysqli_num_rows($select_cart) > 0){
    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
        // แสดงรายการสินค้าเฉพาะเมื่อมีข้อมูลที่ได้รับจากการดึงข้อมูล
        echo "<span>" . $fetch_cart['name'] . "(" . $fetch_cart['quantity'] . ")</span>";
    }
   }

      
         }
      else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> ยอดรวมสุทธิ : $<?= $grand_total; ?></span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>ชื่อ-นามสกุล</span>
            <input type="text" placeholder="ชื่อ-นามสกุล ของคุณ" name="name" required>
         </div>
         <div class="inputBox">
            <span>เบอร์โทรศัพท์</span>
            <input type="number" placeholder="เบอร์โทรศัพท์ ของคุณ" name="number" required>
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="Email ของคุณ" name="email" required>
         </div>
         <div class="inputBox">
            <span>เลือกช่องทางการชำระ</span>
            <select name="method">
               <option value="cash on delivery" selected>เลือกช่องทางการชำระ</option>
               <option value="credit cart">เก็บเงินปลายทาง</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>ที่อยู่</span>
            <input type="text" placeholder="บ้านเลขที่ ถนน ตึก" name="flat" required>
         </div>
         <div class="inputBox">
            <span>จังหวัด</span>
            <input type="text" placeholder="จังหวัด" name="city" required>
         </div>
         <div class="inputBox">
            <span>รหัสไปรษณี</span>
            <input type="text" placeholder="รหัสไปรษณี" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>