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
<h2><a href="Homework7forumlogin.php">Current Rotation: The Ultimate Band Forum</a></h2>
<?php
    $userName = $_SESSION['userName'];
    echo "Username: ".$userName;
    $id = intval($_GET['topicID']);
    $sql2 = "select categoryID from Topic where topicID=".$id;
    $cat_res = mysqli_query($connect, $sql2);
    $row2 = mysqli_fetch_array($cat_res);
?>
<br><br><input type="button" onclick="location.href='Homework7forum.php';" value="Log Out"/>
<input type="button" onclick="location.href='Homework7topiclogin.php?categoryID=<?php echo $row2['categoryID'];?>';" value="Back to Topics"/>

<table>
	<tr>
        <th align='left'>Reply</th><th>Date</th><th>Created By</th>
    <tr>
        <?php

            $sql = "select Reply.replyID, Reply.replyText, Reply.replyDate, User.userName, Topic.topicTitle from Reply
            join User on Reply.userID = User.userID
            join Topic on Reply.topicID = Topic.topicID
            WHERE Reply.topicID = ".$id;

            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($result);
            
            $sql1 = "select topicTitle from Topic where topicID=".$id;
            $title_res = mysqli_query($connect, $sql1);
            $row1 = mysqli_fetch_array($title_res);
            
            echo"<h4>".$row1['topicTitle']." Replies</b></h4>";

            if($result = mysqli_query($connect, $sql)){
                if(mysqli_num_rows($result) >= 0){
                    while($row = mysqli_fetch_assoc($result))
                    {   
                        echo "<tr>";
                        echo "<td>".$row['replyText']."</td>";
                        echo "<td>".$row["replyDate"]."</td>";
                        echo "<td align='right'>".$row["userName"]."</td>";
                        echo "</tr>";
                    }
                }
            }
        ?>
    </tr>
</table>
    
<br><input type="button" onclick="location.href='Homework7replycreatepage.php?topicID=<?php echo $id; ?>';" value="Create a Reply"/>
    
</body>
</html>