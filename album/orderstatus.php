<?php
//Database connectivity  
$con=mysqli_connect('localhost','root','','shop_db');
$sql=mysqli_query($con,"select * from `order`");  
 //Get Update id and status  
 if (isset($_GET['id']) && isset($_GET['status'])) {  
      $id=$_GET['id'];  
      $status=$_GET['status'];  
      mysqli_query($con,"update `order` set status='$status' where id='$id'");

      header("location:orderstatus.php");  
      die();  
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

?>

<?php include 'header_admin.php'; ?>

<div class="container">

<section>

</section>

<section class="display-product-table">

   <table>

      <thead>
        <th>ลำดับการสั่งซื้อ</th>
         <th>ชื่อผู้ใช้</th>
         <th>รายละเอียดคำสั่งซื้อ</th>
         <th>สถานะสินค้า</th>
         <th>action</th>
      </thead>

      <tbody>
<?php  
    $i = 1;  
    if (isset($sql) && mysqli_num_rows($sql) > 0) {  
        while ($row = mysqli_fetch_assoc($sql)) { 
?>  
    <tr>  
        <td><?php echo $i++ ?></td>  
        <td><?php echo $row['name'] ?></td>  
        <td><a href='read.php?id=<?php echo $row['id']; ?>' class="option-btn"> <i class="fa-solid fa-circle-info"></i> view </a></td> 
        <td>  
            <?php  
                if ($row['status'] == 1) {  
                    echo "กำลังรอ";  
                } elseif ($row['status'] == 2) {  
                    echo "ยอมรับ";  
                } elseif ($row['status'] == 3) {  
                    echo "ปฎิเสธ";  
                }  
            ?>  
        </td>  
        <td>  
            <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['id'] ?>')">  
                <option value="">เลือกสถานะ</option>  
                <option value="1">กำลังรอ</option>  
                <option value="2">ยอมรับ</option>  
                <option value="3">ปฎิเสธ</option>  
            </select>  
        </td>  
    </tr>  
<?php      
        }  
    } 
?>
</tbody>
   </table>

</section>
<script type="text/javascript">
    function status_update(value,id){  
           //alert(id);  
           let url = "http://127.0.0.1/jamille/album/orderstatus.php";  
           window.location.href= url+"?id="+id+"&status="+value;  
      }  
 </script>  
</body>
</html>