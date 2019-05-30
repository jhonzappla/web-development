<html>
<body>
<h1>The Squatty Potty</h1>

<?php
    /*This array will hold the application results*/
    $output = array();
    
    $host = "localhost";
	$user = "jtz12";
	$password = "4040271";
	$dbname = "jtz12";
	$connect = mysqli_connect($host, $user, $password, $dbname);
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    /*Output of application after successful validation*/
    if(isset($_POST['submit'])){
        validate_input();
        
        if(count($output) == 0){
            echo "Order Complete!";
            echo "<br>";
            $name = $_POST['Name'];
            $phone = $_POST['Phone'];
            $quantity = $_POST['Quantity'];
            $address = $_POST['Address'];
            $delivery = $_POST['Delivery'];
        
            // Check connection
            if (!$connect) {
                  die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "INSERT INTO squattyPottyOrder (customerName, customerAddress, customerPhone, customerDelivery, customerQty) VALUES ('$name', '$address', '$phone', '$delivery', '$quantity')";
            
            if (mysqli_query($connect, $sql)) {
                  echo "<br>";
                  echo "New order created successfully.";
            } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }
            mysqli_close($connect);
            
            echo "<br>";   
            echo "<br>";
            echo "<a href='Homework6product.php'>Back</a>";echo "<br>";
            echo "<a href='Homework6summary.php'>Summary Page</a>";
        }
        else{
            display_form();
        }
    }
    else{
        display_form();
    }

    /*Application validation function*/
    function validate_input(){
        global $output;

        /*Name validation*/
        $name = $_POST['Name'];
        if (isset($_POST['Name']) && !preg_match('/^(([a-zA-Z\s\']+)([\sa-zA-Z\']+))$/', $name)){
            $output['Name'] = 'The name you entered is invalid.';
        }

        /*Phone validation*/
        $phone = $_POST['Phone'];
        if ((is_null($_POST['Phone'])) || (!preg_match('/^[2-9]\d{2}-\d{3}-\d{4}$/', $phone))){
            $output['Phone'] = 'Please enter a valid phone number!';
        }
        
        /*Quantity validation*/
        $quantity = $_POST['Quantity'];
        if (isset($_POST['Quantity']) && !preg_match("/\d{1,10}/", $quantity) ) {
            $output['Quantity'] = 'The quantity you entered is invalid. You must buy 1 or up to 10.';
        }
        
        /*Address validation (street, city, state, zip)*/
        $address = $_POST['Address'];
        if (is_null($_POST['Address']) || !preg_match('/^(([a-zA-Z0-9\s|\.]+)[,]([a-zA-Z\s]+)[,]([a-zA-Z\s]+)[,](\s\d{5}))$/', $address)){
            $output['Address'] = 'The address you entered is invalid.';
        }
        
        /*Delivery validation*/
        if($_POST['Delivery'] == "N/A"){ 
            $output['Delivery'] = "Please select an area of Delivery.";
        }

    }
    
    /*Displaying validation message for fields */
    function display_form(){
        global $output; ?>
        
        <img src="06501c1b-0352-4ecf-8281-8c8f89d879fd_1.65f34b5f7997181bb3a422a4ec64e065-2.jpeg" alt="product" height="300" width="300">
    
        <ul>
        <li>The Original Squatty Potty - Made in U.S.A. As seen on Shark Tank and The Howard Stern Show</li>
        <li>If you are a new squatter, the 7” is a great place to start or if consider yourself an advanced squatter, a 9" Squatty Potty will work best. Younger children should use a 9 inch Squatty Potty while teenagers tend to prefer the 7 inch height</li>
        <li>The Squatty Potty may feel different at first, but the body quickly adjusts and the new healthy way of eliminating quickly becomes second nature</li>
        <li>Doctor recommended / endorsed, Strong and durable, Family-friendly and weight capacity-350 pounds</li>
        <li>Made of durable hard Polyurethane plastic, easy to clean, 2 sizes that work perfectly with ANY standard or comfort height toilet</li>    
        </ul>
            
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!--Name -->
            <br/>Name:<br/>
            <input name="Name" type="text" value="<?php if(isset($_POST['Name'])){echo $_POST['Name'];}?>"/><br/>
            <?php if(isset($output['Name'])){
                echo "<font color='red'>".$output['Name']."</font>";
                } ?><br/>    
            <!--Shipping Address -->
            <br/>Shipping Address (Ex: 421 Cool St., Pittsburgh, PA, 15213):<br/>
            <input name="Address" type="text" value="<?php if(isset($_POST['Address'])){echo $_POST['Address'];}?>"/><br/>
            <?php if(isset($output['Address'])){
                echo "<font color='red'>".$output['Address']."</font>";
                } ?><br/>
            <!--Phone Number - 3-->
            <br/>Phone Number (XXX-XXX-XXXX):<br/>
            <input name="Phone" type="text" value="<?php if(isset($_POST['Phone'])){echo $_POST['Phone'];}?>"/><br/>
            <?php if(isset($output['Phone'])){
                echo "<font color='red'>".$output['Phone']."</font>";
                } ?><br/>  
            <!--Delivery Method -->
            <br/>Delivery Method:<br/>
            <select name="Delivery">
                 <option value="N/A">N/A</option>
                 <option value="standard">Standard Shipping (5-7 business days)</option>
                 <option value="express">Express Shipping (1-2 business days)</option>
                 <option value="pickup">In-Store Pick-up</option>
            </select><br/>
            <?php if(isset($output['Delivery'])){
                echo "<font color='red'>".$output['Delivery']."</font>";
                } ?><br/>
            <!--Quantity -->
            <br/>Quantity: (10 max.)
            <input name="Quantity" type="text" value="<?php if(isset($_POST['Quantity'])){echo $_POST['Quantity'];}?>"/><br/>
            <?php if(isset($output['Quantity'])){
                echo "<font color='red'>".$output['Quantity']."</font>";
                } ?><br/>
            
            <input name="submit" type="submit" value="Submit"/><br/><br/>
            <a href='Homework6summary.php'>Summary Page</a>
        </form>
    
    <?php
        }
    ?>
</body>
</html>