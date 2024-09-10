@extends('layouts.users')
@section('page-title')
    Reviews
@endsection
@section('main-content')

    <div class="container p-4">
        <div class="row d-flex flex-center my-4">
            <div class="col-12">
                <h1 class="h2 text-white mb-4 text-center">Your statistics</h1>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <canvas id="barChart"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#barChart'), {
                                        type: 'bar',
                                        data: {
                                            labels:{!! json_encode($labels) !!},
                                            datasets: [{
                                                label: 'Voti Ricevuti',
                                                data: {!! json_encode($data) !!},
                                                backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                                            }]
                                        }
                                    })
                                })
                            </script>
                        </div>
                    </div>

                </div>
        </div>
    </div>
@endsection
