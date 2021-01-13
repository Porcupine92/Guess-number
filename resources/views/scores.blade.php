@extends('layout')

@section('content')
<div class="root">
    <h1>Scores</h1>
        <h2>Player Name</h2>
        <div>{{ $data->name }}</div>
        <h2>Score</h2>
        <div>{{ $data->score }}</div>
        <h2>Place</h2>
        <div>{{ $data->place }}</div>
</div>
@endsection
