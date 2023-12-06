<?php
session_start();
include('./config/dbcon.php');

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:'.$url);
    exit();
}


function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0'";
    return $query_run = mysqli_query($con,$query);
}

function getNameActive($table,$name)
{
    global $con;
    $query = "SELECT * FROM $table WHERE name='$name' AND status='0' LIMIT 1 ";
    return $query_run = mysqli_query($con,$query);
}


function getIDActive($table,$id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0' LIMIT 1 ";
    return $query_run = mysqli_query($con,$query);
}

function getProdbyCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0'";
    return $query_run = mysqli_query($con,$query);
}

function getCartItems()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM carts , products  WHERE carts.product_id = products.id AND carts.user_id='$userId' ORDER BY carts.id DESC";
    return $query_run = mysqli_query($con,$query);
     
}


function getOrders()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE user_id='$userId' ORDER BY id DESC";
    return $query_run = mysqli_query($con,$query);

}

function checkTrackingNoValid($tid)
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query= "SELECT * FROM orders WHERE tid='$tid' AND user_id='$userId'";
    return $query_run = mysqli_query($con,$query);
}

?>