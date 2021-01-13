@extends('layout')

@section('content')
<div class="root">
    <h1>Player registration</h1>
    <form action="">
        <label for="name">Player name</label>
        <input type="text" id="name" value="{{ $data->name }}">
        <label for="from">The lowest number</label>
        <input type="number" id="from" value="{{ $data->from }}">
        <label for="to">The highest number</label>
        <input type="number" id="to" value="{{ $data->to }}">
        <label for="attempts">Number of attempts</label>
        <input type="number" id="attempts" value="{{ $data->attempts }}">

        <button type="submit">Register</button>
    </form>
</div>
@endsection


