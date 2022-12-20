<?php
namespace App\Services;

use App\Formatters\JsonFormatter;
use App\Formatters\XMLFormatter;
use App\Interfaces\FormatterInterface;
use App\Transformers\DummyTransformer;

class GetDataService
{
    private FormatterInterface $formatter;


    final public function getDataFromFile(string $path): array
    {
        // call api, and we get a  response
        $response = file_get_contents(public_path($path));
        $type = $this->getType($response);
        $this->setFormatter($type);

        $array = $this->formatter->output($response);
        return  DummyTransformer::transformCollection($array['data']);
    }

    private function getType(string $response):string
    {
        if ($this->isJson($response)) {
            return 'json';
        }
        if($this->isXml($response)) {
            return 'xml';
        }
        return throw new \Exception('Undefined Response Type');
    }


    private function isJson(string $data):bool
    {
        $json = json_decode($data);
        return json_last_error() === JSON_ERROR_NONE;
    }

    private function isXml(string $data):bool
    {
        libxml_use_internal_errors(true);
        $doc = simplexml_load_string($data);
        if (!$doc) {
            $errors = libxml_get_errors();
            if (count($errors)) {
                libxml_clear_errors();
                return false;
            }
        }
        return true;
    }

    final public function setFormatter(string $type): void
    {
        if($type === 'json'){
            $this->formatter = new JsonFormatter();
        }
        if($type === 'xml'){
            $this->formatter = new XMLFormatter();
        }
    }
}
