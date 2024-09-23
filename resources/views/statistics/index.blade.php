@extends('layouts.users')
@section('page-title')
    Statistiche
@endsection
@section('main-content')
<h1 class="text-center m-4 text-white">Statistiche Recensioni e Messaggi</h1>

<div class="container my-4 text-white">
    <div class="row">
        <div class="col-12 col-md-6">
            <h2>Voti per mese</h2>
            <canvas id="voteChart"></canvas>
        </div>
        <div class="col-12 col-md-6">

            <h2>Messaggi e recensioni per mese</h2>
            <canvas id="messageChart"></canvas>
        </div>
    </div>
</div>


    <div id="data"
        data-message-labels="{{ json_encode($messageLabels) }}"
        data-review-data="{{ json_encode($reviewData) }}"
        data-message-data="{{ json_encode($messageData) }}"
        data-vote-labels="{{ json_encode($voteLabels) }}"
        data-vote-data="{{ json_encode($voteData)}}">
    </div>

    @vite('resources/js/Statistics.js')
@endsection
