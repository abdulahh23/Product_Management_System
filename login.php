<?php
session_start();
if(isset($_SESSION["email"])) {
    header("Location: dashboard.php");
    exit();
}

// if(isset($_COOKIE["email"])) {
//     echo "<p>cookie found</p>";
//     // echo $_COOKIE["email"];

//     // code to delete cookie:

//     setcookie("email", "$email", time() - 3600, "/");
//     setcookie("password", "$password", time() - 3600, "/");
//     echo "<p>cookie deleted</p>";



// } else {
//     echo "<p>cookie NOT found</p>";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Supermarket System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main_container">
        <div class="sub_container">
            <h3 class="text-center mb-3">Login</h3>
    
            <form action="process.php" method="post" class="row g-3">
                <div class="col-12">
                    <label class="form-label" for="email">Email</label>
                    <input name="email" class="form-control" type="email" required placeholder="Enter your email" value="<?php echo $_COOKIE["email"] ?? '' ?>">
                </div>
        
                <div class="col-12">
                    <label class="form-label" for="password">Password</label>
                    <input name="password" class="form-control" type="password" required placeholder="Enter your password" value="<?php echo $_COOKIE["password"] ?? '' ?>">
                </div>
        
                <div class="col-12">
                    <label class="form-label" for="">Role</label>
                    <select class="form-select" name="" id="">
                        <option value="" selected disabled>Select your role</option>
                        <option value="">Admin</option>
                        <option value="">Cashier</option>
                    </select>
                </div>
        
                <div class="col-12">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label for="remember" class="form-check-label">Remember Me</label>
                </div>
        
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
        
                <div class="col-12 text-center">
                    <a class="text-decoration-none" href="">Forgot Password?</a>
                </div>
            </form>
    
        </div>
    </div>
</body>
</html>