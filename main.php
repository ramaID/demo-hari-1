<?php
// Data produk
$products = [
    [
        "id" => 1,
        "name" => "Laptop",
        "price" => 1500,
        "category" => "Electronics"
    ],
    [
        "id" => 2,
        "name" => "Phone",
        "price" => 800,
        "category" => "Electronics"
    ],
    ["id" => 3, "name" => "Desk", "price" => 200, "category" => "Furniture"],
    ["id" => 4, "name" => "Chair", "price" => 100, "category" => "Furniture"],
    ["id" => 5, "name" => "TV", "price" => 500, "category" => "Electronics"],
];

show($products);
countPricePerCategory($products, 'Electronics');
countPricePerCategory($products, 'Furniture');
filterProductPerCategory($products, 'Electronics');
filterProductPerCategory($products, 'Furniture');
countProductPerCategory($products, 'Electronics');
countProductPerCategory($products, 'Furniture');

function show($products)
{
    echo "=== Produk ===\n";
    foreach ($products as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
    }
}

function countPricePerCategory($products, $category)
{
    $totalPricePerCategory = 0;
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $totalPricePerCategory += $product['price'];
        }
    }
    echo "Total $category: $totalPricePerCategory\n";
}

function filterProductPerCategory($products, $category)
{
    $filteredProducs = [];
    foreach ($products as $product) {
        if ($product['category'] === 'Electronics') {
            $filteredProducs[] = $product;
        }
    }
    echo "=== Produk Electronics ===\n";
    foreach ($filteredProducs as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}\n";
    }
}

function countProductPerCategory($products, $category)
{
    $productCount = 0;
    foreach (
        $products
        as $product
    ) {
        if ($product['category'] === $category) {
            $productCount++;
        }
    }
    echo "Jumlah Produk $category: $productCount\n";
}
