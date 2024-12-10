<?php

class Goods
{


// Data produk
    public $products = [['id' => 1, 'name' => 'Laptop',
        'price' => 1500, 'category' => 'Electronics'],
        ['id' => 2, 'name' => 'Phone', 'price' => 800, 'category' => 'Electronics',],
        ['id' => 3, 'name' => 'Desk', 'price' => 200, 'category' => 'Furniture'],
        ['id' => 4, 'name' => 'Chair', 'price' => 100, 'category' => 'Furniture'],
        ['id' => 5, 'name' => 'TV', 'price' => 500, 'category' => 'Electronics'],];

    public function main()
    {
        $products = $this->products;
        $this->showAllProducts($products);
        $this->calculateAllProducts($products, 'Electronics');
        $this->calculateAllProducts($products, 'Furniture');
        $this->filterProducts($products, 'Furniture');
        $this->filterProducts($products, 'Electronics');

    }


    function showAllProducts($products)
    {
        // Tampilkan semua produk
        echo "=== Produk ===\n";
        foreach ($products as $product) {

            echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
        }
    }

    function calculateAllProducts($products, $category)
    {
        $totalProduct = 0;
        foreach ($products as $product) {
            if ($product['category'] === $category) {

                $totalProduct += $product['price'];
            }
        }
        echo "Total Electronics: $totalProduct\n";
    }

    function filterProducts($products, $category)
    {
        $filteredProducts = [];
        foreach ($products as $product) {
            if ($product['category'] === $category) {
                $filteredProducts[] = $product;
            }
        }
        echo "=== Produk ===\n" . $category . "=======";
        foreach ($filteredProducts as $product) {
            echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}\n";

        }
    }
}
$goods = new Goods();
$goods->main();







