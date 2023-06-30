<?php

namespace App\Interfaces;

use App\Http\Requests\StockRequest;

interface StockRepositoryInterface extends EloquentRepositoryInterface
{
    // public function getStock(StockRequest $stock);
    public function getStock();
}