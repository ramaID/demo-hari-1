<?php

// Data produk
$products = [
    ["id" => 1, "name" => "Laptop", "price" => 1500, "category" => "Electronics"],
    ["id" => 2, "name" => "Phone", "price" => 800, "category" => "Electronics"],
    ["id" => 3, "name" => "Desk", "price" => 200, "category" => "Furniture"],
    ["id" => 4, "name" => "Chair", "price" => 100, "category" => "Furniture"],
    ["id" => 5, "name" => "TV", "price" => 500, "category" => "Electronics"],
];

// Fungsi untuk menampilkan semua produk
function displayAllProducts($products) {
    echo "=== Produk ===\n";
    foreach ($products as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
    }
}

// Fungsi untuk menghitung total harga berdasarkan kategori
function calculateTotalPrice($products, $category) {
    $total = 0;
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $total += $product['price'];
        }
    }
    return $total;
}

// Fungsi untuk memfilter produk berdasarkan kategori
function filterProductsByCategory($products, $category) {
    $filteredProducts = [];
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $filteredProducts[] = $product;
        }
    }
    return $filteredProducts;
}

// Fungsi untuk menampilkan produk dalam kategori tertentu
function displayCategoryProducts($products, $category) {
    echo "=== $category ===\n";
    foreach ($products as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}\n";
    }
}

// Fungsi untuk menghitung jumlah produk berdasarkan kategori
function countProductsByCategory($products, $category) {
    $count = 0;
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $count++;
        }
    }
    return $count;
}

// Tampilkan semua produk
displayAllProducts($products);

// Hitung total harga kategori Electronics
$totalElectronics = calculateTotalPrice($products, 'Electronics');
echo "Total Electronics: $totalElectronics\n";

// Hitung total harga kategori Furniture
$totalFurniture = calculateTotalPrice($products, 'Furniture');
echo "Total Furniture: $totalFurniture\n";

// Filter dan tampilkan produk kategori Electronics
$electronicsProducts = filterProductsByCategory($products, 'Electronics');
displayCategoryProducts($electronicsProducts, 'Electronics');

// Filter dan tampilkan produk kategori Furniture
$furnitureProducts = filterProductsByCategory($products, 'Furniture');
displayCategoryProducts($furnitureProducts, 'Furniture');

// Tampilkan jumlah produk per kategori
$electronicsCount = countProductsByCategory($products, 'Electronics');
$furnitureCount = countProductsByCategory($products, 'Furniture');
echo "Jumlah Produk Electronics: $electronicsCount\n";
echo "Jumlah Produk Furniture: $furnitureCount\n";