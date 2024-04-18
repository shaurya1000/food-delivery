<?php

//include constants.php file here

include('../config/constants.php');

// get the ID of admin to be deleted
$id = $_GET['id'];

//create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//execute the query
$res = mysqli_query($conn, $sql);

//check whether the query is executed successfully
if($res==true)
{
    //query executed successfully and admin deleted
    //echo "Admin Deleted";
    //create session variable to display message 
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
    //redirect to admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    //failed to delete admin
    //echo "Failed to delete admin";

    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}
//Redirect to manage admin page with message (success or error)

?>