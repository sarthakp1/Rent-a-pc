<?php
session_start();
include('../config/dbcon.php');
include('myfunction.php');


if(isset($_POST['add-category-btn']))
{
    
    $name = $_POST['name'];
    $description =$_POST['description'];
    $status =  isset($_POST['status'])? '1':'0';
    $popular = isset($_POST['popular'])? '1':'0';
    
    $image =$_FILES['image']['name'];

    $path="../uploads";

    $image_ext=pathinfo($image,PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    $cate_query = "INSERT INTO categories(name,description,status,popular,image) VALUES ('$name','$description','$status','$popular','$filename')" ;

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        
        $_SESSION['message'] =  "Category added succesfully";
        redirect("add-category.php", "Category added succesfully");

    }
    else
    {   
        $_SESSION['message'] =  "Something went wrong";
        redirect("add-category.php", "Something went wrong");
    }

}
else if(isset($_POST['update-category-btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description =$_POST['description'];
    $status =  isset($_POST['status'])? '1':'0';
    $popular = isset($_POST['popular'])? '1':'0';
    
    $new_image =$_FILES['image']['name'];
    $old_image =$_POST['old_image'];

    if($new_image!="")
    {
        //$update_filename = $new_image;
        $image_ext=pathinfo($new_image,PATHINFO_EXTENSION);
        $update_filename= time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }
    
    $path="../uploads";

    $update_query = "UPDATE categories SET name='$name',description='$description',status='$status',popular='$popular' ,image='$update_filename' WHERE id='$category_id' ";


    $update_query_run = mysqli_query($con,$update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }

        redirect("edit-category.php?id=$category_id","Category updated successfully.");
    }
    else
    {
        redirect("edit-category.php?id=$category_id","Something went wrong");

    }
}
else if(isset($_POST['delete-category-btn']))
{
    $category_id = mysqli_real_escape_string($con,$_POST['category_id']);
    $category_query ="SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con,$category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }
        redirect("category.php","Category Deleted Successfully");
        
    }
    else
    {
        redirect("category.php","Something went Wrong!!");
        
    }





}

else if(isset($_POST['add-product-btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description =$_POST['description'];
    $price =  $_POST['price'];
    $image =$_FILES['image']['name'];
    $qty = isset($_POST['qty'])? '1':'0';
    $status =  isset($_POST['status'])? '1':'0';

    $path="../uploads";

    $image_ext=pathinfo($image,PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    if($name != "" && $description != "")
    {
        $product_query = "INSERT INTO products(category_id,name,description,price,image,qty,status) VALUES ('$category_id','$name','$description','$price','$filename','$qty','$status')";
        
        $product_query_run = mysqli_query($con,$product_query);

        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        
            redirect("add-product.php", "Product added succesfully");      
        }
        else
        {
            redirect("add-product.php", "Something went wrong");  
        }
    }
    else
    {
        redirect("add-product.php", "All fields are mandatory");  
    }
}
else if(isset($_POST['update-product-btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description =$_POST['description'];
    $price =$_POST['price'];
    $image =$_FILES['image']['name'];
    $qty = $_POST['qty'];
    $status =  isset($_POST['status'])? '1':'0';

    $path="../uploads";

    $new_image =$_FILES['image']['name'];
    $old_image =$_POST['old_image'];

    if($new_image!="")
    {
        //$update_filename = $new_image;
        $image_ext=pathinfo($new_image,PATHINFO_EXTENSION);
        $update_filename= time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }
    
    $update_product_query="UPDATE products SET category_id='$category_id', name='$name', price='$price', description='$description', image='$update_filename', qty='$qty', status = '$status'  WHERE id='$product_id' ";
    $update_product_query_run = mysqli_query($con,$update_product_query);

    if($update_product_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("edit-product.php?id=$product_id","Product updated successfully.");
    }
    else
    {
        redirect("edit-product.php?id=$product_id","Something went wrong");
    }
}
else if(isset($_POST['delete-product-btn']))
{
    $product_id = mysqli_real_escape_string($con,$_POST['product_id']);

    $product_query ="SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con,$product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
        {
            unlink("../uploads/".$image);
        }
        redirect("products.php","Product Deleted Successfully");
        
    }
    else
    {
        redirect("products.php","Something went Wrong!!");
       
    }    
}
else
{
    header('Location: ../index.php');
}

?>
