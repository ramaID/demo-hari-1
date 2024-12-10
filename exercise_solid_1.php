<?php

abstract class Product
{
//    BASE PROPERTIES
    protected string $name;
    protected float $basePrice ;

    protected int $quantity;

    public function __construct(string $name, float $basePrice, int $quantity)
    {
        $this->name = $name;
        $this->basePrice = $basePrice;
        $this->quantity = $quantity;
    }
    public function getName() : string
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

    abstract public function calculateTotalPrice(): float;
}

// BUAT CLASS REGULAR
class RegularProduct extends Product
{
    public function calculateTotalPrice(): float
    {
        return $this->basePrice * $this->quantity;
    }

}

class DiscountProduct extends Product
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
        // TODO: Implement calculateTotalPrice() method.
    }
}

class WholesaleProduct extends Product
{
    public function calculateTotalPrice(): float
    {
        $price = $this->basePrice;
        if ($this->quantity > 10){
            $price *= 0.9;
        }
        return $price * $this->quantity;
    }

}

class FoodProduct extends Product
{
    public function calculateTotalPrice(): float
    {
        $tax = $this->basePrice * 0.1;
        $taxedPrice = $this->basePrice + $tax;
        return $taxedPrice * $this->quantity;
        // TODO: Implement calculateTotalPrice() method.
    }

}
class GiftProduct extends Product
{
    public function calculateTotalPrice(): float
    {
        $price = $this->basePrice * 0;
        return $price * $this->quantity;
        // TODO: Implement calculateTotalPrice() method.
    }

}

class ShoppingCart
{
    private array $products = [];
    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function calculateTotal(): float
    {
        return array_reduce($this->products, fn($total, $product)=> $total + $product->calculateTotalPrice(), 0);
    }
    public function listProducts(): void
    {
        foreach ($this->products as $product) {
            echo "{$product->getName()} x {$product->getQuantity()} = " . "Rp. ". $product->calculateTotalPrice() . "\n";
        }
    }
    public function sumProducts(): int
    {
        $totalQuantity = 0;

        foreach ($this->products as $product) {
            $totalQuantity += $product->getQuantity();
        }

        return $totalQuantity;
    }

}
$cart = new ShoppingCart();
$cart->addProduct(new RegularProduct('Laptop', 1500, 3));
$cart->addProduct(new DiscountProduct('Phone', 800, 2, 15));
$cart->addProduct(new WholesaleProduct('Chair', 50, 12));
$cart->addProduct(new FoodProduct('Pizza', 20, 5));
$cart->addProduct(new GiftProduct('Pizza', 20, 5));

// List products and total
echo "=== Products in Cart ===\n";
$cart->listProducts();

echo "\nTotal Barang: " .  $cart->sumProducts() . "\n";
echo "\nTotal: " . "Rp. ". $cart->calculateTotal() . "\n";