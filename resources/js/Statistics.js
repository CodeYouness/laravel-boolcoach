// Grafico Voti (Bar Chart)
const voteCtx = document.getElementById('voteChart').getContext('2d');
const data = document.getElementById('data');
const voteLabels = JSON.parse(data.getAttribute('data-vote-labels'));
const reviewData = JSON.parse(data.getAttribute('data-review-data'));
const messageData = JSON.parse(data.getAttribute('data-message-data'));
const messageLabels = JSON.parse(data.getAttribute('data-message-labels'));
const voteData = JSON.parse(data.getAttribute('data-vote-data'));
const voteChart = new Chart(voteCtx, {
    type: 'bar',
    data: {
        labels: voteLabels,  // Qui utilizziamo le variabili globali
        datasets: [{
            label: 'Numero di Voti',
            data: voteData,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },

    }
});

// Grafico Messaggi (Line Chart)
const messageCtx = document.getElementById('messageChart').getContext('2d');
const messageChart = new Chart(messageCtx, {
    type: 'line',
    data: {
        labels: messageLabels,
        datasets: [{
            label: 'Numero di Messaggi',
            data: messageData,
            backgroundColor: 'rgba(75, 192, 192, 1)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2,
            fill: false,
            tension: 0.3
        },
        {
            label: 'Numero di Recensioni',
            data: reviewData,
            backgroundColor: 'rgba(128, 0, 128, 1)',
            borderColor: 'rgba(128, 0, 128, 1)',
            borderWidth: 2,
            fill: false,
            tension: 0.3
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        transitions: {
            show: {
                animations: {
                    x: {
                        from: 0
                    },
                    y: {
                        from: 0
                    }
                }
            },
            hide: {
                animations: {
                    x: {
                        to: 0
                    },
                    y: {
                        to: 0
                    }
                }
            }
        }
    }
});
