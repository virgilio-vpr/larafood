<?php

namespace App\Observers;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     *
     * @param  \App\Models\Product $product
     * @return void
     */
    public function creating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
        $product->price= preg_replace('/(?<=\d),+(?=\d)/', '.', $product->price); // Essa linha foi adicionada por minha conta
    }

    /**
     * Handle the Product "updating" event.
     *
     * @param  \App\Models\Product $product
     * @return void
     */
    public function updating(Product $product)
    {
        $product->flag = Str::kebab($product->title);
        $product->price= preg_replace('/(?<=\d),+(?=\d)/', '.', $product->price); // Essa linha foi adicionada por minha conta
    }
}
