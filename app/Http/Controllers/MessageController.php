<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Resources\MessageResource;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 必要に応じてユーザー認証済みのメッセージだけ返すなど制御可能
        $messages = Message::with('user')->orderBy('created_at')->get();

        // userリレーションにユーザー名やavatarUrlがある想定
        return response()->json($messages);    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string',
        ]);

        $message = Message::create([
            'text' => $validated['text'],
            'user_id' => auth()->id(),
            'created_at' => now(),
        ]);

        //return response()->json($message->load('user'));
        return new MessageResource($message->load('user'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
