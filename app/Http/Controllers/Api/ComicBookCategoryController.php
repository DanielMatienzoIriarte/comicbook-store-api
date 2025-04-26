<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ClientErrorResponse;
use App\Http\Responses\ValidResponse;
use Illuminate\Contracts\Support\Responsable;
use App\Models\Category;
use Illuminate\Http\Request;

class ComicBookCategoryController extends Controller
{
    /**
     * Returns all categories sorted by name descendent
     * 
     * @param Request $request
     * @return ValidResponse
     */
    public function get(Request $request): Responsable
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return new ValidResponse(
            [
                'status' => 'success',
                'categories' => $categories,
            ]
        );
    }
}
