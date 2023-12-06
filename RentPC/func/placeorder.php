<?php

session_start();
include('../config/dbcon.php');

function getCartItems()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM carts , products  WHERE carts.product_id = products.id AND carts.user_id='$userId' ORDER BY carts.id DESC";
    return $query_run = mysqli_query($con,$query);
     
}


    if (isset($_POST['placeorderbtn']))
    {
        
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        $pincode = mysqli_real_escape_string($con,$_POST['pc']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $payment_mode = mysqli_real_escape_string($con,$_POST['payment_mode']);
        $payment_id = 1 ;



        if (preg_match('/[0-9]+/', $name)) {
            $_SESSION['message'] = "Invalid Name  ";
            header('Location: ../checkout.php');
        }
        else if(!preg_match("/^[6-9][0-9]{9}$/", $phone))
        {
            $_SESSION['message'] = "Invalid Phone Number ";
            header('Location: ../checkout.php');
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $_SESSION['message'] = "Invalid Email  ";
            header('Location: ../checkout.php');
        }


        $cart_items = getCartItems();  
        $totalPrice =  0;    
        foreach ($cart_items as $item)
        {
            $totalPrice += $item['price'] * $item['product_qty'];
        }
      
        
        
        $tid = "ds".rand(1111,9999);
        $userId =$_SESSION['auth_user']['user_id'];
        $currentDate = date('Y-m-d');
        $newDate = date('Y-m-d', strtotime($currentDate . ' +1 month'));

        $insert_query = "INSERT INTO orders (tid, user_id, name, email ,phone ,address ,pincode ,total_price ,payment_mode ,payment_id , expiry) VALUES ('$tid','$userId','$name','$email','$phone','$address','$pincode','$totalPrice','$payment_mode','$payment_id','$newDate')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
          
            
            $order_id  = mysqli_insert_id($con);
            $q = getCartItems();
            foreach ($q as $citems)
            {
                $prod_id = $citems['id'];
                $prod_qty = $citems['product_qty'];
                $price = $citems['price'];


                $insert_items_query = "INSERT INTO order_items(order_id	,prod_id,qty,price) VALUES ('$order_id','$prod_id','$prod_qty','$price')";
            
                $insert_items_query_run = mysqli_query($con , $insert_items_query);

                $product_query = "SELECT * FROM products WHERE id = '$prod_id' LIMIT 1";
                $product_query_run = mysqli_query($con ,$product_query );
                
                $productData = mysqli_fetch_array($product_query_run);
                $current_qty = $productData['qty'];

                $new_qty = $current_qty - $prod_qty;

                $updateQty_query = "UPDATE products SET qty='$new_qty' WHERE id='$prod_id'";
                $updateQty_query_run = mysqli_query($con ,$updateQty_query );


                $deleteCartQuery = "DELETE FROM carts WHERE user_id='$userId' ";
                $deleteCartQuery = mysqli_query($con, $deleteCartQuery);

               

                $_SESSION['message']= "Order Placed Succesfully";
                header('Location: ../my-order.php');
            }  

        }
        else
        {
            $_SESSION['message']= "Something went wrong";
            header('Location: ../checkout.php');

        }
    }


?>