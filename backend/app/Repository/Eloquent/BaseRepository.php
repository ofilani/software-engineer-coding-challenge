<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
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
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $columns
     * @param int $perPage
     * @param array $relations
     * @return Collection
     */
    public function getPerPage(array $columns = ['*'],  $perPage = 2, array $relations = [])
    {
        return $this->model->with($relations)->paginate(
            $perPage,
            $columns
        );
    }

    /**
     * @param array $columns
     * @param string $name
     * @param array $relations
     * @return Collection
     */
    public function searchByName(string $name, array $columns = ['*'],  $perPage = 15, array $relations = [])
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
    public function searchByCategoryId(int $category_id, array $columns = ['*'],  $perPage = 15, array $relations = [])
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
    public function searchByPrice(float $min, float $max, array $columns = ['*'],  $perPage = 15, array $relations = [])
    {
        return $this->model->where('price', '>=', $min)->where('price', '<=', $max)->paginate(
            $perPage,
            $columns
        );
    }



    /**
     * Find model by id.
     *
     * @param int $modelId
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Model
     */
    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }




    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $modelId, array $payload): bool
    {
        $model = $this->findById($modelId);

        return $model->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $modelId): bool
    {
        return $this->findById($modelId)->delete();
    }
}
