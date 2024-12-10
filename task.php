<?php

// Base Product Class
abstract class Product
{
    protected string $name;
    protected float $basePrice;
    protected int $quantity;

    public function __construct(string $name, float $basePrice, int $quantity)
    {
        $this->name = $name;
        $this->basePrice = $basePrice;
        $this->quantity = $quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBasePrice(): float
    {
        return $this->basePrice;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    // Method to calculate the total price for this product
    abstract public function calculateTotalPrice(): float;
}

// Regular Product Class
class RegularProduct extends Product
{
    public function calculateTotalPrice(): float
    {
        return $this->basePrice * $this->quantity;
    }
}

// Discounted Product Class
class DiscountedProduct extends Product
{
    private float $discountPercentage;

    public function __construct(string $name, float $basePrice, int $quantity, float $discountPercentage)
    {
        parent::__construct($name, $basePrice, $quantity);
        $this->discountPercentage = $discountPercentage;
    }

    public function calculateTotalPrice(): float
    {
        $discount = $this->basePrice * ($this->discountPercentage / 100);
        $discountedPrice = $this->basePrice - $discount;
        return $discountedPrice * $this->quantity;
    }
}

// Wholesale Product Class
class WholesaleProduct extends Product
{
    public function calculateTotalPrice(): float
    {
        $price = $this->basePrice;
        if ($this->quantity > 10) {
            $price *= 0.9; // 10% discount
        }
        return $price * $this->quantity;
    }
}

// Food Product Class
class FoodProduct extends Product
{
    public function calculateTotalPrice(): float
    {
        $tax = $this->basePrice * 0.1; // 10% tax
        $taxedPrice = $this->basePrice + $tax;
        return $taxedPrice * $this->quantity;
    }
}

// Shopping Cart Class
class ShoppingCart
{
    private array $products = [];

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function calculateTotal(): float
    {
        return array_reduce($this->products, fn($total, $product) => $total + $product->calculateTotalPrice(), 0);
    }

    public function listProducts(): void
    {
        foreach ($this->products as $product) {
            echo "{$product->getName()} x {$product->getQuantity()} = " . $product->calculateTotalPrice() . "\n";
        }
    }
}

// Example Usage
$cart = new ShoppingCart();
$cart->addProduct(new RegularProduct('Laptop', 1500, 1));
$cart->addProduct(new DiscountedProduct('Phone', 800, 2, 15));
$cart->addProduct(new WholesaleProduct('Chair', 50, 12));
$cart->addProduct(new FoodProduct('Pizza', 20, 5));

// List products and total
echo "=== Products in Cart ===\n";
$cart->listProducts();

echo "\nTotal: " . $cart->calculateTotal() . "\n";
