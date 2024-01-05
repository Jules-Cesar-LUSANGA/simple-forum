<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Discussion $discussion, CommentRequest $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->discussion_id = $discussion->id;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->back();
    }
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return to_route('discussions.show', $comment->discussion->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted');
    }
}
