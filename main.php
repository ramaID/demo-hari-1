<?php

function getProducts()
{
    $products = [
        [
            'id' => 1,
            'name' => 'Laptop',
            'price' => 1500,
            'category' => 'Electronics'
        ],
        [
            'id' => 2,
            'name' => 'Phone',
            'price' => 800,
            'category' => 'Electronics',
        ],
        [
            'id' => 3,
            'name' => 'Desk',
            'price' => 200,
            'category' => 'Furniture',
        ],
        [
            'id' => 4,
            'name' => 'Chair',
            'price' => 100,
            'category' => 'Furniture',
        ],
        [
            'id' => 5,
            'name' => 'TV',
            'price' => 500,
            'category' => 'Electronics',
        ],
    ];
    return $products;
}

function printProducts()
{
    $products = getProducts();
    echo "=== Produk ===\n";
    foreach ($products as $product) {

        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
    }
}

function calculateTotalPriceByCategory($category)
{
    $products = getProducts();
    $total = 0;
    foreach ($products as $product) {
        if ($product['category'] === 'Electronics') {
            $total += $product['price'];
        }
    }
    echo "Total $category: $total\n";
}

function filterByCategory($category)
{
    $products = getProducts();
    $filteredProducts = [];
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $filteredProducts[] = $product;
        }
    }
    echo "=== Produk $category ===\n";
    foreach ($filteredProducts as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}\n";
    }
}

function countProductCategory($category)
{
    $products = getProducts();
    $productCategoryCount = 0;
    foreach ($products as $product) {
        if ($product['category'] === $category) {
            $productCategoryCount++;
        }
    }
    echo "Jumlah Produk $category: $productCategoryCount\n";
}

function main()
{
    printProducts();
    calculateTotalPriceByCategory("Electronics");
    calculateTotalPriceByCategory("Furniture");
    filterByCategory("Electronics");
    filterByCategory("Furniture");
    countProductCategory("Electronics");
    countProductCategory("Furniture");
}
main();
