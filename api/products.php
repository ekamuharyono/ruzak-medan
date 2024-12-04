<?php
header('Content-Type: application/json');

// Dummy data produk
$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 15000000],
    ['id' => 2, 'name' => 'Smartphone', 'price' => 5000000],
    ['id' => 3, 'name' => 'Headphones', 'price' => 800000],
];

echo json_encode(['products' => $products]);