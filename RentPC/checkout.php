<?php
include('func/userfunction.php');  

include('header.php');  
?>


    <head>
        <style>


        td {
        text-align: center;
        }
        </style>
    </head>

        
    <section class="text">
            
            <h3>
                <a href="main.php">Home/
                </a>
                <a href="checkout.php">
                Checkout
                </a>
            </h3>
     
            
    </section>  



  
    <section class = "input-box">
    
        <h2>Basic Details</h2>
        <br>
            <?php 
            if (isset($_SESSION['message']))
            {
            ?>
        
            <?=$_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            unset($_SESSION['message']);
            }
            ?>
            <form action="func/placeorder.php" method="POST">
            <label for="username"><b>Name:</b></label><br>
                <input
                type="text"
                placeholder="Enter your Full Name"
                name="name"
                id="name"
                required
                />

                <br><label for="email"><b>Email:</b></label><br>
                <input
                type="text"
                placeholder="Enter Email"
                name="email"
                id="email"
                required
                />

                <br><label for="phone"><b>Phone Number:</b></label><br>
                <input
                type="number"
                placeholder="Enter Phone Number"
                name="phone"
                id="phone"
                required
                />
                

                <br><label for="pc"><b>Pin Code:</b></label><br>
                <input
                type="number"
                placeholder="Enter Pin Code"
                name="pc"
                id="pc"
                required
                />
                
                <br><label for="address"  ><b>Address:</b></label><br>
                <textarea

                rows="5"
                name="address"
                id="address"
                required>
                </textarea>

                <br><b>Order Detils:</b>
                <hr>
                <table style="width: 500px;">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>           
                        </tr>
                    </thead>
                    
                    <tboday>
                        <?php 
                            $cart_items = getCartItems();  
                            $totalPrice =  0;    
                            if(mysqli_num_rows($cart_items) > 0 ) 
                            {
                                foreach ($cart_items as $item)
                                {

                                    ?>
                                    <tr>
                                                        
                                                    
                                        <td>
                                            <img src="admin//uploads/<?= $item['image']; ?>"  width ="100px" height="100px" alt="<?= $item['name']; ?>" >
                                        </td>

                                        <td><?= $item['name']; ?></td>
                                        <td>X<?= $item['product_qty']; ?></td>
                                        <td><?= $item['price']; ?></td>
                                                        
                                    </tr>
                                
                                    <?php
                                    $totalPrice += $item['price'] * $item['product_qty']; ;
                                }
                                    }
                                    else
                                    {
                                        echo"No record found";
                                    }
                                ?>
                                    

                    </tboady>

                </table>
                <hr> 
                <br>                  
                <h2><b>Total Price:</b> <b><span class="total"><?= $totalPrice; ?>/ RS</span><b></h2><br>
                <input type="hidden" name="payment_mode" value="COD">                   
                <button type="submit" name ="placeorderbtn" class="btn" >Confirm and Place Order | COD</button>              
        
             </form>

      
 
               
                              
                              
                            
                                    
                            
              
    </section>
        