<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\JsonResponse;

class ScoresController extends Controller
{
    public function __invoke(): JsonResponse
    {
        // Tutaj pobieramy wszytskie wyniki użytkowników
        // Sprawdzamy ilość tych wyników. Jeśli ich ilość jest większa od 30,
        // ograniczamy wyniki do 30 najwyższych i je wyświetlamy jsonem
        // w postaci tablicy gdzie każdy rekord to nazwa użytkownika i jego wynik

        $data = [];

        $allGames = Game::orderBy('score', 'desc')
                        ->limit(30)
                        ->get();

        foreach ($allGames as $game) {
            $data[] = ['playerName' => $game->playerName, 'score' => $game->score];
        }

        // dd($allGames);

        return response()->json($data);
    }
}
