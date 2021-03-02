<?php

namespace App\Jobs\Product;

use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HandleUpdateProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $tries = 3;

    protected $productRepository;
    protected $products;
    protected $userId;


    public function __construct(ProductRepository $productRepository, array $products, int $userId)
    {
        $this->productRepository = $productRepository;
        $this->products = $products;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->products as $product) {
            $this->productRepository->updateByJob($product['id'], $product, $this->userId);
        }

    }

    /**
     * Handle a job failure.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(\Throwable $exception)
    {
        Log::channel('update_product_log')->critical($exception->getMessage());

    }
}
