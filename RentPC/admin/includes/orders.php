<?php  
session_start();
include('myfunction.php');
include('header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
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
            <div class="card">
                <div class="card-header">
                    <h4>Orders</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>UserId</th>
                            <th>Name </th>
                            <th>Tracking No</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Expiry</th>
                            <th>Status</th>
                                            
                            </tr>
                        </thead>
                        <tboday>
                            <?php 
                                $products = getAllOrders();

                                if(mysqli_num_rows($products) > 0 )
                                {
                                    foreach($products as $item)
                                    {
                                        ?>
                                        <tr>
                                        <td><?=$item['id'];?></td>
                                        <td><?=$item['user_id'];?></td>
                                        <td><?=$item['name'];?></td>
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
                                            
                                            <td>
                                            <?php
                                                
                                                if ($item['status']==0)
                                                {
                                                    echo "Under Process";

                                                }
                                                else  if ($item['status']==1)
                                                {
                                                    echo "Completed";

                                                }
                                                if ($item['status']==2)
                                                {
                                                    echo "Cancelled";

                                                }
                                                ?>
                                                
                                        </td>
                                                
                                            
                                        
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo"No record found";
                                }
                            ?>
                            

                        </tboady>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
        
<?php  include('footer.php')?>