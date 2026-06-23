<?php
session_start();
if(!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
        }

        .table thead th {
            background-color: #1f2937;
            color: #ffffff;
            font-weight: 500;
            border: none;
        }

        .table tbody tr:hover {
            background-color: #f1f3f5;
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
        }

        .btn-outline-secondary {
            border-color: #d1d5db;
            color: #374151;
        }

        .btn-outline-secondary:hover {
            background-color: #e5e7eb;
        }

        .btn-outline-danger {
            border-color: #ef4444;
            color: #b91c1c;
        }

        .btn-outline-danger:hover {
            background-color: #fee2e2;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h4 class="mb-0">Products</h4>

            <div class="d-flex gap-2">
                <a href="addProduct.php" class="btn btn-primary btn-sm">
                    Add Product
                </a>

                <form action="logout.php" method="post" class="m-0">
                    <button type="submit" class="btn btn-outline-secondary btn-sm">
                        Logout
                    </button>
                </form>
            </div>
        </div>


        <div class="card-body p-0">
            <table class="table table-striped mb-0 align-middle text-center">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                        require "dbConnect.php";
                        $query = "SELECT * FROM products";
                        $products = mysqli_query($dbase, $query);
                        // print_r($products);

                        foreach($products as $p) {
                            echo "
                            <tr>
                                <td> {$p['id']} </td>
                                <td> {$p['productName']} </td>
                                <td> {$p['category']} </td>
                                <td> {$p['quantity']} </td>
                                <td>
                                    <a href='addProduct.php?id={$p['id']}' class='btn btn-outline-secondary btn-sm me-1'> Edit </a>
                                    <a href='deleteProduct.php?id={$p['id']}' class='btn btn-outline-danger btn-sm' onclick = 'alert('you sure?');'> Delete </a>
                                </td>
                            </tr>
                            
                            ";
                        }

                     ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

</body>
</html>
