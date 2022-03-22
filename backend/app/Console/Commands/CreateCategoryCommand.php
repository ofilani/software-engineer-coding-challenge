<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use App\Services\CategoryService;

class CreateCategoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:create {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Category by Command-line interface';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $data = [
            'name' => $this->option('name')
        ];


        $this->categoryService->create($data);

        $this->info('Category created successfully');

        return 0;
    }
}
