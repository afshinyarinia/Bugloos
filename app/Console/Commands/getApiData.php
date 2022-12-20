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
    protected $signature = 'bugloos:get-data {--path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get some data from third party api';

    public function handle()
    {
        $path = $this->option('path');
        if($path === null){
            return $this->error('please provide a path');
        }
        $service = new GetDataService();
        $data = $service->getDataFromFile('test.xml');
        // save to DB
        return $this->info('data saved successfully');
    }
}
