<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\v1\ProductController;

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
        $name = $this->option('name');
        $description = $this->option('description');
        $price = $this->option('price');
        $image = $this->option('image');

        $validator = Validator::make([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $image,
        ], [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required'],
        ]);

        if ($validator->fails()) {
            $this->info('Staff User not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        $validator->errors()->all();


        // $productController = new ProductController(null);

        // Product::create([
        //     'name' => $name,
        //     'description' => $description,
        //     'price' => $price,
        //     'image' => $image
        // ]);

        $this->info('Product Created');

        return 0;
    }
}
