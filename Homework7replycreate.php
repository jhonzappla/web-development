<?php   
    session_start();
	include ('Homework7sql.php');
    
    $output = array();

	if(isset($_POST['Submit'])){
		validate_input();
		
		if(count($output) == 0){	
            $reply = $_POST['Reply'];
            $topic = $_POST['current_url'];
            $date = date('Y-m-d');
			$userID = $_SESSION['userID'];

			$sql = "INSERT INTO Reply (`replyText`,`replyDate`, `userID`, `topicID`) VALUES('$reply', '$date', '$userID' ,'$topic')";

			if (mysqli_query($connect, $sql)) {
              echo "<br>"."<br>"."Reply Complete!";
              echo "<br>";
            } 
            else {
              echo "<br>"."Error: " . $sql . "<br>" . mysqli_error($connect);
            }
            mysqli_close($connect);
            
            header("Location:Homework7replylogin.php?topicID=$topic");
            exit;
		}
    }
    
	function validate_input(){
        global $output;
        //Reply validation
        $title = $_POST['Reply'];
        if (empty($_POST['Reply']) || !preg_match('/(([a-zA-Z0-9\s\!\@\#\$\%\^\&\*\(\)\<\>\?\{\|\}\~\.\:\;\,\[\]\"\'])+)/', $title)){
            $output['Title'] = 'Reply is invalid';
        }

    }
?>