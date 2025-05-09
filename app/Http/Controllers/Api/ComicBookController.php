<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ClientErrorResponse;
use App\Http\Responses\ValidResponse;
use App\Models\ComicBook;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
//use Illuminate\Support\Facades\Config;

class ComicBookController extends Controller
{
    /**
     * Get latest active books limited by a parameter
     * 
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function getLastBooks(Request $request, int $limit=6): Responsable
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

    /**
     * Get all books paginate
     * 
     * @param Request $request
     * @param string $page
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function paginate(Request $request): Responsable
    {
        $perPage = $request->get('per_page') ?
            $request->get('per_page') :
            config('ComicBook.pagination.default');
 
        if ($request->has('page')) {
            $pageNumber = $request->get('page');
        } else {
            return new ClientErrorResponse(
                [
                    'status' => 'failure',
                    'message' => 'wrong or missing parameters'
                ]
            );     
        }

        try {
            $comicBooks = ComicBook::paginate($perPage, ['*'], 'page', $pageNumber);
            $comicBooks->withPath('/books');

            return new ValidResponse(
                [
                    'status' => 'success',
                    'books' => $comicBooks,
                ]
            );
        } catch (\Exception $exception) {
            return new ClientErrorResponse(
                [
                    'status' => 'error',
                    'message' => $exception->getMessage(),
                ],
                404
            );
        }
    }

    /**
     * get all books by a set of params
     * 
     * @param Request $request
     * @return Responsable
     */
    public function getByParams(Request $request) : Responsable
    {
        if ($request->has('params')) {
            $params = $request->get('params');

            $comicBooks = ComicBook::where()
                ->get();
            
                return new ValidResponse(
                    [
                        'status' => 'ok',
                        'books' => $comicBooks,
                    ]
                );
        } else {
            return new ClientErrorResponse(
                [
                    'status' => 'error',
                    'message' => 'missing params',
                ],
            );
        }
    }

    /**
     * Returns comic books by category
     * 
     * @param Request $request
     * @param string $category
     * @return Reponsable
     */
    public function getByCategory(Request $request, string $category): Responsable
    {
        if (isset($category)) {
            $comicBooks = ComicBook::whereHas(
                'categories', function($q) use($category){
                    $q->where('id', (int)$category);
                }
            )->get();

            return new ValidResponse(
                [
                    'status' => 'ok',
                    'books' => $comicBooks,
                ]
                );
        } else {
            return new ClientErrorResponse(
                [
                    'status' => 'error',
                    'message' => 'missing params',
                ],
            );
        }
    }

    /**
     * Search comic books by criteria
     * 
     * @param Request $request
     * @param string $criteria
     * @return Reponsable
     */
    public function search(Request $request, string $criteria): Responsable
    {
        $statusField = ['status', 1];

        if(isset($criteria)) {
            $criteriaFields = ['name', 'LIKE', "%{$criteria}%"];
        }

        $comicBooks = ComicBook::where([$criteriaFields, $statusField ])->get();

        return new ValidResponse(
            [
                'status' => 'OK',
                'data' => $comicBooks,
            ]
        );
    }

    /**
     * Search comic books by Id
     * 
     * @param Request $request
     * @param string $id
     * @return Reponsable
     */
    public function getById(Request $request, string $id): Responsable
    {
        $statusField = ['status', 1];

        if(!isset($id)) {
            return new ClientErrorResponse(
                [
                    'status' => 'error',
                    'message' => 'missing params',
                ],
            );   
        }

        try {
            $book = ComicBook::where([['id', '=', $id], $statusField])
                ->first();

            return new ValidResponse(
                [
                    'status' => 'OK',
                    'data' => $book,
                ]
            );
        } catch (\Exception $exception) {
            return new ClientErrorResponse(
                [
                    'status' => 'error',
                    'message' => $exception->getMessage(),
                ],
                404
            );
        }
    }
}
