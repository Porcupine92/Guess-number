@extends('layout')

@section('content')
<div class="root">
    <h1>Player</h1>
    <h3>Welcome: {{ $user->playerName }}</h3>

    <a href="{{ route('game') }}">Let's Play</a>
</div>
@endsection


