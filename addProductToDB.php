<?php
$name = $_POST["name"];
$category = $_POST["category"];
$quantity = $_POST["quantity"];

// echo "$name  . $category  . $quantity <br>";

require "dbConnect.php";

$query = "INSERT INTO products (productName, category, quantity) VALUES ('$name', '$category', $quantity)";
mysqli_query($dbase, $query);

header("Location: dashboard.php")

?>