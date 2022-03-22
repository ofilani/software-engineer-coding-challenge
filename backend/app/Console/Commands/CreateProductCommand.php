<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProductService;


class CreateProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create {--name=} {--description=} {--price=} {--image=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Product by Command-line interface';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = [
            'name' => $this->option('name'),
            'description' => $this->option('description'),
            'price' => $this->option('price'),
            'image' => $this->option('image')
        ];

        $this->productService->create($data);

        $this->info('Product Created successfully');

        return 0;
    }
}
