@extends('layout')

@section('content')
<div class="root">
    <h1>Guess number</h1>
    <form action="">
        <label for="number">The guessed number</label>
        <input type="text" id="number" value="">

        <button type="submit">Check</button>
    </form>
</div>
@endsection
