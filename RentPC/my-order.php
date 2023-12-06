<?php
include('func/userfunction.php');  

include('header.php');  
?>


<head>
    

    <style>
   table {
  display: table;
  border-collapse: separate;
  border-spacing: 20px;
  border-color: grey ;
}
    </style>
</head>
<section class="text">
            
    <h3>
        <a href="main.php">Home/
        </a>
        <a href="my-order.php">
        Order
        </a>
    </h3>
    <?php
    $orders= getOrders();

    if(mysqli_num_rows($orders)>0)
    {
    ?>
    <table class="table" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Tracking No</th>
                <th>Price</th>
                <th>Date</th>
                <th>Expiry</th>
                <th>View</th>
            </tr>
        </thead>
        <?php
        foreach($orders as $item)
        {
        ?>

        
        <tbody>
            <tr>
                <td><?=$item['id'];?></td>
                
                <td><?=$item['tid'];?></td>
                
                <td><?=$item['total_price'];?></td>
                <td>
                    <?php
        
                    $date = $item['start'];
                    
                    echo $date;
                    
                    ?>
                
                </td>
                <td>
                    <?php

                    $date2 = $item['expiry'];
                   
                    echo $date2;

                    ?>
                
                </td>
                <td>
                    <a href="view-order.php?t=<?=$item['tid'];?>" class="view">View Details</a>
                </td>

            </tr>
        </tbody>
      
    </table>
    
       

    <?php
        }
    } 
    else
    {

        echo "No Order Placed";
    }   
    

    ?>


<section>