<?php
session_start();
include 'Homework7sql.php';
?>

<html>
    
<head>
<title>Current Rotation</title>
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
<h2><a href="Homework7forum.php">Current Rotation: The Ultimate Band Forum</a></h2>
<input type="button" onclick="location.href='Homework7loginpage.php';" value="Log In"/>
<input type="button" onclick="location.href='Homework7forum.php';" value="Back to Categories"/>
    
<table>
	<tr>
        <th>Band</th><th>Description</th><th>Date</th><th>Created By</th>
    <tr>
        <?php
            $id = intval($_GET['categoryID']);

            $sql = "select Topic.topicID, Topic.topicTitle, Topic.topicDescription, Topic.topicDate, User.userName, Category.categoryTitle from Topic
            join User on Topic.userID = User.userID
            join Category on Topic.categoryID = Category.categoryID
            WHERE Topic.categoryID = ".$id;

            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($result);
            
            echo"<h4>".$row['categoryTitle']." Topics</b></h4>";

            if($result = mysqli_query($connect, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result))
                    {   
                        echo "<tr>";
                        $topicID = $row['topicID'];
                        echo "<td>".'<a href="Homework7replyview.php?topicID='.$topicID.'">'.$row['topicTitle'].'</a>'."</td>";
                        echo "<td>".$row["topicDescription"]."</td>";
                        echo "<td>".$row["topicDate"]."</td>";
                        echo "<td align='right'>".$row["userName"]."</td>";
                        echo "</tr>";
                    }
                }
            }
        ?>
    </tr>
</table>
</body>
</html>
