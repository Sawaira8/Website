<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include "config.php";
?>
<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM cart");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart | Quran Store</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#eef2f5;
            font-family: Arial, sans-serif;
        }

        .cart-container{
            max-width:900px;
            margin:auto;
            margin-top:60px;
        }

        .cart-box{
            background:#ffffff;
            padding:30px;
            border-radius:14px;
            box-shadow:0 10px 25px rgba(0,0,0,0.15);
        }

        h2{
            text-align:center;
            margin-bottom:30px;
            color:#145a32;
            font-weight:bold;
        }

        table th{
            background:#145a32 !important;
            color:#fff;
            text-align:center;
        }

        table td{
            text-align:center;
            vertical-align:middle;
        }

        .total-box{
            text-align:right;
            font-size:20px;
            font-weight:bold;
            margin-top:20px;
            color:#0a3d2e;
        }

        .btn-success{
            padding:10px 25px;
            font-size:16px;
            border-radius:30px;
        }
    </style>
</head>

<body>

<div class="cart-container">
    <div class="cart-box">

        <h2>🛒 Your Cart</h2>

        <table class="table table-bordered table-striped">
            <tr>
                <th>Quran Name</th>
                <th>Price (Rs)</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>

            <?php
            $grandTotal = 0;
            while($row = mysqli_fetch_assoc($result)){
                $total = $row['price'] * $row['quantity'];
                $grandTotal += $total;
            ?>
            <tr>
                <td><?= $row['product_name']; ?></td>
                <td><?= $row['price']; ?></td>
                <td><?= $row['quantity']; ?></td>
                <td><?= $total; ?></td>
            </tr>
            <?php } ?>
        </table>

        <div class="total-box">
            Grand Total: Rs <?= $grandTotal; ?>
        </div>

        <div class="text-end mt-4">
            <a href="index.php" class="btn btn-success">Continue Shopping</a>
        </div>

    </div>
</div>

</body>
</html>