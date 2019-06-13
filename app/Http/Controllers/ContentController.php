<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContentResource;
use App\Models\Content;
use Illuminate\Http\Request;


class ContentController extends Controller
{

    public function index()
    {
        return ContentResource::collection(Content::paginate(25));
    }


    public function show(Content $book)
    {
        return new ContentResource($book);
    }

    public function store(Request $request)
    {

        $book = Content::create([
            'user_id' => $request->input('user_id'),
            'text_content' => $request->input('text_content'),
            'video_link' => $request->input('video_link'),
            'image_link' => $request->input('image_link')
        ]);

        return new ContentResource($book);
    }


    public function update(Request $request, Content $book)
    {

        $book->update($request->only(['text_content', 'video_link', 'image_link']));

        return new ContentResource($book);
    }


    public function destroy(Content $book)
    {

        if (auth('api')->user()->can('system')) {
            $book->delete();

            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Do not have permission'], 403);
        }


    }


}
