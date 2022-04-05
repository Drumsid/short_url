<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tags = Tags::all();
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
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:3|unique:tags,name',
        ]);

        $tag = new Tags();
        $tag->fill($data);
        $tag->save();
        return redirect()
            ->route('tags.index')->with('success', 'Tag added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tags  $tag
     * @return \Illuminate\View\View
     */
    public function show(Tags $tag)
    {
        return view("tags.show", compact("tag"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\View\View
     */
    public function edit(Tags $tag)
    {
        return view("tags.edit", compact("tag"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tags  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tags $tag)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:3|unique:tags,name',
        ]);

        $tag->fill($data);
        $tag->save();
        return redirect()
            ->route('tags.index')->with('success', 'Tag updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tags  $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tags $tag)
    {
        $tag->delete();
        return redirect()
            ->route('tags.index')->with('success', 'Tag deleted successfully!');
    }
}
