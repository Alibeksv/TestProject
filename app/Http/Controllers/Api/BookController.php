<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BookHandlerService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookHandler;
    public function __construct(BookHandlerService $bookHandler)
    {
        $this->bookHandler = $bookHandler;
    }

    public function handler(Request $request)
    {
        try {
            $data = $this->bookHandler->handler($request->all());
            return response(
                [
                    'data' => $data,
                    'success' => true,
                ]
            );
        }
        catch (\Exception $e)
        {
            return response(
                [
                    'data' => null,
                    'success' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
    }
}
