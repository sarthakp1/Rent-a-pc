<?php

session_start();
include('../config/dbcon.php');



if(isset($_SESSION['auth']))
{
    if(isset($_GET['addtoCartBtn']))
    {
     
        $product_id = $_GET['pid'];
        $product_qty =  isset($_GET['pqty'])? '1':'0';
        $user_id =$_SESSION['auth_user']['user_id'];

        $chk_existing_cart = "SELECT * FROM carts WHERE product_id='$product_id' AND user_id = '$user_id'";
        $chk_existing_cart_run = mysqli_query($con,$chk_existing_cart);

        if(mysqli_num_rows($chk_existing_cart_run>0)) 
        {
            $_SESSION['message']= "Product already in cart";
            header('Location: ../main.php');
        }
        else
        {
            $insert_query = "INSERT INTO carts (user_id,product_id,product_qty) VALUES('$user_id','$product_id','$product_qty')";
            $insert_query_run = mysqli_query($con,$insert_query);

            if($insert_query_run)
            {
                $_SESSION['message']= "Product added to cart";
                header('Location: ../cart.php');
            }
            else
            {
                $_SESSION['message']= "Something went wrong";
                header('Location: ../cart.php');
            }
        }
    }
    else if(isset($_GET['remove-cart-btn']))
    {
        $product_id = $_GET['pid'];
        
        $user_id =$_SESSION['auth_user']['user_id'];
    
        $delete_query = "DELETE FROM carts WHERE product_id='$product_id' AND user_id = '$user_id' ";
        $delete_query_run = mysqli_query($con,$delete_query);
    
        if($delete_query_run)
        {
            $_SESSION['message']= "Deleted Succesfully";
            header('Location: ../cart.php');
            
            
        }
        else
        {
            $_SESSION['message']= "Something went wrong";
            header('Location: ../cart.php');
            
            
        }
    
    
    }

}  
else
{
    $_SESSION['message'] = "Login to Add in Cart";
    header('Location:../login.php');
    
}