<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = \App\Models\Matches::with('homeTeam', 'awayTeam', 'competition')->get();

        return view('matches.index', compact('matches'));
    }
}
