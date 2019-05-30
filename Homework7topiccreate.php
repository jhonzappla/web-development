<html>
<head>
<title>Create Topic</title>
</head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>
<body>
<h2><a href="Homework7forumlogin.php">Current Rotation: The Ultimate Band Forum</a></h2>
<input type="button" onclick="location.href='Homework7forum.php';" value="Log Out"/>

<?php   
    session_start();
	include ('Homework7sql.php');
    
    $output = array();

	if(isset($_POST['Submit'])){
		validate_input();
		
		if(count($output) == 0){	
            $topic = $_POST['Topic'];
            $description = $_POST['Description'];
            $category = $_POST['current_url'];
            $date = date('Y-m-d');
			$userID = $_SESSION['userID'];

			$sql = "INSERT INTO Topic (`topicTitle`, `topicDescription`,`topicDate`, `userID`, `categoryID`) VALUES('$topic', '$description', '$date', '$userID' ,'$category')";

			if (mysqli_query($connect, $sql)) {
              header("Location:Homework7topiclogin.php?categoryID=$category");
                exit;
            } 
            else {
              echo "<br>"."Error: " . $sql . "<br>" . mysqli_error($connect);
            }
            mysqli_close($connect);
		}
        else{
                display_form();
        }
    }
    else{
        display_form();
    }
    
	function validate_input(){
        global $output;
        //Title validation
        $title = $_POST['Topic'];
        if (empty($_POST['Topic']) || !preg_match('/(([a-zA-Z0-9\s\!\@\#\$\%\^\&\*\(\)\<\>\?\{\|\}\~\.\:\;\,\[\]\"\'])+)/', $title)){
            $output['Title'] = 'Title is invalid';
        }

        //Category validation
        //if($_POST['Category'] == "N/A"){ 
        //    $output['Category'] = "Please select Category";
        //}

        //Content validation
        $description = $_POST['Description'];
        if (strlen($_POST['Description']) == 0 || !preg_match('/(([a-zA-Z0-9\s\!\@\#\$\%\^\&\*\(\)\<\>\?\{\|\}\~\.\:\;\,\[\]\"\'])+)/', $description)){
            $output['Description'] = 'Description is invalid';
        }
    }
    function display_form(){
        global $output; ?>
            
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!--Title -->
            <br/>Title:<br/>
            <input name="Topic" type="text" value="<?php if(isset($_POST['Topic'])){echo $_POST['Topic'];}?>"/><br/>
            <?php if(isset($output['Topic'])){
                echo "<font color='red'>".$output['Topic']."</font>";
                } ?><br/>
            
            <!--Category 
            <br/>Category:<br/>
            <select name="Category">
                 <option value="N/A">N/A</option>
                 <option value="1">New Alternative</option>
                 <option value="2">Classic Rock</option>
                 <option value="3">New Wave</option>
            </select><br/>
            <?php //if(isset($output['Category'])){
                //echo "<font color='red'>".$output['Category']."</font>";
                //} ?><br/>-->
            
            <!--Description -->
            <br/>Description:<br/>
            <input name="Description" type="text" style="width:300px;" value="<?php if(isset($_POST['Description'])){echo $_POST['Description'];}?>"/><br/>
            <?php if(isset($output['Description'])){
                echo "<font color='red'>".$output['Description']."</font>";
                } ?><br/><br/>
            
            <input type="hidden" name="current_url" value="<?php echo intval($_GET['categoryID']); ?>" />
            <input name="Submit" type="submit" value="Submit"/><br/><br/>
            <input type="button" onclick="location.href='javascript:history.back()';" value="Cancel"/>
        </form>
    
    <?php
        }
    ?>
</body>
</html>