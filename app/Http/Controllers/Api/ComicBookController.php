<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComicBook;
use Illuminate\Contracts\Support\Responsable;
use App\Http\Responses\ValidResponse;

class ComicBookController extends Controller
{
    /**
     * Get latest active books limited by a parameter
     * 
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function getLastBooks(Request $request, int $limit): Responsable
    {
        $books = ComicBook::latest()
            ->where('status', 1)
            ->take($limit)
            ->get();

        return new ValidResponse(
            [
                'status' => 'success',
                'books' => $books,
            ]
        );
    }

    /**
     * Get all books
     * 
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function getAll(Request $request)
    {
        $books = ComicBook::latest()
            ->where('status', 1)
            ->get();

        return new ValidResponse(
            [
                'status' => 'success',
                'books' => $books,
            ]
        );
    }
}
