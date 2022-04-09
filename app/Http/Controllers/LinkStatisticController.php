<?php

namespace App\Http\Controllers;


use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LinkStatisticController extends Controller
{

    public function index() : View
    {
        $statistics = Link::with("linkStatistics")->get();
        return view("statistics.index", compact("statistics"));
    }

    public function getStatistic(Request $request, Link $link) : array
    {
        $statisticData = [];
        $statisticData["user_agent"] = $request->server("HTTP_USER_AGENT") ?? "no agent data";
        $statisticData["user_ip"] = $request->server("REMOTE_ADDR") ?? "no ip data";
        $statisticData["link_id"] = $link->id;
        return $statisticData;
    }
}
