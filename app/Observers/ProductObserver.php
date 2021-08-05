<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $invoice = Invoice::find($product->invoice_id);
        $invoice->total += ($product->quantity * $product->price);
        $invoice->save();
    }
}
