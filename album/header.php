<header class="header">

   <div class="flex">

      <a href="home.php" class="logo">JAMILLE</a>

      <nav class="navbar">
         <a href="products.php">Products</a>
         
      </nav>
      <div class="dropdown">
    <button class="dropbtn">Category</button>
    <div class="dropdown-content">
        <a href="products_type1.php">Mini bag</a>
        <a href="products_type2.php">Clutch bag</a>
        <a href="products_type3.php">Backpack</a>
        <a href="products_type4.php">Card holder</a>
        <a href="products_type5.php">Hobo bag</a>
    </div>
</div>
</nav>
<style>
   .dropbtn{
      font-size: 2rem;
      color: black;
      background-color: darkgray;
   }
   .dropbtn :hover{
      background-color: gold;
   }
   .dropdown {
    position: relative;
    display: inline-block;
    margin-right: 20px;
    margin-left: 20px;
    font-size: 1.5rem;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    z-index: 1;
    border-style: while;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    border-radius: initial;
}

.dropdown-content a:hover {
    color: black;
}

.dropdown:hover .dropdown-content {
    display: block;
}
.fa-cart-shopping:before,.fa-shopping-cart:before {
    content: "\f07a";
    color: black;
}

</style>
  

      

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i>  <span><?php echo $row_count; ?></span></a> 
      
  </style>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>