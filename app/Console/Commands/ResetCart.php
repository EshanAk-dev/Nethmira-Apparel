<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Gloudemans\Shoppingcart\Facades\Cart;

class ResetCart extends Command
{
    protected $signature = 'cart:reset';
    protected $description = 'Reset the contents of the shopping cart';

    public function handle()
    {
        // Retrieve the "Cart" instance and clear its contents
        $cart = Cart::instance('Cart');
        $cart->clear();

        // Output a success message
        $this->info('Shopping cart has been reset.');
    }
}
