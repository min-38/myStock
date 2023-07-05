<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Interfaces\StockRepositoryInterface;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
    private StockRepositoryInterface $stockRepo;

    public function __construct(StockRepositoryInterface $stockRepo)
    {
        $this->middleware('auth');
        $this->stockRepo = $stockRepo;
    }

    // 주식 목록 가져오기
    public function getStockList() {
        $this->stockRepo->getStockList();
    }

    // 주식 검색
    public function getChartData(StockRequest $request)
    {
        $this->stockRepo->getStock($request);
    }
}
