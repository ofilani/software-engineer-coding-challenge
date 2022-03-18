<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\CategoryRepository;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}
