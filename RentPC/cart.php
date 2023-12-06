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
        p 
        {
            text-align: left;   
        }
    </style>
</head>

          
         <section class="text">
            
            <h3>
                <a href="main.php">Home/
                </a>
                <a href="cart.php">
                Cart
                </a>
            </h3>
            <?php 
                $cart_items = getCartItems();  
                            
                    if(mysqli_num_rows($cart_items) > 0 ) 
                    
                        {
                        ?>
                         <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tboday>
                        <?php 
                            
                                foreach ($cart_items as $item)
                                {

                                    ?>
                                <tr>
                                            
                                           
                                            <td>
                                                <img src="admin//uploads/<?= $item['image']; ?>"  width ="100px" height="100px" alt="<?= $item['name']; ?>" >
                                            </td>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['product_qty']; ?></td>
                                            <td><?= $item['price']; ?></td>
                                            <td>
                                                <form action="func/handlecart.php"  method="GET">
                                                    <input type="hidden" name="pid" value="<?= $item['id']; ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger" name="remove-cart-btn" >Remove</button>
                                               
                                                </form>
                                               
                                              
                                            </td>
                                        </tr>
                                        
                           <?php
                           }
                           
                           ?>
                            

                        </tboady>

                    </table>

                    <p>
                        <a href="checkout.php" class="btn">Proceed to checkout</a>
                    </p>  

                    <?php             
                            
                      }
                            else
                            {
                                echo"Your Cart is Empty";
                            }
                                          
                            
              
        ?>

        </section>
        