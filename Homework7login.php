<?php
include 'Homework7sql.php';

$username = "";
$password = "";
$output = array();

if(isset($_POST['login'])){
    validate_input();

    $username = $_POST['userName'];
    $password = $_POST['password'];

    $sqlusername = "SELECT * FROM User WHERE binary userName='$username'";
    $userResult = mysqli_query($connect, $sqlusername);
    $sqlpassword = "SELECT * FROM User WHERE binary password='$password'";
    $passResult = mysqli_query($connect, $sqlpassword);

    if(count($output) == 0){
        if (mysqli_num_rows($userResult) != 1){
            $userNameError = "Incorrect Username"; 
        }
        elseif(mysqli_num_rows($passResult) != 1){
            $passwordError = "Incorrect Password"; 
        }
        else{
            ob_start();	

            if(mysqli_num_rows($userResult) > 0){
                while($row = mysqli_fetch_assoc($userResult)){
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['userName'] = $row['userName'];
                }
            }

            $_SESSION['logged_in'] = "login";
            header("Location:Homework7forumlogin.php");
            exit;
        }
    }
}
function validate_input(){
    global $output;
    
    /*Username valid */
    $username = $_POST['userName'];
    if (isset($_POST['userName']) && !preg_match('/([a-zA-Z0-9\!\#\$\%\_\@]+)/', $username)){
        $output['userName'] = 'Username invalid';
    }
    
    /*Password valid */
    $password = $_POST['password'];
    if ((is_null($_POST['password'])) || (!preg_match('/([a-zA-Z0-9\!\#\$\%\_\@]+)/', $password))){
        $output['password'] = 'Password invalid';
    }
}
mysqli_close($connect);
?>