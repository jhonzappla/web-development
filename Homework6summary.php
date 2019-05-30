<html>
<body>
    <h1>Summary Page</h1>
        <?php
        $host = "localhost";
        $user = "jtz12";
        $password = "4040271";
        $dbname = "jtz12";
        $connect = mysqli_connect($host, $user, $password, $dbname);
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);}
        
        ?>
        
        <table class="lastOrdered">
            <tr class="header"><h3>Sorted by Last Ordered</h3>
                <td>ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Delivery</td>
                <td>Quantity</td>
            </tr>
            <?php
            $query = "Select*from squattyPottyOrder order by orderID desc";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0){
               while ($row = mysqli_fetch_assoc($result)) {
                   echo "<tr>";
                   echo "<td>".$row["orderID"]."</td>";
                   echo "<td>".$row["customerName"]."</td>";
                   echo "<td>".$row["customerAddress"]."</td>";
                   echo "<td>".$row["customerPhone"]."</td>";
                   echo "<td>".$row["customerDelivery"]."</td>";
                   echo "<td>".$row["customerQty"]."</td>";
                   echo "</tr>";
               }
            } 
            else{
                  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }

            ?>
        </table>
    <br/><br/>
        <table class="firstOrdered">
            <tr class="header"><h3>Sorted by First Ordered</h3>
                <td>ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Delivery</td>
                <td>Quantity</td>
            </tr>
            <?php
            $query = "Select*from squattyPottyOrder order by orderID asc";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0){
               while ($row = mysqli_fetch_assoc($result)) {
                   echo "<tr>";
                   echo "<td>".$row["orderID"]."</td>";
                   echo "<td>".$row["customerName"]."</td>";
                   echo "<td>".$row["customerAddress"]."</td>";
                   echo "<td>".$row["customerPhone"]."</td>";
                   echo "<td>".$row["customerDelivery"]."</td>";
                   echo "<td>".$row["customerQty"]."</td>";
                   echo "</tr>";
               }
            } 
            else{
                  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }

            ?>
        </table>
      <br/><br/>  
        <table class="mostOrdered"><h3>Sorted by Most Amount Ordered</h3>
            <tr class="header">
                <td>ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Delivery</td>
                <td>Quantity</td>
            </tr>
            <?php
            $query = "Select*from squattyPottyOrder order by customerQty desc;";
            $result = mysqli_query($connect, $query);
            if (mysqli_num_rows($result) > 0){
               while ($row = mysqli_fetch_assoc($result)) {
                   echo "<tr>";
                   echo "<td>".$row["orderID"]."</td>";
                   echo "<td>".$row["customerName"]."</td>";
                   echo "<td>".$row["customerAddress"]."</td>";
                   echo "<td>".$row["customerPhone"]."</td>";
                   echo "<td>".$row["customerDelivery"]."</td>";
                   echo "<td>".$row["customerQty"]."</td>";
                   echo "</tr>";
               }
            } 
            else{
                  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }

            ?>
        </table>
</body>
</html>