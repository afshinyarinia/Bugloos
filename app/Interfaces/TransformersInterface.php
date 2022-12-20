<?php

namespace App\Interfaces;

interface TransformersInterface
{
    public static function transform(array $attributes):array;
    public static function transformCollection(array $data):array;
}
