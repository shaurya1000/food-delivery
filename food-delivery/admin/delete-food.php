<?php 
    //include constants page
    include('../config/constants.php');

    //echo "Delete Food Page";
    //check whetehr value is passed or not
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //process to delete
        //echo "Process to Delete";
        //get id and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove image if available
        //check whether image is avialble or not and delete if avialble
        if($image_name !="")
        {
            //it has image nad need to remove from folder
            //get image path
            $path = "../images/food/".$image_name;

            //remove image file from folder
            $remove = unlink($path);

            //check whether image is removed or not
            if($remove==false)
            {
                //failed to remove image
                $_SESSION['upload'] = "<div class= 'error'>Failed to Remove Image</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process of deleting food
                die();
            }
        }

        //delete food from database 
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //execute the query
        $res = mysqli_query($conn, $sql);

        //check whether the query is executed or not and set session message
        //redirect to manage food with session message
        if($res==true)
        {
            //food deleted
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

    }
    else
    {
        //redirect to manage food
        //echo "Redirect";
        $_SESSION['unauthorize'] = "<div class ='error'>Unauthorized Access</div>";
        header('location:'.SITEURL.'admin/manange-admin.php');
    }
?>