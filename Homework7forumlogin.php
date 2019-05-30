<!DOCTYPE html>
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
    session_start();
    $userName = $_SESSION['userName'];
    echo "Welcome back to Current Rotation ".$userName."!";
?>
<h4><input type="button" onclick="location.href='Homework7forum.php';" value="Log Out"/></h4>

    <table>
	<tr>
    	<th>Genres</th><th>Description</th>
    <tr>
    <tr>
        <td><a href="Homework7topiclogin.php?categoryID=1">New Alternative</a></td>
        <td>Discover bands that are hot in today's alternative scene.</td>
    </tr>
    <tr>
        <td><a href="Homework7topiclogin.php?categoryID=2">Classic Rock</a></td>
        <td>Read about the bands that shaped the music industry forever.</td>
    </tr>
    <tr>
        <td><a href="Homework7topiclogin.php?categoryID=3">New Wave</a></td>
        <td>Explore the bands that set a new definitions for weird and unnatural.</td>
    </tr>
    </table>
</body>
</html>