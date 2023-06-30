<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;

use App\Repositories\BaseRepository;
use App\Interfaces\StockRepositoryInterface;
use App\Models\User;
use App\Http\Requests\StockRequest;

class StockRepository extends BaseRepository implements StockRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    // public function getStock(StockRequest $stock)
    public function getStock()
    {
        $output = shell_exec("python -W ignore /home/pytion/myStock/graph.py");
        echo $output;
    }
}