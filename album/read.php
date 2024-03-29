<?php
// read.php

// เชื่อมต่อกับฐานข้อมูล
$con = mysqli_connect('localhost', 'root', '', 'shop_db');

// ตรวจสอบการเชื่อมต่อ
if (!$con) {
    die("การเชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

// ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // คำสั่ง SQL เพื่อดึงข้อมูลคำสั่งซื้อจากฐานข้อมูล
    $sql = "SELECT * FROM `order` WHERE id = $id";
    $result = mysqli_query($con, $sql);

    // ตรวจสอบว่าพบข้อมูลหรือไม่
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // แสดงข้อมูลคำสั่งซื้อ
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดคำสั่งซื้อ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .order-details {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .order-details h2 {
            margin-top: 0;
        }
        .order-details p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="order-details">
        <h2>รายละเอียดคำสั่งซื้อ</h2>
        <p><strong>ชื่อผู้ใช้:</strong> <?php echo $row['name']; ?></p>
        <p><strong>สั่งเมื่อวันที่:</strong> <?php echo $row['order_date']; ?></p>
        <p><strong>ที่อยู่:</strong> <?php echo $row['flat'] . " " . $row['city'] . " " . $row['pin_code']; ?></p>
        <p><strong>สินค้าที่ซื้อ:</strong> <?php echo $row['total_products']; ?></p>
        <p><strong>รวมสุทธิ:</strong> <?php echo $row['total_price']; ?></p>
    </div>
</body>
</html>
<?php
    } else {
        echo "ไม่พบข้อมูลสำหรับรหัสคำสั่งซื้อ: $id";
    }
} else {
    echo "กรุณากำหนดรหัสคำสั่งซื้อ";
}

// ปิดการเชื่อมต่อ
mysqli_close($con);
?>
