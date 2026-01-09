<?php
include "config.php";
$success = "";
$error = "";

if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        $error = "❌ Email already exists";
    } else {
        $query = "INSERT INTO users (name,email,password)
                  VALUES ('$name','$email','$password')";
        if(mysqli_query($conn,$query)){
            $success = "✅ Registration successful! Login now.";
        } else {
            $error = "❌ Something went wrong";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Register | Quran Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:linear-gradient(120deg,#198754,#0f5132);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Segoe UI;
        }
        .register-box{
            background:#fff;
            width:420px;
            padding:35px;
            border-radius:12px;
            box-shadow:0 10px 30px rgba(0,0,0,.2);
        }
        .register-box h3{
            text-align:center;
            margin-bottom:25px;
            color:#198754;
            font-weight:700;
        }
        .register-box input{
            margin-bottom:15px;
            height:45px;
        }
        .btn-custom{
            background:#198754;
            color:#fff;
            font-weight:600;
        }
        .btn-custom:hover{
            background:#157347;
        }
        .small-link{
            text-align:center;
            margin-top:15px;
        }
    </style>
</head>

<body>

<div class="register-box">
    <h3>📝 Create Account</h3>

    <?php if($success!=""){ ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php } ?>

    <?php if($error!=""){ ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>

    <form method="POST">
        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>

        <button type="submit" name="register" class="btn btn-custom w-100 mt-2">
            Register
        </button>
    </form>

    <div class="small-link">
        Already have an account?
        <a href="login.php">Login</a>
    </div>
</div>

</body>
</html>