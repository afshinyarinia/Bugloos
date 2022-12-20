<?php

namespace App\Console\Commands;

use App\Formatters\JsonFormatter;
use App\Services\GetDataService;
use App\Transformers\DummyTransformer;
use Illuminate\Console\Command;

class getApiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bugloos:get-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get some data from third party api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = new GetDataService(new JsonFormatter(new DummyTransformer()));
        $data = $service->getData();
        dd($data);
    }
}
