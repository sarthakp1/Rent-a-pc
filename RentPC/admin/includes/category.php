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
                    <h4>Categories</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tboday>
                            <?php 
                                $category = getAll("categories");

                                if(mysqli_num_rows($category) > 0 )
                                {
                                    foreach($category as $item)
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
                                                <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary">EDIT</a>
                                                <form action="code.php" method="POST">
                                                    <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                    <button type="sumbmit" class="btn btn-danger" name="delete-category-btn" >DELETE</button>
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