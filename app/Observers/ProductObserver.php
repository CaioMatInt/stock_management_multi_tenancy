<?php

namespace App\Observers;

use App\Models\Product;
use App\Repositories\Eloquent\ProductQuantityHistoryRepository;


class ProductObserver
{
    protected $productQuantityHistoryRepository;

    public function __construct(ProductQuantityHistoryRepository $productQuantityHistoryRepository)
    {
        $this->productQuantityHistoryRepository = $productQuantityHistoryRepository;
    }


    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $prepare['product_id'] = $product->id;
        $prepare['quantity'] = $product->quantity;
        $prepare['user_id'] = auth()->user()->id;
        $prepare['company_id'] = auth()->user()->company_id;

        $this->productQuantityHistoryRepository->create($prepare);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        $prepare['product_id'] = $product->id;
        $prepare['quantity'] = $product->quantity;
        $prepare['user_id'] = auth()->user()->id;
        $prepare['company_id'] = auth()->user()->company_id;

        $this->productQuantityHistoryRepository->create($prepare);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
