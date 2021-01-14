<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\JsonResponse;

class ScoresController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $data = [];

        $allGames = Game::orderBy('score', 'desc')
                        ->limit(30)
                        ->get();

        foreach ($allGames as $game) {
            $data[] = ['playerName' => $game->playerName, 'score' => $game->score];
        }

        return response()->json($data);
    }
}
