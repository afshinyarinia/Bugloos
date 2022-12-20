<?php

namespace App\Transformers;

use App\Interfaces\TransformersInterface;
use JetBrains\PhpStorm\ArrayShape;

class DummyTransformer implements TransformersInterface
{


    final public static function transform(array $attributes): array
    {
        return [
            'name' => data_get($attributes, 'first_name'),
            'gender' =>  data_get($attributes, 'sex'),
            // we can put anything we want here
        ];
    }

    final public static function transformCollection(array $data):array
    {
        $response = [];
        foreach ($data as $attributes){
            $response[] = self::transform($attributes);
        }
        return $response;
    }

}
