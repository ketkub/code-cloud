<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="fontawesome/f/css/fontawesome.min.css"rel="stylesheet">
    <link href="fontawesome/f/css/brands.min.css" rel="stylesheet">
    <link href="fontawesome/f/css/solid.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include("php/config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                    if($row['user_level'] == 1) {
                      header("Location: home.php"); // สำหรับผู้ใช้ทั่วไป
                  } elseif($row['user_level'] == 2) {
                      header("Location: admin.php"); // สำหรับผู้ดูแลระบบ
                  } 
                    
                   
                
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='login.php'><button class='btn'>Go Back</button>";
         
                }
               
                
              }else{
                

            
            ?>
           <center> <h1><i class="fa-solid fa-user"></i></h1><br>
            <header>Login</header></center>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div><br>

                <hr class="my-4">
                <center><h3 class="fs-5 fw-bold mb-5">Or use a third-party</h3>
         <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
        <svg class="bi me-1" width="50" height="20"><i class="fa-brands fa-square-x-twitter"></i><a href="Twitter"></a> </svg> 
            Sign up with Twitter
          </button><br> 
          <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
          <svg class="bi me-1" width="25" height="20"><i class="fa-brands fa-facebook"></i><a href="Facebook"></a></svg>
            Sign up with Facebook
          </button><br>
          <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
          <svg class="bi me-1" width="25" height="20"><i class="fa-brands fa-square-instagram"></i><a href=" instagram"></a> </svg>
            Sign up with instagram
          </button><br>
         </center><br>
         <hr class="my-4"><br>
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
     


</body>
</html>