<?php
    $answer1 = $_POST['q1'];
    $answer2 = $_POST['q2'];
    $answer3 = $_POST['q3'];
    $answer4 = $_POST['q4'];
    $answer5 = $_POST['q5'];
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];

    $totalCorrect = 0;
    
    if ($answer1 == "Huron, Ontario, Michigan, Erie, Superior"){ $totalCorrect++; }
       
    if ($answer2 == " Missouri") { $totalCorrect++; }

    // User must select BOTH Vermont and Rhode Island to receive 1 point
    if (in_array(" Vermont",$answer3) && in_array(" Rhode Island",$answer3)) { $totalCorrect++; }

    if ($answer4 == " Rhode Island") { $totalCorrect++; }
        
    if ($answer5 == " Colorado") { $totalCorrect++; }
    
    echo $first." ".$last."<br>";
    $date = new DateTime();
    echo $date->format('Y-m-d H:i:s T')."<br><br>";

    // There is a score out of 5 with the amount of correct answers, along with the percentage of that score
    // If the user gets a 5/5, there will be a custom message below the score congratulating
    echo $totalCorrect." / 5 Correct<br>";
    echo "Score: ".(($totalCorrect / 5)*100)."%<br><br>";
    if ($totalCorrect == 5) { echo "Congratulations! You got a perfect score!<br><br>"; }
    
    // Correct answer along with the user's answer
    echo "<br>1. What are the 5 Great Lakes?<br><br>";
    if ($answer1 == "Huron, Ontario, Michigan, Erie, Superior"){ echo "Correct!<br>";}
    if ($answer1 !== "Huron, Ontario, Michigan, Erie, Superior"){ echo "Incorrect<br>";}
    echo "Your answer: ".$answer1."<br>";
    echo "The answer is: Huron, Ontario, Michigan, Erie, Superior<br><br><br>";

    echo "2. Which state's capital is Jefferson City?<br><br>";
    if ($answer2 == " Missouri"){ echo "Correct!<br>";}
    if ($answer2 !== " Missouri"){ echo "Incorrect<br>";}
    echo "Your answer: ".$answer2."<br>";
    echo "The answer is: Missouri<br><br><br>";

    // Will print the array of Q3 which was the checkbox
    echo "3. Which state(s) are in the New England region?<br><br>";
    if (in_array(" Vermont",$answer3) && in_array(" Rhode Island",$answer3)) { echo "Correct!<br>"; }
    else{ echo "Incorrect<br>";}
    echo "Your answer: ";
    foreach($answer3 as $selected) { echo $selected." "; }
    echo "<br>The answer is: Vermont and Rhode Island<br><br><br>";
    
    echo "4. Which is the smallest state?<br><br>";
    if ($answer4 == " Rhode Island") { echo "Correct!<br>"; }
    if ($answer4 !== " Rhode Island") { echo "Incorrect<br>"; }
    echo "Your answer: ".$answer4."<br>";
    echo "The answer is: Rhode Island<br><br><br>";
    
    echo "5. Which state has the longest continuous street in America, Colfax Avenue?<br><br>";
    if ($answer5 == " Colorado") { echo "Correct!<br>"; }
    if ($answer5 !== " Colorado") { echo "Incorrect<br>"; }
    echo "Your answer: ".$answer5."<br>";
    echo "The answer is: Colorado<br><br><br>"; 

    // program will write the answers, name, and timestamp onto txt file
    $content = $content = sprintf($first." ".$last.' '.$date->format('Y-m-d H:i:s T').' '.$totalCorrect.' '.$answer1.' '.$answer2.' '.$answer3.' '.$answer4.' '.$answer5.";");
    file_put_contents("Homework3history.txt", $content, FILE_APPEND);
?>
<html> <div id="button"><a href="Homework3history.php">History of Results</a></div></html>