<?php

namespace App\Interfaces;

use App\Http\Requests\StockRequest;

interface StockRepositoryInterface extends EloquentRepositoryInterface
{
    public function getStockList();
    public function getStock(StockRequest $request);
}