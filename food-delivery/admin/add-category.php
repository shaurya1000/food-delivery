<?php include('partials/menu.php');?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>

<br><br>

<?php

    if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }
?>


<br><br>

<!-- Add Category Form Starts -->
<form action="" method="POST" enctype="multipart/form-data">

    <table class="tbl-30">
        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="title" placeholder="Category Title">
            </td>

        </tr>
            <td>Select Image</td>
            <td>
                <input type="file" name="image" >
            </td>
        <tr>

        </tr>
        <tr>
            <td>Featured</td>
            <td>
                <input type="radio" name= "featured" value="Yes"> Yes
                <input type="radio" name= "featured" value="No"> No
            </td>
        </tr>

        <tr>
            <td>Active</td>
            <td>
                <input type="radio" name= "active" value="Yes"> Yes
                <input type="radio" name= "active" value="No"> No
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Category" class="btn-secondary">
            </td>
        </tr>
    </table>


</form>
<!-- Add Category Form Ends -->

<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //echo "Clicked";
    //get the values from Category form 
    $title = $_POST['title'];
    //for radio input type, we need to check whether the button is selected or not 
    if(isset($_POST['featured']))
    {
        //get the value from form
        $featured = $_POST['featured'];
    }
    else
    {
        //set the default value
        $featured = "No";
    }

    if(isset($_POST['active']))
    {
        //get the value from form
        $active = $_POST['active'];
    }
    else
    {
        //set the default value
        $active = "No";
    }

    //check whether the image is selected or not and set the value for image name

    //print_r($_FILES['image']); //using print because echo does not display array values

    //die(); //break the code here

    if(isset($_FILES['image']['name']))
    {
        //upload the image
        //to upload the image we need image name, souce path and destination path
        $image_name = $_FILES['image']['name'];

        //upload image only if image is selected

        if($image_name != "")
        {

        

        //auto rename our image

        //get the extension of our image(jpg, png,gif,etc.) e.g. special.food1.jpg

        $ext = end(explode('.', $image_name));

        //rename the image
        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; //example Food_Category_834.jpg
        


        $source_path = $_FILES['image']['tmp_name'];

        $destination_path = "../images/category/".$image_name;

        //finally upload the iamge
        $upload = move_uploaded_file($source_path, $destination_path);
        //check whether the image is uploaded or not
        //and if the image is not uploaded then we will stop the process and redirect with error message
        if($upload==false)
        {
            //set message
            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
            //redirect to add category page
            header('location:'.SITEURL.'admin/add-category.php');
            //stop the process
            die();

        }

    }

    }
    else
    {
        //dont upload the image and set the image name value as blank
        $image_name="";
    }
    

    //create sql query to insert category into database
    $sql = "INSERT INTO tbl_category SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
    ";

    //Execute the query and save in database
     $res = mysqli_query($conn, $sql);
     //check whether the query executed or not adn data added or not
     if($res==true)
     {
         //query executed
         $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
         //redirect to category page
         header('location:'.SITEURL.'admin/manage-category.php');

     }
     else
     {
        //failed to add category
        $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
        //redirect to category page
        header('location:'.SITEURL.'admin/add-category.php');

     }


}

?>

</div>

</div>

<?php include('partials/footer.php');?>