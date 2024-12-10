<?php

// Soal Studi Kasus
//
// Anda diminta untuk membuat sistem sederhana untuk menghitung total harga produk di sebuah keranjang belanja (shopping cart). Saat ini, terdapat dua jenis produk:
// 	1.	Produk reguler (RegularProduct): memiliki harga dasar dan jumlah.
// 	2.	Produk diskon (DiscountedProduct): memiliki harga dasar, jumlah, dan diskon dalam bentuk persentase.
//  3.  Produk grosir (WholesaleProduct): memiliki harga dasar, jumlah, dan diskon tetap 10% jika membeli lebih dari 10.
//  4.  Produk makanan (FoodProduct): memiliki harga dasar, jumlah, dan tambahan harga pajak 10%.

class ShoppingCart
{
    private $products = [];

    public function addProduct($product)
    {
        // do something
    }

    public function calculateTotal()
    {
        // $total = 0;
        // do something with $this->products
        // return $total;
    }
}


// Contoh Penggunaan
// $cart = new ShoppingCart();
// $cart->addProduct(...);
// $cart->addProduct(...);

echo "Total: ".$cart->calculateTotal();

?>
