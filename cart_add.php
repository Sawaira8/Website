<?php
session_start();
include 'config.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int) $_GET['id'];

/* PRODUCT FROM QURANS TABLE */
$productQuery = mysqli_query($conn, "SELECT * FROM qurans WHERE id = $id");

if (mysqli_num_rows($productQuery) == 0) {
    header("Location: index.php");
    exit();
}

$product = mysqli_fetch_assoc($productQuery);

$name  = $product['title'];
$price = $product['price'];

/* CHECK CART */
$check = mysqli_query($conn, "SELECT * FROM cart WHERE product_id = $id");

if (mysqli_num_rows($check) > 0) {
    mysqli_query(
        $conn,
        "UPDATE cart SET quantity = quantity + 1 WHERE product_id = $id"
    );
} else {
    mysqli_query(
        $conn,
        "INSERT INTO cart (product_id, product_name, price, quantity)
         VALUES ($id, '$name', $price, 1)"
    );
}

header("Location: cart.php");
exit();
?>