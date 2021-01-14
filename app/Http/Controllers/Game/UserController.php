<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewGameRequest;
use App\Models\Game;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request): View
    {
        $data = $request->all();

            if (empty($data['name'])) {
                $data['name'] = 'Unnamed player';
            }
            if (empty($data['from'])) {
                $data['from'] = 1;
            }
            if (empty($data['to'])) {
                $data['to'] = 9;
            }
            if (empty($data['attempts'])) {
                $data['attempts'] = 3;
            }

            return view('newUser', [
                'data' => $data
            ]);
    }

    public function validation(Request $request)
    {
        $data = $request->all();

        if (!is_numeric($data['from']) || !is_numeric($data['to']) || !is_numeric($data['attempts'])) {
            return response()->json(['error' => 'Form fields with number in theirs name must be a number']);
        } elseif ($data['from'] <= 0 || $data['from'] >= ($data['to'] - 2)) {
            return response()->json(['error' => 'Field with the lowest number must be grater than 0 and at least 2 smaller than field with the highest number']);
        } elseif ($data['to'] <= 2 || $data['to'] <= ($data['from'] + 2)) {
            return response()->json(['error' => 'Field with the highest number must be grater than 2 and at least 2 bigger than field with the lowest number']);
        } elseif ($data['attempts'] <= 0) {
            return response()->json(['error' => 'Field with number of attempts must be grater than 0']);
        } else {

            $game = new Game;

            $game->playerName = $data['name'];
            $game->from = $data['from'];
            $game->to = $data['to'];
            $game->attempts = $data['attempts'];
            $game->score = 0;

            $game->save();

            $numberToGuess = rand($data['from'], $data['to']);

            $data['gameId'] = $game->id;

            $data['numberToGuess'] = $numberToGuess;

            $data['savedAttempts'] = $data['attempts'];

            return redirect(route('game.index', $data));
        }
    }
}
