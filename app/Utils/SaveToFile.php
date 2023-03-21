<?php

namespace App\Utils;

class SaveToFile implements StorageInterface
{
    /**
     * @param string $path
     * @param array $data
     * @return void
     */
    public static function save(string $path, array $data): void
    {
        $file = storage_path($path);
        file_put_contents($file, [PHP_EOL, json_encode($data), now()], FILE_APPEND | LOCK_EX);
    }
}
