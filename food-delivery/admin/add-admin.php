<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
        if(isset($_SESSION['add']))
        {
          echo $_SESSION['add'];  //displaying session message
          unset($_SESSION['add']); //removing session message
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>





<?php include('partials/footer.php') ?>


<?php

//Process the value from form to database

//Check whetehr the submit button is clicked or not

if (isset($_POST['submit'])) {
    // Button Clicked
    //echo "Button Clicked";

    //Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password md5 encryption 

    //SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";

    //executing query and saving data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //check whether the (query is executed or not) data is inserted or not and display an appropriate message
if($res==TRUE)
{
    //Data inserted
    //echo "Data Inserted";
    //Create a Session Variable to display message 
    $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
    //Redirect page to manage admin page
    header("location:".SITEURL.'admin/manage-admin.php');

}
else
{
    //Failed to insert data
    //echo"Failed to Insert Data";
    //Create a Session Variable to display message 
    $_SESSION['add'] = "<div class='error'>Failed to add Admin</div>";
    //Redirect page to add admin page
    header("location:".SITEURL.'admin/manage-add.php');
}
}

?>