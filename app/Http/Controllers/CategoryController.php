<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return CategoryResource::collection(Category::paginate(25));
    }


    public function show(Category $book)
{
    return new CategoryResource($book);
}

    public function destroy(Category $book)
    {

        if (auth('api')->user()->can('system')) {
            $book->delete();

            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Do not have permission'], 403);
        }


    }


}
