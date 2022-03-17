<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    /**
     * Get model per page.
     *
     * @param array $columns
     * @param int $perPage
     * @param array $relations
     * @return Collection
     */
    public function getPerPage(array $columns = ['*'], $perPage = 6, array $relations = []);


    /**
     * @param array $columns
     * @param string $name
     * @param array $relations
     * @return Collection
     */
    public function searchByName(string $name, array $columns = ['*'],  $perPage = 6, array $relations = []);


    /**
     * @param array $columns
     * @param int $category_id
     * @param array $relations
     * @return Collection
     */
    public function searchByCategory(int $category_id, array $columns = ['*'],  $perPage = 6, array $relations = []);



    /**
     * @param array $columns
     * @param float $min
     * @param float $max
     * @param array $relations
     * @return Collection
     */
    public function searchByPrice(float $min, float $max, array $columns = ['*'],  $perPage = 6, array $relations = []);



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
    ): ?Model;


    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model;

    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $modelId, array $payload): bool;

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $modelId): bool;
}
