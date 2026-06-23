<?php
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

if(!$password || !$email) {
    echo "email or password err";
} else {
    echo "email: " . $email . "<br>";
    echo "password: " . $password . "<br>";
}

require "dbConnect.php";
 $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
 $result = mysqli_query($dbase, $query);
 print_r($result);

 if(mysqli_num_rows($result) > 0 ) {
    echo "<br> succesful";

    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;

    if(isset($_POST["remember"])){
        setcookie("email", "$email", time() + (3600 * 24), "/");
        setcookie("password", "$password", time() + (3600 * 24), "/");
    }

    echo "sessions created";
    header("Location: dashboard.php");
 } else {
    echo "<br> Failed";
 }

// $arr = ["abc", "def", "kpc"];
// print_r($arr);

?>