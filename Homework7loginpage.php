<?php
	session_start();
	include ('Homework7login.php');
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
    <h3>Log In</h3>
    <h5>Please enter a username and password</h5>
    <form method="post" action="Homework7loginpage.php">
        
    <p>User Name: 
    <input name="userName" type="text" value="<?php if(isset($_POST['userName'])){echo $_POST['userName'];}?>"/><br>
        <?php 
            if(isset($userNameError)){
                echo $userNameError;
            }
        ?>
        <br>
    </p>
        
    <p>Password:
    <input name="password" type="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>"/><br>
        <?php 
            if(isset($passwordError)){
                echo $passwordError;
            }
        ?>
        <br>
    </p>
        
    <input type="submit" name="login" value="Log In" /><br><br>
    <input type="button" onclick="location.href='Homework7forum.php';" value="Back"/>
    </form>
</body>
</html>
<?php
      unset($_SESSION['logged_in']);  
      session_destroy(); 
?>