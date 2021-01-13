<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('scores');
    }
}
