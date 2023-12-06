
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
                        <h4>Add Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Select Category</label>
                                    <select name="category_id"class="form-select mb-2">
                                        <option selected>Select Category</option>
                                        
                                        <?php
                                            $categories = getAll("categories");
                                            if(mysqli_num_rows($categories)>0)
                                            {
                                                foreach ($categories as $item) {
                                                    ?>
                                                        <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo"No category available";
                                            }
                                    
                                        ?>
                                    </select>                                
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Name</label>
                                    <input type ="text" required name="name"  placeholder="Enter Product name" class="form-control mb-2">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea rows="3" name="description" placeholder="Enter description" class="form-control mb-2" required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <input type ="text" placeholder="Enter price" name="price" class="form-control mb-2" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type ="file" name="image" class="form-control mb-2" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Quantity</label>
                                    <input type ="number" required name="qty" placeholder="Enter Quantity" class="form-control mb-2">
                                
                               
                                    <label for="">Status</label>
                                    <input type ="checkbox" name="status" >
                                </div>
                                <div class="col-md-12">
                                
                                    <button type = "submit" class="btn btn-primary" name="add-product-btn">Save</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
<?php 
include('footer.php')
?>