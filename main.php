<?php

// Data produk
$products = [
    ['id' => 1, 'name' => 'Laptop',
        'price' => 1500, 'category' => 'Electronics'],
    ['id' => 2, 'name' => 'Phone', 'price' => 800, 'category' => 'Electronics',
    ],
    ['id' => 3, 'name' => 'Desk', 'price' => 200, 'category' => 'Furniture'],
    ['id' => 4, 'name' => 'Chair', 'price' => 100, 'category' => 'Furniture'],
    ['id' => 5, 'name' => 'TV', 'price' => 500, 'category' => 'Electronics'],
];

function hitungTotalHarga($products, $category)
{
    $totalHarga = 0;
    foreach ($products as $product) {
        if ($product['category'] === $category) {

            $totalHarga += $product['price'];
        }
    }

    return $totalHarga;
}

function filterProducts($products, $category)
{
    $filteredProducts = [];
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $filteredProducts[] = $product;
        }
    }

    return $filteredProducts;
}

function showProductsWithCategory($products)
{
    echo "=== Produk ===\n";
    foreach ($products as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
    }
}

function countProductByCategory($products, $category)
{
    $count = 0;
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $count++;
        }
    }

    return $count;
}

showProductsWithCategory($products);

$totalElectronics = hitungTotalHarga($products, 'Electronics');
$totalFurniture = hitungTotalHarga($products, 'Furniture');

echo "Total Electronics: $totalElectronics\n";
echo "Total Furniture: $totalFurniture\n";

$electronicsProducts = filterProducts($products, 'Electronics');
$furnitureProducts = filterProducts($products, 'Furniture');

function showProductsDetail($products, $category)
{
    echo "=== Produk $category ===\n";
    foreach ($products as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}\n";
    }
}

showProductsDetail($electronicsProducts, 'Electronics');
showProductsDetail($furnitureProducts, 'Furniture');

// Tampilkan jumlah produk per kategori
$electronicsCount = countProductByCategory($products, 'Electronics');
$furnitureCount = countProductByCategory($products, 'Furniture');

echo "Jumlah Produk Electronics: $electronicsCount\n";
echo "Jumlah Produk Furniture: $furnitureCount\n";
