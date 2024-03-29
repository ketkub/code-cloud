<?php
// Include config file
include_once 'config.php';

// Get search term from URL query parameter
$searchTerm = $_GET['query'];

// Prepare a SELECT statement to search products by name or detail
$query = "SELECT * FROM `products` WHERE name LIKE '%$searchTerm%' OR detail LIKE '%$searchTerm%'";
$result = mysqli_query($conn, $query);

// Check if any products found
if(mysqli_num_rows($result) > 0) {
    // Display products
    while($row = mysqli_fetch_assoc($result)) {
        // Output each product
        echo '<div class="box">';
        echo '<img src="uploaded_img/'.$row['image'].'" alt="">';
        echo '<h3>'.$row['name'].'</h3>';
        echo '<h4>รายละเอียดสินค้า<br>'.$row['detail'].'</h4>';
        echo '<div class="price">$'.$row['price'].'/-</div>';
        echo '<form action="" method="post">';
        echo '<input type="hidden" name="product_name" value="'.$row['name'].'">';
        echo '<input type="hidden" name="product_price" value="'.$row['price'].'">';
        echo '<input type="hidden" name="product_detail" value="'.$row['detail'].'">';
        echo '<input type="hidden" name="product_image" value="'.$row['image'].'">';
        echo '<input type="submit" class="btn" value="add to cart" name="add_to_cart">';
        echo '</form>';
        echo '</div>';
    }
} else {
    // No products found
    echo 'No products found matching your search.';
}

// Close the database connection
mysqli_close($conn);
?>
