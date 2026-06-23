<?php
require "dbConnect.php";

$id = $_GET["id"];

$query = "DELETE FROM products WHERE id = $id";
mysqli_query($dbase, $query);

header("Location: dashboard.php");

?>