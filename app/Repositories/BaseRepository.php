<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Interfaces\EloquentRepositoryInterface;

class BaseRepository implements EloquentRepositoryInterface
{

    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findById(int $id, array $columns = ['*'], array $relations = []): Model
    {
        return $this->model->find($id, $columns);
    }

    public function all($columns = array('*'),array $relations=[]): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes):bool
    {
        $model = $this->findById($id);
        return $model->update($attributes);
    }

    public function delete(int $id):bool
    {
        $model = $this->findById($id);
        return $model->delete();

    }

    public function paginate($perPages = 15)
    {
        return $this->model->paginate($perPages);
    }
}