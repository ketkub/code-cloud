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
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
    include("php/config.php");
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        
        // Set user level to 1
        $userlevel = 1;

        //verifying the unique email
        $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

        if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                    <p>This email is used, Try another one, please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        } else {
            mysqli_query($con,"INSERT INTO users(Username, Email, Age, Password, user_level) VALUES('$username', '$email', '$age', '$password', '$userlevel')") or die("Error Occurred");

            echo "<div class='message'>
                    <p>Registration successful!</p>
                  </div> <br>";
            echo "<a href='login.php'><button class='btn'>Login Now</button>";
        }
    } else {
?>
    <center> <h1><i class="fa-solid fa-user"></i></h1><br>
    <header>Sign Up</header></center>
    <form action="" method="post">
        <div class="field input">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" autocomplete="off" required>
        </div>

        <div class="field input">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" autocomplete="off" required>
        </div>

        <div class="field input">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" autocomplete="off" required>
        </div>
        <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="off" required>
        </div>

        <div class="field">
            <input type="submit" class="btn" name="submit" value="Register" required>
        </div>
        <div class="links">
            Already a member? <a href="login.php">Sign In</a>
        </div>
    </form>
</div>
<?php } ?>
</div>
</body>
</html>
