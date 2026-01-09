
<?php
session_start();
include "config.php";

$error = "";

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password'])){
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: index.php");
            exit();
        } else {
            $error = "❌ Invalid Password";
        }
    } else {
        $error = "❌ User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login | Quran Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:linear-gradient(120deg,#0f5132,#198754);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Segoe UI;
        }
        .login-box{
            background:#fff;
            width:400px;
            padding:35px;
            border-radius:12px;
            box-shadow:0 10px 30px rgba(0,0,0,.2);
        }
        .login-box h3{
            text-align:center;
            margin-bottom:25px;
            color:#198754;
            font-weight:700;
        }
        .login-box input{
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

<div class="login-box">
    <h3>🔐 User Login</h3>

    <?php if($error!=""){ ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>

    <form method="POST">
        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button type="submit" name="login" class="btn btn-custom w-100 mt-2">Login</button>
    </form>

    <div class="small-link">
        Don’t have an account?
        <a href="register.php">Register</a>
    </div>
</div>

</body>
</html>