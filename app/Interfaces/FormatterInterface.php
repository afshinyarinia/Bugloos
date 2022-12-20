<?php
namespace App\Interfaces;

interface FormatterInterface
{
    public function output(string $data):array;
}
