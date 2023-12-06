
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
                <?php 
                    if(isset($_GET['id']))
                    {
                        $id = $_GET['id'];

                        $product = getByID("products",$id);

                        if (mysqli_num_rows($product)> 0)
                        {
                            $data = mysqli_fetch_array($product);
                            ?>
                                <div class="card">
                            <div class="card-header">
                                <h4>Edit Product</h4>
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
                                                                <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?> ><?= $item['name']; ?></option>
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
                                        <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                        <div class="col-md-12">
                                            <label class="mb-0">Name</label>
                                            <input type ="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter Product name" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Description</label>
                                            <textarea rows="3" name="description" placeholder="Enter description" class="form-control mb-2" required><?= $data['description']?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-0">Price</label>
                                            <input type ="text" value="<?= $data['price']; ?>" placeholder="Enter price" name="price" class="form-control mb-2" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-0">Upload Image</label>
                                            <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                            <input type ="file" name="image" class="form-control mb-2">
                                            <label class="mb-0">Current Image</label>
                                            <img src="../uploads/<?= $data['image']; ?>" alt="product image" height="50px" width="50px">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Quantity</label>
                                            <input type ="number"  name="qty" value="<?= $data['qty']; ?>" placeholder="Enter Quantity" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-12">
                                        <div class="col-md-6">
                                                <label for="">Status</label>
                                                <input type ="checkbox"  <?= $data['status']?"checked":"" ?> name="status" >
                                            </div>
                                        
                                            <button type = "submit" class="btn btn-primary" name="update-product-btn">Update</button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                                </div>
                            <?php 
                        }
                        else
                        {
                            echo"Product not found for given id";
                        }
                    }
                    else
                    {
                        echo"Id missing from url";
                    }
                ?>
            </div>
        </div>
    </div>
        
<?php 
include('footer.php')
?>