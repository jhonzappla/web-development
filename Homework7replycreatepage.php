<?php
    include ('Homework7replycreate.php');
?>
<html>
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
<h2><a href="Homework7forumlogin.php">Current Rotation: Band Forum</a></h2>
<input type="button" onclick="location.href='Homework7forum.php';" value="Log Out"/>
    
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <!--Title -->
    <br/>Reply:<br/>
    <input name="Reply" type="text" style="width:300px;" value="<?php if(isset($_POST['Reply'])){echo $_POST['Reply'];}?>"/><br/>
    <?php if(isset($output['Reply'])){
        echo "<font color='red'>".$output['Reply']."</font>";
        } ?><br/>
    <input type="hidden" name="current_url" value="<?php echo intval($_GET['topicID']); ?>" />
    <input name="Submit" type="submit" value="Submit"/><br/><br/>
    <input type="button" onclick="location.href='Homework7replylogin.php?topicID=<?php echo intval($_GET['topicID']); ?>';" value="Cancel"/>
</form>
</body>
</html>