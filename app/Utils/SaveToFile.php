<?php

namespace App\Utils;

class SaveToFile implements SaveInterface
{
    /**
     * @param array $data
     * @return void
     */
    public static function save(array $data): void
    {
        $file = storage_path('app/messages.txt');
        $name = $data['name'];
        $phone = $data['phone'];
        $message = $data['message'];
        file_put_contents($file, [
            '-------------------', PHP_EOL,
            'Дата: '.now(), PHP_EOL,
            'Имя: '.$name, PHP_EOL,
            'Телефон: '.$phone, PHP_EOL,
            'Сообщение: '.$message, PHP_EOL,
            PHP_EOL
        ], FILE_APPEND | LOCK_EX);
    }
}
