<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // $data = '{ "name": "John" }';

        // return response($data)
        //     ->header('Content-Type', 'application/json');

        $data = $request;
        // header('Content-Type: application/json');
        // $data = json_encode($data);

        dump($data);
        return view('newUser', [
            'data' => $data
        ]);
    }

    public function create(Request $request)
    {
        dump($request);
        return view('newUser');
    }

    public function profile(int $id): View
    {
        $user = User::find($id);

        return view('user', [
            'user' => $user
        ]);
    }
}
