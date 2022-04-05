<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LinkRedirectController extends Controller
{
    public function redirect($shortLink)
    {
        $link = Link::where('short_link', $shortLink)->first();
        if ($link) {
            return redirect()->away($link->long_link);
        }
        return redirect()->route('mainPage')->with('errors', 'Error! Short link das not exists!');
    }
}
