<?php

namespace App\Utils;

interface StorageInterface
{
    public static function save(string $path, array $data): void;
}
