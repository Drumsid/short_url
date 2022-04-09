<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LinkStatistic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinkRedirectController extends Controller
{
    private $stat;

    public function __construct(LinkStatisticController $stat)
    {
        $this->stat = $stat;
    }

    public function redirect(Request $request, $shortLink) : RedirectResponse
    {
        $link = Link::where('short_link', $shortLink)->first();
        if ($link) {
            $statisticData = $this->stat->getStatistic($request, $link);
            $linkStat = new LinkStatistic();
            $linkStat->fill($statisticData);
            $linkStat->save();
            return redirect()->away($link->long_link);
        }
        return redirect()->route('mainPage')->with('warning', 'Warning! Short link das not exists!');
    }
}
