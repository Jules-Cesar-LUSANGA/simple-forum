<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscussionRequest;
use App\Http\Requests\DiscussionRequest;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discussions = Discussion::with(['user', 'category'])->orderByDesc('id')->paginate(10);

        return view('discussions.index', compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get categories
        $categories = $this->categories();;

        return view('discussions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscussionRequest $request)
    {
        // Create the discussion
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $discussion = Discussion::create($data);
       
        return to_route('discussions.show', $discussion->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Discussion $discussion)
    {
        $discussion->load(['user','category', 'comments',]);

        return view('discussions.show', compact('discussion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discussion $discussion)
    {
        $categories = $this->categories();
        return view('discussions.edit', compact('discussion', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscussionRequest $request, Discussion $discussion)
    {
        $discussion->update($request->validated());

        return to_route('discussions.show', $discussion->id)->with('success', 'Discussion updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discussion $discussion)
    {
        $discussion->delete();

        return to_route('discussions.index')->with('success', 'Discussion deleted successfully');
    }

    /**
     * Get all categories
     * @return Collection
     */

    public function categories() : Collection
    {
        return Category::all();
    }

    public function close(Discussion $discussion)
    {
        // Set a discussion solved
        $discussion->resolved = true;
        $discussion->save();

        return redirect()->back();
    }
}
