<?php include('partials/menu.php') ?>

<div class="main-content">
<div class="wrapper">
<h1>Manage Order</h1>

<br> <br> <br>

<?php
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
?>
<br><br>
<table class="tbl-full">
    <tr>
        <th>Serial No.</th>
        <th>Food</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Customer Name</th>
        <th>Contact No.</th>
        <th>Email</th>
        <th>Address</th>
        <th>Payment Method</th>
        <th>Actions</th>

    </tr>


    <?php
        //get all orders from database
        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; //will display latest order first
        //execute the query
        $res = mysqli_query($conn, $sql);
        //count the rows
        $count = mysqli_num_rows($res);

        $sn =1; //create a serial number and set its value as 1
        if($count>0)
        {
            //Order Available
            while($row=mysqli_fetch_assoc($res))
            {
                //get all the order details
                $id = $row['id'];
                $food = $row['food'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $total = $row['total'];
                $order_date = $row['order_date'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];
                $payment_method = $row['payment_method'];

                ?>

                <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $food; ?></td>
                <td><?php echo $price; ?></td>
                <td><?php echo $quantity; ?></td>
                <td><?php echo $total; ?></td>
                <td><?php echo $order_date; ?></td>

                <td>
                    <?php
                    
                    if($status=="Ordered")
                    {
                        echo "<label>$status</label>";
                    }
                    elseif($status=="On the Way")
                    {
                        echo "<label style='color: orange;'>$status</label>";
                    }
                    elseif($status=="Delivered")
                    {
                        echo "<label style='color: green;'>$status</label>";
                    }
                    elseif($status=="Cancelled")
                    {
                        echo "<label style='color: red;'>$status</label>";
                    }
                    ?>
                </td>

                <td><?php echo $customer_name; ?></td>
                <td><?php echo $customer_contact; ?></td>
                <td><?php echo $customer_email; ?></td>
                <td><?php echo $customer_address; ?></td>
                <td><?php echo $payment_method; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                
                </td>
                </tr>

                <?php

            }
        }
        else
        {
            //order not available
            echo "<tr><td colspan='13' class='error'>Orders Not Available</td></tr>";
        }

    ?>

    

   
</table>
</div>
   

</div>

<?php include('partials/footer.php') ?>