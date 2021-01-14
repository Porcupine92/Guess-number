<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct(Request $request)
    {
        $this->gameId = $request->gameId;
        $this->from = $request->from;
        $this->to = $request->to;
        $this->attempts = $request->attempts;
        $this->savedAttempts = $request->savedAttempts;
        $this->numberToGuess = $request->numberToGuess;
    }

    public function index(Request $request)
    {
        $data = [
            'gameId' => $this->gameId,
            'from' => $this->from,
            'to' => $this->to,
            'attempts' => $this->attempts,
            'savedAttempts' => $this->savedAttempts,
            'numberToGuess' => $this->numberToGuess
        ];

        if (isset($request->number)) {

            if (!is_numeric($request->number)) {
                return response()->json(['error' => 'Try to write a number']);
            }

            $number = $request->number;

            if ($this->savedAttempts > 1) {
                if ($number == $this->numberToGuess) {

                    $score = floor((($this->to - $this->from) / $this->attempts) * $this->savedAttempts);

                    $game = Game::find($this->gameId);
                    $game->score = $score;
                    $game->save();

                    $allGames = Game::orderBy('score', 'desc')
                        ->get();

                    foreach ($allGames as $key => $game) {
                        if ($game->id == $data['gameId']) {
                            $place = $key + 1;
                        }
                    }

                    return response()->json([
                        'status' => 'won',
                        'number' => $number,
                        'score' => $score,
                        'place' => $place
                        ]);

                } else {
                    $this->savedAttempts--;

                    $data['savedAttempts'] = $this->savedAttempts;

                    return view('game', [
                        'data' => $data
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'lose',
                    'number' => $this->numberToGuess,
                    'score' => 0,
                    'place' => 'none'
                    ]);
            }
        }

        return view('game', [
            'data' => $data
        ]);
    }
}
