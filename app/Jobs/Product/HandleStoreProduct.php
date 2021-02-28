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


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(array $products)
    {

        DB::beginTransaction();
        try {
            foreach($products as $product) {
                $this->productRepository->create($product);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('store_product_log')->critical($e->getMessage());
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::channel('store_product_log')->critical($e->getMessage());
        }

    }
}
