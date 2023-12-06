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
    <title>  Registration Form  </title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <section class = "input-box">
    <form action="func/authcode.php" method ="POST">
      <div class="container">
        <h1>Register</h1>
        <p>Kindly fill in this form to register.</p>
        
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

        <label for="username"><b>Name</b></label>
        <input
          type="text"
          placeholder="Enter name"
          name="name"
          id="name"
          required
        />

        <label for="email"><b>Email</b></label>
        <input
          type="text"
          placeholder="Enter Email"
          name="email"
          id="email"
          required
        />

        <label for="phone"><b>Phone Number</b></label>
        <input
          type="number"
          placeholder="Enter Phone Number"
          name="phone"
          id="phone"
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

        <label for="pwd-repeat"><b>Confirm Password</b></label>
        <input
          type="password"
          placeholder="Confirm Password"
          name="cpwd"
          id="cpwd"
          required
        />

        <button type="submit" name="register_btn">Register</button>
      </div>

      <div>
        <p>Already have an account? <a href="login.php">Log in</a>.</p>
      </div>
    </form>
  </section>
</body>
</html>
