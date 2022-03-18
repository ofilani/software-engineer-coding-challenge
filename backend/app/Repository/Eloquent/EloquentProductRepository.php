<?php

namespace App\Repository\Eloquent;

use App\Models\Product;
use App\Repository\ProductRepository;

class EloquentProductRepository extends EloquentBaseRepository implements ProductRepository
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
    public function __construct(Product $model)
    {
        $this->model = $model;
    }


    /**
     * @param array $columns
     * @param string $name
     * @param array $relations
     * @return Collection
     */
    public function searchByName(string $name, array $columns = ['*'],  $perPage = 6, array $relations = [])
    {
        return $this->model->where('name', 'like', '%' . $name . '%')->paginate(
            $perPage,
            $columns
        );
    }

    /**
     * @param array $columns
     * @param int $category_id
     * @param array $relations
     * @return Collection
     */
    public function searchByCategory(int $category_id, array $columns = ['*'],  $perPage = 6, array $relations = [])
    {
        return $this->model->where('category_id', '=', $category_id)->paginate(
            $perPage,
            $columns
        );
    }

    /**
     * @param array $columns
     * @param float $min
     * @param float $max
     * @param array $relations
     * @return Collection
     */
    public function searchByPrice(float $min, float $max, array $columns = ['*'],  $perPage = 6, array $relations = [])
    {
        return $this->model->where('price', '>=', $min)->where('price', '<=', $max)->paginate(
            $perPage,
            $columns
        );
    }
}
