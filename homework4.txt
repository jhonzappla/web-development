<html>
<body>
<h1>Job Application</h1>

<?php
    /*This array will hold the application results*/
    $output = array();

    /*Output of application after successful validation*/
    if(isset($_POST['submit'])){
        validate_input();
        
        if(count($output) == 0){
            echo "<br>";
            echo "<br/>Application has been submitted!<br/>";
            echo "<br>";
            echo "Name:"." ".$_POST['Name'];
            echo "<br>";
            echo "Date of Birth:"." ".$_POST['DOB'];
            echo "<br>";
            echo "Phone Number:"." ".$_POST['Phone'];
            echo "<br>";
            echo "Email:"." ".$_POST['Email'];
            echo "<br>";
            echo "Address:"." ".$_POST['Address'];
            echo "<br>";
            echo "College:"." ".$_POST['College'];
            echo "<br>";
            echo "Interest:"." ".$_POST['Interest'];
            echo "<br>";
            echo "Seniority Level:"." ".$_POST['Seniority'];
            echo "<br>";
            echo "Location Preferences:"." ";
            $list = array();
                foreach($_POST['Loc'] as $arr){
                  array_push($list, $arr);}
                  echo implode(", ",$list);   
            echo "<br>";
            echo "<a href='Homework4app.php'>Back</a>";
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

        /*Date of birth validation*/
        $DOB = $_POST['DOB'];
        if((is_null($_POST['DOB'])) || (!preg_match('/^(([1-2][0-9])|([1-9]))[\/-]([3][01]|[12]\d|[0]?[1-9])[\/-](\d{4}|\d{2})$/',$DOB))){ 
            $output['DOB'] = "Please enter a date in MM/DD/YYYY format!";
        }

        /*Phone validation*/
        $phone = $_POST['Phone'];
        if ((is_null($_POST['Phone'])) || (!preg_match('/^[2-9]\d{2}-\d{3}-\d{4}$/', $phone))){
            $output['Phone'] = 'Please enter a valid phone number!';
        }
        
        /*Email validation*/
        $email = $_POST['Email'];
        if (isset($_POST['Email']) && !preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $email)) {
            $output['Email'] = 'The email you entered is invalid.';
        }
        
        /*Address validation (street, city, state, zip, country)*/
        $address = $_POST['Address'];
        if (is_null($_POST['Address']) || !preg_match('/^(([a-zA-Z0-9\s|\.]+)[,]([a-zA-Z\s]+)[,](\s[A-Z]{2})[,](\s\d{5})[,](\s[A-Z]{50}))$/', $address)){
            $output['Address'] = 'The address you entered is invalid.';
        }
        
        /*College validation*/
        $college = $_POST['College'];
        if ($_POST['College'] == ''){
            $output['College'] = 'The college you entered is invalid.';
        }
        
        /*Interest validation*/
        if($_POST['Interest'] == "N/A"){ 
            $output['Interest'] = "Please select an area of interest.";
        }

        /*Seniority validation*/
        if(!isset($_POST['Seniority'])){ 
            $output['Seniority'] = "Selected option is invalid!";
        }
        
        /*Location validation*/
        if(!isset($_POST['Loc'])){
            $output['Loc'] = "Selected location(s) is invalid!";
        }
    }
    
    /*Displaying validation message for fields */
    function display_form(){
        global $output; ?>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!--Name - 1-->
            <br/>Name:<br/>
            <input name="Name" type="text" value="<?php if(isset($_POST['Name'])){echo $_POST['Name'];}?>"/><br/>
            <?php if(isset($output['Name'])){
                echo "<font color='red'>".$output['Name']."</font>";
                } ?><br/>    
            <!--DOB - 4--> 
            <br/>Date of Birth (MM/DD/YYYY):<br/>
            <input name="DOB" type="text" value="<?php if(isset($_POST['DOB'])){echo $_POST['DOB'];} ?>"/><br/>
            <?php if(isset($output['DOB'])){
                echo "<font color='red'>".$output['DOB']."</font>";
                } ?><br/>
            <!--Address - 2-->
            <br/>Address (Street, City, State(Abrev.), Zip Code, Country):<br/>
            <input name="Address" type="text" value="<?php if(isset($_POST['Address'])){echo $_POST['Address'];}?>"/><br/>
            <?php if(isset($output['Address'])){
                echo "<font color='red'>".$output['Address']."</font>";
                } ?><br/>   
            <!--University - 1 text-->
            <br/>College/University:<br/> 
            <input name="College" type="text" value="<?php if(isset($_POST['College'])){echo $_POST['College'];}?>"/><br/> 
            <?php if(isset($output['College'])){
                echo "<font color='red'>".$output['College']."</font>";
                } ?><br/>   
            <!--Interest - 2 drop down-->
            <br/>Area of interest:<br/>
            <select name="Interest">
                 <option value="N/A">N/A</option>
                 <option value="Game">Game and Simulation Development</option>
                 <option value="Human Centered">Human Centered Computing</option>
                 <option value="Data">Data Analytics</option>
                 <option value="Security">Networks and Security</option>
            </select>
            <?php if(isset($output['Interest'])){
                echo "<font color='red'>".$output['Interest']."</font>";
                } ?><br/>
            <!--Phone Number - 3-->
            <br/>Phone Number (XXX-XXX-XXXX):<br/>
            <input name="Phone" type="text" value="<?php if(isset($_POST['Phone'])){echo $_POST['Phone'];}?>"/><br/>
            <?php if(isset($output['Phone'])){
                echo "<font color='red'>".$output['Phone']."</font>";
                } ?><br/>  
            <!--Email - 1 text-->
            <br/>Email:<br/>
            <input name="Email" type="text" value="<?php if(isset($_POST['Email'])){echo $_POST['Email'];}?>"/><br/>
            <?php if(isset($output['Email'])){
                echo "<font color='red'>".$output['Email']."</font>";
                } ?><br/>
            <!--Job Seniority Levels - 3 radio-->
            <br/>Which seniority best describes you?<br/>
            <input name="Seniority" type="radio" value="Entry" <?php if (isset($_POST['Seniority']) && $_POST['Seniority'] == "Entry") echo 'checked="checked"';?>/>Entry Level<br/>
            <input name="Seniority" type="radio" value="Inter" <?php if (isset($_POST['Seniority']) && $_POST['Seniority'] == "Inter") echo 'checked="checked"';?>/>Intermediate<br/>
            <input name="Seniority" type="radio" value="MidLevel" <?php if (isset($_POST['Seniority']) && $_POST['Seniority'] == "MidLevel") echo 'checked="checked"';?>/>Middle Level<br/>
            <input name="Seniority" type="radio" value="Senior" <?php if (isset($_POST['Seniority']) && $_POST['Seniority'] == "Senior") echo 'checked="checked"';?>/>Senior<br/>
            <?php if(isset($output['Seniority'])){
                echo "<font color='red'>".$output['Seniority']."</font>";
                } ?><br/>  
            <!--Location Preference - 4 checkbox-->
            <br/>Location Preference:<br/>
            <input type="checkbox" name="Loc[]" value="DEN" <?php if (!empty($_POST['Loc']) && in_array("DEN", $_POST['Loc'])) echo 'checked'; ?>/>Denver<br/>
            <input type="checkbox" name="Loc[]" value="LA" <?php if (!empty($_POST['Loc']) && in_array("LA", $_POST['Loc'])) echo 'checked'; ?>/>Los Angeles<br/>
            <input type="checkbox" name="Loc[]" value="ATX" <?php if (!empty($_POST['Loc']) && in_array("ATX", $_POST['Loc'])) echo 'checked'; ?>/>Austin<br/>
            <input type="checkbox" name="Loc[]" value="SEA" <?php if (!empty($_POST['Loc']) && in_array("SEA", $_POST['Loc'])) echo 'checked'; ?>/>Seattle<br/>
            <input type="checkbox" name="Loc[]" value="NY" <?php if (!empty($_POST['Loc']) && in_array("NY", $_POST['Loc'])) echo 'checked'; ?>/>New York City<br/>
            <?php if(isset($output['Loc'])){
                echo "<font color='red'>".$output['Loc']."</font>";
                } ?><br/> 
            <input name="submit" type="submit" value="Submit"/>
        </form>
    
    <?php
        }
    ?>
</body>
</html>