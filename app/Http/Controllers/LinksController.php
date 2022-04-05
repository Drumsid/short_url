<?php

namespace App\Http\Controllers;

use App\Models\Links;
use App\Models\Tags;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $links = Links::all();
        return view("links.index", compact("links"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tags::pluck('name', 'id')->all();
        return view("links.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $link = new Links();
        $link->fill($request->all());
        $link->tags()->sync($request->tags);
        return redirect()->route('links.index')->with('success', 'Статья добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\Response
     */
    public function show(Links $links)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\Response
     */
    public function edit(Links $links)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Links $links)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Links  $links
     * @return \Illuminate\Http\Response
     */
    public function destroy(Links $links)
    {
        //
    }
}
