<?php

class Products
{
    public $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    function showAllProduct()
    {
        $products = [];
        foreach ($this->products as $product) {
            $products[] = $product;
        }
        return $products;
    }

    function productsByCategory($category)
    {
        $products = [];
        foreach ($this->products as $product) {
            if ($product['category'] === $category) {
                $products[] = $product;
            }
        }
        return $products;
    }

    function sumTotalByCategory($category)
    {
        $totalFurniture = 0;
        foreach ($this->products as $product) {
            if ($product['category'] === $category) {
                $totalFurniture += $product['price'];
            }
        }
        return $totalFurniture;
    }

    function countByCategory($category)
    {
        $count = 0;
        foreach ($this->products as $product) {
            if ($product['category'] === $category) {
                $count++;
            }
        }
        return $count;
    }
}


$productItems = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 1500, 'category' => 'Electronics'],
    ['id' => 2, 'name' => 'Phone', 'price' => 800, 'category' => 'Electronics'],
    ['id' => 3, 'name' => 'Desk', 'price' => 200, 'category' => 'Furniture'],
    ['id' => 4, 'name' => 'Chair', 'price' => 100, 'category' => 'Furniture'],
    ['id' => 5, 'name' => 'TV', 'price' => 500, 'category' => 'Electronics'],
];

$products = new Products($productItems);

// Call showAllProduct and echo each product
foreach ($products->showAllProduct() as $product) {
    echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
}

// sum total category electronics
$totalElectronics = $products->sumTotalByCategory('Electronics');
echo "Total Electronics: $totalElectronics\n";

// sum total category furniture
$totalFurniture = $products->sumTotalByCategory('Furniture');
echo "Total Furniture: $totalFurniture\n";


echo "=== Produk Electronics ===\n";
foreach ($products->productsByCategory('Electronics') as $product) {
    echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}\n";
}

echo "=== Produk Furniture ===\n";
foreach ($products->productsByCategory('Furniture') as $product) {
    echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}\n";
}

// count products
$electronicsCount = $products->countByCategory('Electronics');
$furnitureCount =  $products->countByCategory('Furniture');
echo "Jumlah Produk Electronics: $electronicsCount\n";
echo "Jumlah Produk Furniture: $furnitureCount\n";
