<?php
    //include constants file
    include('../config/constants.php');
    //echo"Delete Page";
    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // get the value and delete
        //echo "Get Value and Delete";
        $id=$_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file if available
        //delete data from database
        //redirect to manage category page with message
        if($image_name !="")
        {
            //image is available and remove it
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image</div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }

        }

        //Delete the data from database
        //sql query to delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        //execute the query
        $res = mysqli_query($conn, $sql);
        //check whether the data is deleted from database
        if($res==true)
        {
            //Set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully</div";
            //redirect to manage category page
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //set fail message
             $_SESSION['delete'] = "<div class='error'>Failed to Delete Category</div";
             //redirect to manage category page
             header('location:'.SITEURL.'admin/manage-category.php');
        }

    }

    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');

    }
?>