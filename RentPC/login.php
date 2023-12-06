
<?php 
session_start();

if (isset($_SESSION['auth']))
{
    $_SESSION['message']  = "You are already logged In";
    header('Location : main.php');
    exit();
}

include('header.php');

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>  Login Form  </title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<section class = "input-box">
<form action="func/authcode.php" method ="POST">
      <div class="container">
        <h1>Login</h1>
        
        
        <?php 
        if (isset($_SESSION['message']))
        {
        ?>
        
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?=$_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['message']);
        }
        ?>
    

        <label for="email"><b>Email</b></label>
        <input
          type="text"
          placeholder="Enter Email"
          name="email"
          id="email"
          required
        />

       

        <label for="pwd"><b>Password</b></label>
        <input
          type="password"
          placeholder="Enter Password"
          name="pwd"
          id="pwd"
          required
        />


        <button type="submit" name="login_btn">Login</button>
      </div>

      <div>
        <p>Don't have an account? <a href="register.php">Register</a>.</p>
      </div>
    </form>
</section>
</body>
</html>
