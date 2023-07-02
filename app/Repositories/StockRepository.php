<?php

namespace App\Repositories;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

use App\Repositories\BaseRepository;
use App\Interfaces\StockRepositoryInterface;
use App\Models\User;
use App\Http\Requests\StockRequest;

class StockRepository extends BaseRepository implements StockRepositoryInterface
{
    protected String $py_path = "";
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->py_path = env('PYTHON_MODULE_PATH' , '/home/python/myStock/');
    }

    // public function getStock(StockRequest $stock)
    public function getStock(StockRequest $requset)
    {
        $name = $requset->input('name');
        $process = new Process(['python3', $this->py_path . 'graph.py', $name]);
        $process->run();
        
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    
        $data = $process->getOutput();
    
        echo $data;
    }
}