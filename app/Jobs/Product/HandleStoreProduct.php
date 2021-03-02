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

class HandleStoreProduct implements ShouldQueue
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
    protected $companyId;


    public function __construct(ProductRepository $productRepository, array $products, int $userId, int $companyId)
    {
        $this->productRepository = $productRepository;
        $this->products = $products;
        $this->userId = $userId;
        $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->products as $product) {
            $this->productRepository->createByJob($product, $this->userId, $this->companyId);
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
        Log::channel('store_product_log')->critical($exception->getMessage());

    }
}
