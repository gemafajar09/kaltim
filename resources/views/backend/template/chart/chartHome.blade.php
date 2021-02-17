<script>
    var datasimbaru = document.getElementById("sim-data-baru").getContext('2d');
    new Chart(datasimbaru, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["SIM A", "SIM A UMUM", "SIM B1", "SIM B2", "SIM C", "SIM D"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimbaru) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    // perpanjang
    var datasimperpanjang = document.getElementById("sim-data-perpanjang").getContext('2d');
    new Chart(datasimperpanjang, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["SIM A", "SIM A UMUM", "SIM B1", "SIM B2", "SIM C", "SIM D"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimperpanjang) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    </script>