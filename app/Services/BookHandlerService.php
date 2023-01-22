<?php

namespace App\Services;

class BookHandlerService
{
    public function __construct(){}
    public function handler($data): array
    {
        if (!is_array($data)) {
            throw new \Exception('Request data must be in array type');
        }

        $returnData = [];
        if (isset($data['data'])) {
            $returnData = $this->bookService1($data['data']);
        }
        unset($data['data']);

        if (count($data) != 0) {
            $returnData = array_merge($returnData, $this->bookService2($data));
        }

        return $returnData;
    }

    public function bookService1($data): array
    {
        $returnData = [];
        foreach ($data as $item) {
            unset($item['createdAt']);
            $item['author'] = 'В описании';
            $returnData[] = $item;
        }

        return $returnData;
    }
    public function bookService2($data): array
    {
        $returnData = [];
        foreach ($data as $item) {
            $temp['name'] = $item['title'];
            $temp['description'] = $item['desc'];
            $temp['author'] = $item['author'];
            $returnData[] = $temp;
        }

        return $returnData;
    }
}
