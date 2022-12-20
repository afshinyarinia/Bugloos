<?php

namespace App\Formatters;

use App\Interfaces\FormatterInterface;


class XMLFormatter implements FormatterInterface
{

    final public function output(string $data): array
    {
       $xml =  simplexml_load_string($data);
        $json = json_encode($xml);
        return json_decode($json,TRUE);
    }
}
