<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::all();
        return view("tags.index", compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("tags.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {
        $data = $request->validated();

        $tag = new Tag();
        $tag->fill($data);
        $tag->save();
        return redirect()
            ->route('tags.index')->with('success', 'Tag added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\View\View
     */
    public function show(Tag $tag)
    {
        return view("tags.show", compact("tag"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tags
     * @return \Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        return view("tags.edit", compact("tag"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $tag->fill($data);
        $tag->save();
        return redirect()
            ->route('tags.index')->with('success', 'Tag updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()
            ->route('tags.index')->with('success', 'Tag deleted successfully!');
    }
}
