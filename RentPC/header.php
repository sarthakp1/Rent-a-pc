
<header>

<link rel="stylesheet" href="style.css">
<style>
.dropdown {
  display: inline-block;
  position: relative;
}
.dropdown-options {
  display: none;
  position: absolute;
  overflow: auto;
}

.dropdown:hover .dropdown-options {
  display: block;
}
</style>

    
        <a href="#" class="logo"><img src="images/images.jpeg" alt=""></a>

        <ul class="navbar">
            <li><a href="main.php">HOME</a></li>
            <li><a href="categories.php">COLLECTIONS</a></li>
          
            <li><a href="main.php#faq">FAQ</a></li>
            <?php 
                if(isset($_SESSION['auth']))
                {
                    ?>
                    
                    <li><a href="cart.php">CART</a></li>
                
                    
                    <div class="dropdown">
                        <button><li><a href="#about-us"> <?=$_SESSION['auth_user']['name'] ?></a></li></button>
                        <div class="dropdown-options">
                            <a href="#"></a>
                            <a href="my-order.php">ORDERS</a>
                            <a href="logout.php">LOGOUT</a>
                
                        </div>
                     </div>
                    <?php 
                }
                else
                {
                  ?>  
                    <li><a href="register.php">REGISTER</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                <?php    
                }
            ?>
            
        </ul>
</header>

