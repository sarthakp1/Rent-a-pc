<?php 
session_start();
include('header.php')?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pc Rental Website</title>
    <link rel="stylesheet" href="style.css">
    <!-- box icons  -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> -->
</head>
<body>
    
    <!-- HOME -->
    <section class="home" id="home">
        
        <div class="text">
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
            <h1><span>Looking</span> to <br>rent a pc</h1>
            <p>This is the place where you can enjoy gaming experience with less budget.</p>
        </div>

    </section>

    <section class="faq" id="faq">
            <ul id="accordian">
                <li>
                    <label for="first">Does it have Cash on Delivery?</label>
                    
                    <div class="content">
                        <p>Yes, there is a Cash on Delivery (COD) option available for selected product categories. 
                            To pay via COD, head to the payments page and select Cash on Delivery.</p>
                    </div>
                </li>
                <li>
                    <label for="second">How is the rental duration calculated???</label>
                    
                    <div class="content">
                        <p>So this works on a 24-hour format i.e. 1 Day is counted as 24 hours from the time the item was delivered to you.<br>For instance, if you ordered a PC in the time slot 5 PM – 7 PM on 15th March for 1 day, we will collect this on 16th March between 5 PM – 7 PM.</p>
                    </div>
                </li>
                

                <li>
                    <label for="third">I need multiple products, is there any discount offered?</label>
                    <div class="content">
                        <p>The prices mentioned on  Website are the best prices we can offer. Our system will not be able to alter these prices.</p>
                    </div>
                </li>

                <li>
                    <label for="fourth">Does it offer same-day delivery?</label>
                    <div class="content">
                        <p>Yes, we do.We have the option of same day deliveries for orders placed on the  Website before 4 PM IST.</p>
                    </div>
                </li>
                
                
            </ul> 
    </section>
</body>
</html>