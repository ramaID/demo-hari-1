<?php

// Interface untuk produk
interface ProductInterface {
    public function calculatePrice(): float;
}

// Produk reguler
class RegularProduct implements ProductInterface {
    private float $basePrice;
    private int $quantity;

    public function __construct(float $basePrice, int $quantity) {
        $this->basePrice = $basePrice;
        $this->quantity = $quantity;
    }

    public function calculatePrice(): float {
        return $this->basePrice * $this->quantity;
    }
}

// Produk diskon
class DiscountedProduct implements ProductInterface {
    private float $basePrice;
    private int $quantity;
    private float $discountPercentage;

    public function __construct(float $basePrice, int $quantity, float $discountPercentage) {
        $this->basePrice = $basePrice;
        $this->quantity = $quantity;
        $this->discountPercentage = $discountPercentage;
    }

    public function calculatePrice(): float {
        $discount = $this->basePrice * ($this->discountPercentage / 100);
        $priceAfterDiscount = $this->basePrice - $discount;
        return $priceAfterDiscount * $this->quantity;
    }
}

// Produk grosir
class WholesaleProduct implements ProductInterface {
    private float $basePrice;
    private int $quantity;

    public function __construct(float $basePrice, int $quantity) {
        $this->basePrice = $basePrice;
        $this->quantity = $quantity;
    }

    public function calculatePrice(): float {
        $price = $this->basePrice * $this->quantity;
        if ($this->quantity > 10) {
            $price *= 0.9; // Diskon 10%
        }
        return $price;
    }
}

// Produk makanan
class FoodProduct implements ProductInterface {
    private float $basePrice;
    private int $quantity;

    public function __construct(float $basePrice, int $quantity) {
        $this->basePrice = $basePrice;
        $this->quantity = $quantity;
    }

    public function calculatePrice(): float {
        $tax = $this->basePrice * 0.1; // Pajak 10%
        $priceAfterTax = $this->basePrice + $tax;
        return $priceAfterTax * $this->quantity;
    }
}

// Produk elektonik
class ElectronicProduct implements ProductInterface {
    private float $basePrice;
    private int $quantity;

    public function __construct(float $basePrice, int $quantity) {
        $this->basePrice = $basePrice;
        $this->quantity = $quantity;
    }

    public function calculatePrice(): float {
        $discount = $this->basePrice - ($this->basePrice * 0.03); // diskon 3%
        $tax = $discount * 0.11; // Pajak 11%
        $priceAfterTax = $discount + $tax;
        return $priceAfterTax * $this->quantity;
    }
}

// Shopping Cart
class ShoppingCart {
    private array $products = [];

    public function addProduct(ProductInterface $product): void {
        $this->products[] = $product;
    }

    public function calculateTotal(): float {
        return array_reduce($this->products, fn($total, $product) => $total + $product->calculatePrice(), 0);
    }
}

// Contoh Penggunaan
$cart = new ShoppingCart();
$cart->addProduct(new RegularProduct(100, 2)); // 2 produk reguler dengan harga 100
$cart->addProduct(new DiscountedProduct(200, 3, 20)); // 3 produk diskon dengan harga 200 dan diskon 20%
$cart->addProduct(new WholesaleProduct(50, 15)); // 15 produk grosir dengan harga 50
$cart->addProduct(new FoodProduct(30, 5)); // 5 produk makanan dengan harga 30
$cart->addProduct(new ElectronicProduct(150, 2)); // 2 produk elektronik dengan harga 150

echo "Total: " . $cart->calculateTotal();