<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface EloquentRepositoryInterface
{
    public function findById(int $id , array $columns = ['*'], array $relations = []): Model;

    public function all(array $columns = ['*'],array $relations=[]): Collection;

    public function create(array $payload): Model;

    public function update(int $id , array $payload): bool;

    public function delete(int $id): bool;

    public function paginate(int $perPages);

}