<?php
class Products
{
    // Data produk
    public $products = [
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

    function showProductList($products)
    {
        // Tampilkan semua produk
        echo "=== Produk ===\n";
        foreach ($products as $product) {

            echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
        }
    }

    function calculateTotalPrice($products, $category)
    {
        $totalProduct = 0;
        foreach ($products as $product) {
            if ($product['category'] === $category) {

                $totalProduct += $product['price'];
            }
        }
        echo "Total " . $category . ": $totalProduct\n";
    }

    function filterProducts($products, $category)
    {
        $filteredProducts = [];
        foreach ($products as $product) {
            if ($product['category'] === $category) {
                $filteredProducts[] = $product;
            }
        }
        echo "=== Produk " . $category . " ===\n";
        foreach ($filteredProducts as $product) {
            echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}\n";
        }

        return $filteredProducts;
    }

    function index()
    {
        $products = $this->products;

        $this->showProductList($products);

        // Hitung total harga kategori Electronics
        $this->calculateTotalPrice($products, "Electronics");

        // Hitung total harga kategori Furniture
        $this->calculateTotalPrice($products, "Furniture");

        // Filter produk kategori Electronics
        $electronicProducts = $this->filterProducts($products, 'Electronics');

        // Filter produk kategori Furniture
        $furnitureProducts = $this->filterProducts($products, 'Furniture');

        // Tampilkan jumlah produk per kategori
        $electronicsCount = count($electronicProducts);
        $furnitureCount = count($furnitureProducts);

        echo "Jumlah Produk Electronics: $electronicsCount\n";
        echo "Jumlah Produk Furniture: $furnitureCount\n";
    }
}

$product = new Products();
$product->index();
