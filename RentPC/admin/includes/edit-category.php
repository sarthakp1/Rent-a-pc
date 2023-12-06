
<?php  

session_start();

include('header.php');
include('myfunction.php');

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
                <?php 
                    if(isset($_GET['id']))
                    {     
                        $id=$_GET['id']; 
                        $category = getByID("categories",$id);
                        
                        if(mysqli_num_rows($category)>0)
                        {
                            $data = mysqli_fetch_array($category);
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Category</h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="hidden" name="category_id" value="<?= $data['id']?>">
                                            <div class="col-md-12">
                                                <label for="name">Name</label>
                                                <input type ="text" value="<?= $data['name']?>" placeholder="Enter Category name" name="name" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Description</label>
                                                <textarea rows="3"   name="description" placeholder="Enter desc" class="form-control" required><?= $data['description']?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Upload Image</label>
                                                <input type ="file"    name="image" class="form-control" >
                                                <label for="">Current Image:</label>
                                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                                <img src="../uploads/<?= $data['image'] ?>" height="100px" width="100px" alt="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Status</label>
                                                <input type ="checkbox"  <?= $data['status']?"checked":"" ?> name="status" >
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Popular</label>
                                                <input type ="checkbox" <?= $data['popular']?"checked":"" ?> name="popular" >
                                            </div>
                                            <div class="col-md-12">
                                            
                                                <button type = "submit" class="btn btn-primary" name="update-category-btn">Update</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                        else
                        {
                                echo "Category not found";
                        }
                    }
                    else
                    {
                        echo"ID missing from url";
                    }
                    ?>
            </div>
        </div>
     </div>

  

    
        
<?php  include('footer.php')?>