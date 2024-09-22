<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
class MatchController extends Controller
{
    public function index()
    {
        $competition_with_matches = Competition::with('matches.homeTeam', 'matches.awayTeam')->get();

        return view('matches.index', compact('competition_with_matches'));
    }
}
