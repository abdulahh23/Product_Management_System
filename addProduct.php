<?php
session_start();
if(!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();    
}

if(isset($_GET["id"])) {
        $id = $_GET["id"];
        // echo "<p>id = {$id} </p>";

        require "dbConnect.php";
        $query = "SELECT * FROM products WHERE id = '$id' ";
        $result = mysqli_query($dbase, $query);
        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Supermarket System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main_container">
        <div class="sub_container">
            <h3 class="text-center mb-3">Add New Product</h3>
    
            <form action="<?= isset($_GET["id"]) ? "editProduct.php?id=$id" : "addProductToDB.php"; ?>" method="post" class="row g-3">
                <div class="col-12">
                    <label class="form-label" for="">Product Name *</label>
                    <input name="name" class="form-control" type="text" placeholder="Enter product name" required value="<?php echo $row['productName'] ?? ''; ?>">
                </div>
        
                <div class="col-12">
                    <label class="form-label" for="">Product ID</label>
                    <input class="form-control" type="text" placeholder="Enter product ID">
                </div>

                <div class="col-6">
                    <label class="form-label" for="">Category *</label>
                    <select name="category" class="form-select" id="" required>
                        <option value="" <?= $row['category'] ?? "selected" ?> disabled>Select category</option>
                        <option value="Beverages" <?= ($row['category'] ?? "") === "Beverages" ? "selected" : "";  ?> >Beverages</option>
                        <option value="Dairy" <?= ($row['category'] ?? "") === "Dairy" ? "selected" : "";  ?>>Dairy</option>
                        <option value="Snacks" <?= ($row['category'] ?? "") === "Snacks" ? "selected" : "";  ?>>Snacks</option>
                        <option value="Fruits & Vegetables" <?= ($row['category'] ?? "") === "Fruits & Vegetables" ? "selected" : "";  ?>>Fruits & Vegetables</option>
                        <option value="Household" <?= ($row['category'] ?? "") === "Household" ? "selected" : "";  ?>>Household</option>
                    </select>
                </div>

                <div class="col-6">
                    <label class="form-label" for="">Supplier</label>
                    <input class="form-control" type="text" placeholder="Enter supplier name">
                </div>

                <div class="col-6 mt-4 mb-2">
                    <label class="form-label" for="">Purchase Price</label>
                    <input class="form-control" type="number" placeholder="Enter purchase price">
                </div>

                <div class="col-6 mt-4 mb-2">
                    <label class="form-label" for="">Selling Price</label>
                    <input class="form-control" type="number" placeholder="Enter selling price">
                </div>

                <div class="col-6 mb-2">
                    <label class="form-label" for="">Quantity *</label>
                    <input name="quantity" class="form-control" type="number" placeholder="Enter quantity" required value="<?php echo $row['quantity'] ?? ''; ?>">
                </div>

                <div class="col-6 mb-2">
                    <label class="form-label" for="">Unit</label>
                    <select class="form-select" name="" id="">
                        <option value="" selected disabled>Select unit</option>
                        <option value="">pcs</option>
                        <option value="">kg</option>
                        <option value="">liters</option>
                    </select>
                </div>
        
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">Add Product</button>
                </div>
            </form>
        </div>        
    </div>
</body>
</html>