<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use App\Http\Controllers\Api\v1\ProductController;

class DeleteProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:delete {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Product by Command-line interface';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->option('id');
        $prodycController = new ProductController();

        if (Product::destroy($id)) {

            $this->info('Product Deleted');
        }
    }
}
