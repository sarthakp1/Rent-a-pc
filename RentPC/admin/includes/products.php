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
                    <h4>Products</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                                
                            </tr>
                        </thead>
                        <tboday>
                            <?php 
                                $products = getAll("products");

                                if(mysqli_num_rows($products) > 0 )
                                {
                                    foreach($products as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td>
                                                <img src="../uploads/<?= $item['image']; ?>"  width ="100px" height="100px" alt="<?= $item['name']; ?>" >
                                            </td>
                                            <td>
                                                <?= $item['status'] == '0'?"Visible":"Hidden" ?>
                                            </td>
                                            <td>
                                                <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">EDIT</a>
                                                <form action="code.php" method="POST">
                                                    <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger" name="delete-product-btn" >DELETE</button>
                                               
                                                </form>
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