<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        return MessageResource::collection(Message::paginate(25));
    }


    public function show(Message $book)
    {
        return new MessageResource($book);
    }

    public function store(Request $request)
    {

        $book = Message::create([
            'send_user_id' => $request->input('send_user_id'),
            'receiver_user_id' => $request->input('receiver_user_id'),
            'text_message' => $request->input('text_message'),
            'video_link' => $request->input('video_link'),
            'image_link' => $request->input('image_link')
        ]);

        return new MessageResource($book);
    }


    public function update(Request $request, Message $book)
    {
        $book->update($request->only(['text_message', 'video_link', 'image_link']));

        return new MessageResource($book);
    }

    public function destroy(Message $book)
    {

        if (auth('api')->user()->can('system')) {
            $book->delete();

            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Do not have permission'], 403);
        }


    }


}
