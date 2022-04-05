<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Tag;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    private $generateLink;

    public function __construct(GenerateShortLinkController $generateLink)
    {
        $this->generateLink = $generateLink;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $links = Link::all();
        return view("links.index", compact("links"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::pluck('name', 'id')->all();
        return view("links.create", compact("tags"));
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
            'title' => 'required|min:3|unique:links,title',
            'long_link' => 'required|min:3',
        ]);
        $data["short_link"] = $this->generateLink->generateShortLink();
        $link = new Link();
        $link->fill($data);
        $link->save();
        $link->tags()->sync($request->tags);
        return redirect()->route('links.index')->with('success', 'Ссылка добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\View\View
     */
    public function show(Link $link)
    {
        return view("links.show", compact("link"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
//     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
//        dd($link);
//        $link = Link::where('id', $link)->first();
//        if (! $link) {
//            return back()->with('error', 'Ссылка не найдена!');
//        }
        $tags = Tag::pluck('name', 'id')->all();
        return view('links.edite', compact('link',  'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Link $link)
    {
        $data = $this->validate($request, [
//            'title' => 'required|min:3|unique:links,title',
            'long_link' => 'required|min:3',
        ]);

        $link->update($data);
        $link->tags()->sync($request->tags);
        return redirect()->route('links.index')->with('success', 'Ссылка обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $links
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()
            ->route('links.index')->with('success', 'Link deleted successfully!');
    }
}
