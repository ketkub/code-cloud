<?php
// เชื่อมต่อกับฐานข้อมูล
@include 'config.php';

// ตรวจสอบว่ามีการส่งค่าผ่านฟอร์มหรือไม่
if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    // ตรวจสอบว่าสินค้านี้มีอยู่ในตะกร้าแล้วหรือไม่
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'product already added to cart';
    }else{
        // ถ้ายังไม่มีสินค้านี้ในตะกร้า ให้เพิ่มสินค้าเข้าไปในตะกร้า
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
        $message[] = 'product added to cart successfully';
    }
}

// ตรวจสอบว่ามีการค้นหาสินค้าหรือไม่
if(isset($_GET['search_query'])){
    $search_query = $_GET['search_query'];
    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%$search_query%'");
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
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
   
<?php
// แสดงข้อความ
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};
?>

<?php include 'header.php'; ?>


<div class="search-container"><br>
   <form action="" method="GET">
      <input type="text" placeholder="Search products..." name="search_query">
      <button type="submit"><i class="fa fa-search"></i></button>
   </form>
</div>
<style>
   .search-container{
      font-size: large;
      background-color: whitesmoke;
   }
   .search-container form{
     height: 1.5rem;
     max-width: 165rem;
     text-align: right;
     font-size: large;
   }
   .search-container i{
      font-size: 1.7rem;
      background-color: #fff;
      cursor: pointer;
      border: black;
      width: 7.5rem;
      background-color: whitesmoke;
   }

</style>

<div class="container">
   <section class="products">
      <h1 class="heading"></h1>
      <div class="box-container">
         <?php
         // แสดงข้อมูลสินค้า
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_products)){
         ?>
         <form action="" method="post">
            <div class="box">
               <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
               <h3><?php echo $fetch_product['name']; ?></h3>
               <h4>รายละเอียดสินค้า<br><?php echo $fetch_product['detail']; ?></h4>
               <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
               <input type="hidden" name="product_detail" value="<?php echo $fetch_product['detail']; ?>">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
               <input type="submit" class="btn" value="add to cart" name="add_to_cart">
            </div>
         </form>
         <?php
            }
         } else {
            echo "<p>No products found.</p>";
         }
         ?>
      </div>
   </section>
</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
