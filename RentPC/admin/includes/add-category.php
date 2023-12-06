
<?php  

session_start();

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
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                       

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Name</label>
                                    <input type ="text" placeholder="Enter Category name" name="name" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea rows="3" name="description" placeholder="Enter desc" class="form-control" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload Image</label>
                                    <input type ="file" name="image" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Status</label>
                                    <input type ="checkbox" name="status" >
                                </div>
                                <div class="col-md-6">
                                    <label for="">Popular</label>
                                    <input type ="checkbox" name="popular" >
                                </div>
                                <div class="col-md-12">
                                
                                    <button type = "submit" class="btn btn-primary" name="add-category-btn">Save</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </div>

  

    
        
<?php  include('footer.php')?>