<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Interfaces\StockRepositoryInterface;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
    private StockRepositoryInterface $stockRepo;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(StockRepositoryInterface $stockRepo)
    {
        $this->middleware('guest')->except('logout');
        $this->stockRepo = $stockRepo;
    }

    // 주식 검색
    public function getStock()
    {
        $stock = $this->stockRepo->getStock();
    }
}
