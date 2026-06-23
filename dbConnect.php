<?php
$dbase = mysqli_connect("localhost", "root", "", "mydb");
if(!$dbase) {
    die("db connection failed");
}
?>