<?php

include('func/userfunction.php');
include('header.php');
?>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato:400,700');
        $font: 'Lato', sans-serif;

        $white: #F5F5F5;
        $light: #E0C9CB;
        $tan: #C3A1A0;
        $pink: #D9AAB7;
        $rose: #BA7E7E;
        $dark: #4E4E4E;


        body {
        display: grid;
        background: $light;
        font-family: $font, sans-serif;
        text-transform: uppercase;
        }

        .container {
        position: relative;
        margin: auto;
        overflow: hidden;
        width: 1020px;
        height: 650px;
        background: $white;
        box-shadow: 5px 5px 15px #A994FE;
        border-radius: 10px ;
        
        }
       
       .images
       {
        border:10px;
       }

        p {
        font-size: 0.6em;
        color: $rose;
        letter-spacing: 1px;
        }

        h1
        {
            color:#5010BE;
        }

        h2 {
        color: $tan;
        margin-top: -5px;
        }
        .product {
        position: absolute;
        width: 40%;
        height: 100%;
        top: 10%;
        left: 60%;
        }

        .desc {
        text-transform: none;
        letter-spacing: 0;
        margin-bottom: 17px;
        color: $dark;
        font-size: 15px;
        line-height: 1.6em;
        margin-right: 25px;
        text-align: justify;
        }

        button {
        background: darken($light, 10%);
        padding: 10px;
        display: inline-block;
        outline: 0;
        border: 0;
        margin: -1px;
        border-radius: 2px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: $white;
        cursor: pointer;
        
        }



      
    </style>
</head>
    

    <?php
    if(isset($_GET['product']))
    {
        $product_name=$_GET['product'];
        $product_data = getNameActive("products",$product_name);
        $product = mysqli_fetch_array($product_data);

        if($product)
        {   
            ?>
         <section class="text">
            <h3>
                <a href="main.php">Home/
                </a>
                <a href="categories.php">
                Collections/
                </a>
                <?= $product['name']; ?>
            </h3>
            </section>
             
<body>
    <div class="container">
        <div class="images">
            <img src="admin/uploads/<?= $product['image']; ?>" alt="product image" class="w-100" height=400px >
        </div>
  
        <div class="product">
            <p></p>
            <h1><?= $product['name']; ?></h1>
            <br>
            <h2> Rs.<?= $product['price']; ?> /per month  </h2>
            <br> 
            <p class="desc"><?= $product['description']; ?></p>
            <div class="buttons">
                <form action="func/handlecart.php" >
                    <input type="hidden" name="pid" value= "<?= $product['id']; ?>">
                    <input type="hidden" name="pqty" value= "<?= $product['qty']; ?>">

                    <button type=submit  name ="addtoCartBtn">Add to Cart</button>
                </form>
        
            </div>
        </div>
    </div>



           

            <?php
        }
        else
        {
            echo"Product not found";
        }
    }
    else
    {
        echo"Something went wrong";
    }
    include('admin/includes/footer.php');

    ?>
</body>