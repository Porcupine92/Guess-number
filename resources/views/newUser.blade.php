@extends('layout')

@section('content')
<div class="root">
    <h1>Player registration</h1>

    <form action="/new/validate" method="get" enctype="application/json">
        @csrf
        <label for="name">Player name</label>
        <input type="text" id="name" name="name" value="@isset($data['name']) {{ $data['name'] }} @endisset">
        <label for="from">The lowest number</label>
        <input type="text" id="from" name="from" value="@isset($data['from']) {{ $data['from'] }} @endisset">
        <label for="to">The highest number</label>
        <input type="text" id="to" name="to" value="@isset($data['to']) {{ $data['to'] }} @endisset">
        <label for="attempts">Number of attempts</label>
        <input type="text" id="attempts" name="attempts" value="@isset($data['attempts']) {{ $data['attempts'] }} @endisset">
        <button type="submit">Play</button>
    </form>
</div>
@endsection


