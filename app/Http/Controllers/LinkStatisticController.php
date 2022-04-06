<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class LinkStatisticController extends Controller
{
    public function getStatistic($request, $link)
    {
        $statisticData = [];
        $statisticData["user_agent"] = $request->server("HTTP_USER_AGENT") ?? "no agent data";
        $statisticData["user_ip"] = $request->server("REMOTE_ADDR") ?? "no ip data";
        $statisticData["link_id"] = $link->id;
        return $statisticData;
    }
}
