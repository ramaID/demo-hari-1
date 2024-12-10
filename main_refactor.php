<?php

// Data produk
$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 1500, 'category' => 'Electronics'],
    ['id' => 2, 'name' => 'Phone', 'price' => 800, 'category' => 'Electronics'],
    ['id' => 3, 'name' => 'Desk', 'price' => 200, 'category' => 'Furniture'],
    ['id' => 4, 'name' => 'Chair', 'price' => 100, 'category' => 'Furniture'],
    ['id' => 5, 'name' => 'TV', 'price' => 500, 'category' => 'Electronics'],
];

// Function to display products
function displayProducts($products, $title)
{
    echo "=== $title ===\n";
    foreach ($products as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
    }
}
function displayProductsCategory($products, $title)
{
    echo "=== $title ===\n";
    foreach ($products as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}\n";
    }
}

// Function to calculate total price by category
function calculateTotalByCategory($products, $category)
{
    return array_reduce($products, function ($total, $product) use ($category) {
        return $product['category'] === $category ? $total + $product['price'] : $total;
    }, 0);
}

// Function to filter products by category
function filterProductsByCategory($products, $category)
{
    return array_filter($products, fn($product) => $product['category'] === $category);
}

// Function to count products by category
function countProductsByCategory($products, $category)
{
    return count(filterProductsByCategory($products, $category));
}

// Display all products
displayProducts($products, "Produk");

// // Calculate and display total price per category
$totalElectronics = calculateTotalByCategory($products, 'Electronics');
$totalFurniture = calculateTotalByCategory($products, 'Furniture');
echo "Total Electronics: $totalElectronics\n";
echo "Total Furniture: $totalFurniture\n";

// // Display filtered products by category
displayProductsCategory(filterProductsByCategory($products, 'Electronics'), "Produk Electronics");
displayProductsCategory(filterProductsByCategory($products, 'Furniture'), "Produk Furniture");

// // Display product count per category
$electronicsCount = countProductsByCategory($products, 'Electronics');
$furnitureCount = countProductsByCategory($products, 'Furniture');
echo "Jumlah Produk Electronics: $electronicsCount\n";
echo "Jumlah Produk Furniture: $furnitureCount\n";
