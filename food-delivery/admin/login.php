<?php include('../config/constants.php'); ?>

<html>
    <head>
    <title>Login - Food Ordering System</title>
    <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Hot Stoppers Login</h1>
            <br><br>

            <?php

            if(isset($_SESSION['login']))
                {
                     echo $_SESSION['login'];
                     unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))

                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
               }

            ?>

            <br><br>
            
            <!-- Login Form Starts here-->

            <form action="" method="POST" class="text-center"> 

            Username 
            <input type="text" name="username" placeholder="Enter Username">
            <br><br>
            Password 
            <input type="password" name="password" placeholder="Enter Password">
            
            <br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>

            </form>

            <!-- Login Form Ends here-->

        </div>
    </body>
</html>

<?php

    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for login
        //Get the data from login form
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //sql to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //count rows to check whether the user exists or not

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user not available and Login success
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";

            $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it

            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //user not available and login fail
            $_SESSION['login'] = "<div class='error text-center'>Incorrect Password or Username</div>";
            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>
