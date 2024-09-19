@extends('layouts.users')
@section('page-title')
    Statistics
@endsection
@section('main-content')
<h1>Statistiche Recensioni e Messaggi</h1>

    <h2>Voti per Mese</h2>
    <canvas id="voteChart"></canvas>

    <h2>Messaggi per Mese</h2>
    <canvas id="messageChart"></canvas>

    <div id="data"
        data-message-labels="{{ json_encode($messageLabels) }}"
        data-review-data="{{ json_encode($reviewData) }}"
        data-message-data="{{ json_encode($messageData) }}"
        data-vote-labels="{{ json_encode($voteLabels) }}"
        data-vote-data="{{ json_encode($voteData)}}">
    </div>

    @vite('resources/js/Statistics.js')
@endsection
