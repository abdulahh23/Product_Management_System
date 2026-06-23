<?php
require "dbConnect.php";

$id = $_GET["id"];
$name = $_POST["name"];
$category = $_POST["category"];
$quantity = $_POST["quantity"];

$query = "UPDATE products SET productName = '$name', category = '$category', quantity = '$quantity' WHERE id = $id ";
mysqli_query($dbase, $query);

header("Location: dashboard.php");

?>