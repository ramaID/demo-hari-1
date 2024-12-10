<?php

class ProductManager {
    private array $products;

    public function __construct(array $products) {
        $this->products = $products;
    }

    // Tampilkan semua produk
    public function displayAllProducts(): void {
        $this->displayProducts($this->products, "Semua Produk");
    }

    // Tampilkan produk berdasarkan kategori
    public function displayProductsByCategory(string $category): void {
        $filteredProducts = $this->filterProductsByCategory($category);
        $this->displayProducts($filteredProducts, "Produk $category");
    }

    // Hitung total harga berdasarkan kategori
    public function calculateTotalPriceByCategory(string $category): float {
        return array_reduce(
            $this->filterProductsByCategory($category),
            fn($total, $product) => $total + $product['price'],
            0
        );
    }

    // Hitung jumlah produk berdasarkan kategori
    public function countProductsByCategory(string $category): int {
        return count($this->filterProductsByCategory($category));
    }

    // Tampilkan ringkasan kategori
    public function displayCategorySummary(array $categories): void {
        foreach ($categories as $category) {
            $totalPrice = $this->calculateTotalPriceByCategory($category);
            $productCount = $this->countProductsByCategory($category);
            echo "Kategori: $category\n";
            echo "- Jumlah Produk: $productCount\n";
            echo "- Total Harga: $totalPrice\n\n";
        }
    }

    // Filter produk berdasarkan kategori
    private function filterProductsByCategory(string $category): array {
        return array_filter($this->products, fn($product) => $product['category'] === $category);
    }

    // Fungsi untuk menampilkan produk
    private function displayProducts(array $products, string $title): void {
        echo "=== $title ===\n";
        foreach ($products as $product) {
            echo "ID: {$product['id']}, Name: {$product['name']}, Price: {$product['price']}, Category: {$product['category']}\n";
        }
    }
}

// Contoh Data Produk
$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 1500, 'category' => 'Electronics'],
    ['id' => 2, 'name' => 'TV', 'price' => 700, 'category' => 'Electronics'],
    ['id' => 3, 'name' => 'Sofa', 'price' => 300, 'category' => 'Furniture'],
    ['id' => 4, 'name' => 'Table', 'price' => 150, 'category' => 'Furniture'],
    ['id' => 5, 'name' => 'Smartphone', 'price' => 900, 'category' => 'Electronics'],
];

// Inisialisasi ProductManager
$productManager = new ProductManager($products);

// Tampilkan semua produk
$productManager->displayAllProducts();
echo "\n";

// Tampilkan produk berdasarkan kategori
$productManager->displayProductsByCategory('Electronics');
echo "\n";
$productManager->displayProductsByCategory('Furniture');
echo "\n";

// Tampilkan ringkasan kategori
$categories = ['Electronics', 'Furniture'];
$productManager->displayCategorySummary($categories);