<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComicBook;
use Illuminate\Contracts\Support\Responsable;
use App\Http\Responses\ValidResponse;

class ComicBookController extends Controller
{
    public function getAll()
    {
    }

    /**
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
}
