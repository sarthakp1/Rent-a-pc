<?php
include('func/userfunction.php');
include('header.php');

?>

<head>
    <style>
        .card-wrapper 
        {
        width: 40%;
        height: 40%;
  
        }

        .banner-image 
        {
            background-position: center;
            background-size: cover;
            height: 250px;
            width: 95%;
            border-radius: 12px;
            border: 1px solid #474fa0;
        }
        .container 
        {
            border-radius: 12px;
            padding: 38px;  
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content:center;
            text-align: center;
    
        }

        
        h4{
        font-family: 'Righteous', sans-serif;
        text-transform: uppercase;
        color: #474fa0;
        font-size: 2.0rem;
        }


    </style>

</head>
<section class="text">
    <h3>
        <a href="main.php">Home/
        </a>
        <a href="categories.php">
        Collections/
        </a>
       
    </h3>
    <br>

    <h1>Our Collections</h1>
    
    <div class="container">
  
        <?php
            $categories = getAllActive("categories");

            if(mysqli_num_rows($categories) > 0)
            {
                foreach($categories as $item)
                {
                  ?>
                            
                    <div class="card-wrapper">
                        <a href="products.php?category=<?= $item['name']; ?>">
                        <h4><?= $item['name']; ?> </h4>

                        <div class="banner-image">
                            <img src="admin/uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100" height="200px" width="200px">
                        </div>
                        <br>
                        <br>
                        </a>
                    </div>
                
                  <?php 
                }    
            }
            else
            {
                echo " No data available";
            }
                    
        ?>



        
            
    </div>
</section>