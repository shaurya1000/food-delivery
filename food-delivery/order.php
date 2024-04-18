<?php include('partials-front/menu.php'); ?>

<?php
    //check whether food id is saved or not
    if(isset($_GET['food_id']))
    {
        //get the food id and details of the id
        $food_id = $_GET['food_id'];
        //get the details of the food item
        $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
        //execute the query
        $res = mysqli_query($conn, $sql);
        //count rows
        $count = mysqli_num_rows($res);
        //check whetehr data is available or not
        if($count==1)
        {
            //food data available
            //get data from database
            $row= mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];


        }
        else
        {
            //food data not available
            header('location:'.SITEURL);
        }

    }
    else
    {
        //redirect to home page
        header('location:'.SITEURL);
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container-search">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend class="text-white">Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                            //check whether the image is availalbe or not
                            if($image_name=="")
                            {
                                //image not available
                                echo "<div class='error'>Image Not Available</div>";
                            }
                            else
                            {
                                //image available
                                ?>
                                     <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawaiian Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                       
                    </div>
    
                    <div class="food-menu-desc">
                        <h3 class="text-white"><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="food-price text-white">Rs.<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label text-white">Quantity</div>
                        <input type="number" name="quantity" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend class="text-white">Delivery Details</legend>
                    <div class="order-label text-white">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Karan Sarao" class="input-responsive" required>

                    <div class="order-label text-white">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 98765*****" class="input-responsive" required>

                    <div class="order-label text-white">Email</div>
                    <input type="email" name="email" placeholder="E.g. Karanraj.Sarao@student.ufv.ca" class="input-responsive" required>

                    <div class="order-label text-white">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    
                    <div class="order-label text-white">Payment Method</div>
                    <input type="text" name="payment" placeholder="Please enter Cash/Credit Card/Debit Card/UPI" class="input-responsive" required>


                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
                //check wheter submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    //get all the details from the form
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $total = $price * $quantity;
                    $order_date = date("Y-m-d h:i:sa");//order date and time
                    $status = "Ordered"; //ordered, On delivery, Delivered, Cancelled
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];
                    $payment_method = $_POST['payment'];


                    //save the order in database
                    //create sql to save the data
                    $sql2 = "INSERT INTO tbl_order SET
                        food = '$food',
                        price = $price,
                        quantity = $quantity,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address',
                        payment_method = '$payment_method'

                    
                    ";

                    //echo $sql2; die();
                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);
                    //check whether query executed successfully or not
                    if($res2==true)
                    {
                        //query executed and order saved
                        $_SESSION['order'] = "<div class='success text-center'>Order Placed Successfully</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //failed to save order
                        $_SESSION['order'] = "<div class='error text-center'>Failed To Place Order</div>";
                        header('location:'.SITEURL);
                    }
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>