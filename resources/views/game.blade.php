@extends('layout')

@section('content')
<div class="root">
    <h1>Guess number</h1>
    <form action="" method="get" enctype="application/json">
        @csrf
        <label for="number">Enter the guess number</label>
        <input type="text" id="number" name="number" value="">
        <div>Attempts remain: {{ $data['savedAttempts'] }}</div>

        <input type="hidden" name="gameId" value="{{ $data['gameId'] }}">
        <input type="hidden" name="from" value="{{ $data['from'] }}">
        <input type="hidden" name="to" value="{{ $data['to'] }}">
        <input type="hidden" name="attempts" value="{{ $data['attempts'] }}">
        <input type="hidden" name="savedAttempts" value="{{ $data['savedAttempts'] }}">
        <input type="hidden" name="numberToGuess" value="{{ $data['numberToGuess'] }}">

        <button type="submit">Check</button>
    </form>
</div>
@endsection
