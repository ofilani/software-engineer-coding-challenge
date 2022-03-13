<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

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
        Category::create([
            'name' => $name
        ]);

        $this->info('Category Created');

        return 0;
    }
}
