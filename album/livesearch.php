<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<?php
include("config.php");
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM `products` WHERE name LIKE '{$input}%'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){?>
<style> 

.display-product-table table {
    margin-left: 15%;
    width: 70%;
    text-align: center;
    align-items: center;
}


table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
  align-items: center;
}

thead {
  background-color: #f2f2f2;
  text-align: center;
  align-items: center;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  border-style: groove;
  font-size: x-large;
  width: 100rem;
}

th {
  background-color: #4CAF50;
  color: white;

}

tbody tr:hover {
  background-color: #f5f5f5;
}

td img {
  width: 130;
  height: 130;
  display: block;
  margin: 0 auto;
  align-items: center;
}

.action-button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 20px;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  border-radius: 5px;
  cursor: pointer;
}
.btn, .option-btn, .delete-btn {
    display: block;
    width: 70%;
    text-align: center;
    background-color: var(--blue);
    color: white;
    font-size: 1.30rem;
    padding: 1.2rem 3rem;
    border-radius: .5rem;
    cursor: pointer;
    margin-top: 0.5rem;
    background-color: black;
    text-decoration: none;
    background-size: 50%;
    margin-right: 70%;
    margin-left: -3%;
}
.display-product-table table thead th {
    padding: 1.5rem;
    font-size: 1.5rem;
    background-color: lightcoral;
    color: var(--black);
}
</style>
    <section class="display-product-table">
            <table style="  text-align: center;">
                <thead>
                    <tr>
                        <th>รูปสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>รายละเอียดสินค้า</th>
                        <th>ราคา</th>
                        <th>action</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $name = $row['name'];
                            $image = $row['image'];
                            $detail = $row['detail'];
                            $price = $row['price'];

                            ?>
                            <tr>
                                <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="200" width="200" alt=""></td>
                                <td><?php echo $name?></td>
                                <td><?php echo $detail?></td>
                                <td><?php echo $price?></td>
                                <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i><p style="gray"> delete </p></a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
            </table>
</section>
            

<?php
    }else{
        echo"no data";

    }
}
?>