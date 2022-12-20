<?php

namespace App\Formatters;

use App\Interfaces\FormatterInterface;


class XMLFormatter implements FormatterInterface
{

    final public function output(string $data): array
    {
        return ['foo' => 'bar'];
    }
}
