<?php

namespace App\Formatters;


use App\Interfaces\FormatterInterface;


class JsonFormatter implements FormatterInterface
{

    /**
     * @throws \JsonException
     */
    final public function output(string $data): array
    {
        return json_decode($data, true, 512, JSON_THROW_ON_ERROR);
    }
}
