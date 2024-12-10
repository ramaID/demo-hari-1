<?php

// Data produk
$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 1500, 'category' => 'Electronics'],
    ['id' => 2, 'name' => 'Phone', 'price' => 800, 'category' => 'Electronics'],
    ['id' => 3, 'name' => 'Desk', 'price' => 200, 'category' => 'Furniture'],
    ['id' => 4, 'name' => 'Chair', 'price' => 100, 'category' => 'Furniture'],
    ['id' => 5, 'name' => 'TV', 'price' => 500, 'category' => 'Electronics'],
];

// Fungsi untuk menampilkan produk
function displayProducts($title, $products)
{
    echo "=== $title ===\n";
    foreach ($products as $product) {
        echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
    }
}

// Fungsi untuk menghitung total harga berdasarkan kategori
function calculateTotalPriceByCategory($products, $category)
{
    return array_reduce($products, function ($total, $product) use ($category) {
        return $product['category'] === $category ? $total + $product['price'] : $total;
    }, 0);
}

// Fungsi untuk memfilter produk berdasarkan kategori
function filterProductsByCategory($products, $category)
{
    return array_filter($products, fn($product) => $product['category'] === $category);
}

// Fungsi untuk menghitung jumlah produk berdasarkan kategori
function countProductsByCategory($products, $category)
{
    return count(filterProductsByCategory($products, $category));
}

// Tampilkan semua produk
displayProducts("Semua Produk", $products);

// Hitung total harga per kategori
$totalElectronics = calculateTotalPriceByCategory($products, 'Electronics');
$totalFurniture = calculateTotalPriceByCategory($products, 'Furniture');
echo "Total Electronics: $totalElectronics\n";
echo "Total Furniture: $totalFurniture\n";

// Tampilkan produk berdasarkan kategori
$electronicsProducts = filterProductsByCategory($products, 'Electronics');
$furnitureProducts = filterProductsByCategory($products, 'Furniture');

displayProducts("Produk Electronics", $electronicsProducts);
displayProducts("Produk Furniture", $furnitureProducts);

// Tampilkan jumlah produk per kategori
$electronicsCount = countProductsByCategory($products, 'Electronics');
$furnitureCount = countProductsByCategory($products, 'Furniture');

echo "Jumlah Produk Electronics: $electronicsCount\n";
echo "Jumlah Produk Furniture: $furnitureCount\n";

// <?php

// // Data produk
// $products = [
//     ['id' => 1, 'name' => 'Laptop', 'price' => 1500, 'category' => 'Electronics'],
//     ['id' => 2, 'name' => 'Phone', 'price' => 800, 'category' => 'Electronics'],
//     ['id' => 3, 'name' => 'Desk', 'price' => 200, 'category' => 'Furniture'],
//     ['id' => 4, 'name' => 'Chair', 'price' => 100, 'category' => 'Furniture'],
//     ['id' => 5, 'name' => 'TV', 'price' => 500, 'category' => 'Electronics'],
// ];

// // Fungsi untuk menampilkan produk
// function displayProducts($title, $products) {
//     echo "=== $title ===\n";
//     foreach ($products as $product) {
//         echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
//     }
// }

// // Fungsi untuk menghitung total harga berdasarkan kategori
// function calculateTotalPriceByCategory($products, $category) {
//     return array_reduce($products, function ($total, $product) use ($category) {
//         return $product['category'] === $category ? $total + $product['price'] : $total;
//     }, 0);
// }

// // Fungsi untuk memfilter produk berdasarkan kategori
// function filterProductsByCategory($products, $category) {
//     return array_filter($products, fn($product) => $product['category'] === $category);
// }

// // Fungsi untuk menghitung jumlah produk berdasarkan kategori
// function countProductsByCategory($products, $category) {
//     return count(filterProductsByCategory($products, $category));
// }

// // Tampilkan semua produk
// displayProducts("Semua Produk", $products);

// // Hitung total harga per kategori
// $totalElectronics = calculateTotalPriceByCategory($products, 'Electronics');
// $totalFurniture = calculateTotalPriceByCategory($products, 'Furniture');
// echo "Total Electronics: $totalElectronics\n";
// echo "Total Furniture: $totalFurniture\n";

// // Tampilkan produk berdasarkan kategori
// $electronicsProducts = filterProductsByCategory($products, 'Electronics');
// $furnitureProducts = filterProductsByCategory($products, 'Furniture');

// displayProducts("Produk Electronics", $electronicsProducts);
// displayProducts("Produk Furniture", $furnitureProducts);

// // Tampilkan jumlah produk per kategori
// $electronicsCount = countProductsByCategory($products, 'Electronics');
// $furnitureCount = countProductsByCategory($products, 'Furniture');

// echo "Jumlah Produk Electronics: $electronicsCount\n";
// echo "Jumlah Produk Furniture: $furnitureCount\n";
