<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contracts\Search;

class SearchController extends Controller
{
    public function index (Search $search, Request $request) 
    {
    $results = $search->index('getstarted_actors')
                      ->get($request->name);
    return view('pages.search', compact('results'));
    }
}
