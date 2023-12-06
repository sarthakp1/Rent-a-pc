
<?php
include('func/userfunction.php');  

include('header.php');  

if(isset($_GET['t']))
{
    $tid = $_GET['t'];
    $orderdata = checkTrackingNoValid($tid);

    if (mysqli_num_rows($orderdata)<0)
    {
        ?>
        <h4>Something went wrong!!<h4>
        <?php
        die();
    }
}
else
{
    ?>
    <h1>Something went Wrong!!</h1>
<?php
die();
}

$data = mysqli_fetch_array($orderdata);

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
        Order/
        </a>
        <a href="view-order.php">
        View Order
        </a>
    </h3>
    <?php
    $orders= getOrders();

    if(mysqli_num_rows($orders)>0)
    {
    ?>
  
    <h3> View order</h3>
    <br>
    <h4> Delivery Details</h4>
    <hr>
    <br>
    <label for=""><b>Tracking No::</b></label>
    <?=$data['tid'];?>
    <br>

    <label for=""><b>Name :</b></label>
    <?=$data['name'];?>
    
    <br>  
    <label for=""><b>Email :</b></label>
    <?=$data['email'];?>

    <br> 
    <label for=""><b>Phone :</b></label>
    <?=$data['phone'];?>

    <br>
    <label for=""><b>Address :</b></label>
    <?=$data['address'];?>
    <br>

    <label for=""><b>Pincode :</b></label>
    <?=$data['pincode'];?>
    <br>  

    <label for=""><b>Order Date :</b></label>
    <?=$data['start'];?>
    <br>

    <label for=""><b>Expiry Date :</b></label>
    <?=$data['expiry'];?>
    <br>

    <br>
    <h4> Order Details</h4>
    <hr>
    <br>
    <?php
    $userId = $_SESSION['auth_user']['user_id'];
    
    $order_query = "SELECT o.id as oid, o.tid , o.user_id, oi. *,oi.qty as orderqty  ,p.* FROM orders o,order_items oi , products p WHERE o.user_id ='$userId' AND p.id = oi.prod_id AND o.tid = '$tid' ";
    $order_query_run = mysqli_query($con,$order_query);
    ?>

    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            
        </tr>
    </thead>

    <?php
    if(mysqli_num_rows($order_query_run)>0)
    {
        foreach($order_query_run as $item)
        {

   ?>
        <tboday>
                        
                        
        <tr>
                                            
                                           
            <td>
                <img src="admin//uploads/<?= $item['image']; ?>"  width ="50px" height="50px" alt="<?= $item['name']; ?>" >
            </td>
            <td><?= $item['name']; ?></td>
            <td><?= $item['orderqty']; ?></td>
            <td><?= $item['price']; ?></td>

           
        </tr>
                                        
      
                            

      
    <?php
    


        }

        ?>
          
        </tboady>
    </table>

    <hr>
    <br>
    <h4>Total Price: <span><td><?= $data['total_price']; ?></td></span></h4>
    <label for=""><b>Payment Mode :</b></label>
    <?=$data['payment_mode'];?> (Cash on Delivery)
    <br>
    
    <label for=""><b>Status:</b></label>
    <?php
    
    if ($data['status']==0)
    {
        echo "Under Process";

    }
    else  if ($data['status']==1)
    {
        echo "Completed";

    }
    if ($data['status']==2)
    {
        echo "Cancelled";

    }
    ?>
    <br>
    <br>
    <a href="my-order.php" name="back">Back</a>
 
    

    <br>

    <?php

    }
    ?>

    <?php
        
    } 
    else
    {

        echo "No Order Placed";
    }   
    

    ?>


<section>
