<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var datasimbaru = document.getElementById("sim-data-baru").getContext('2d');
    new Chart(datasimbaru, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ["SIM A", "SIM C", "SIM D", "SIM B1", "SIM B1 UMUM", "SIM B2", "SIM B2 UMUM", "SIM A UMUM",
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
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ["SIM A", "SIM C", "SIM D", "SIM B1", "SIM B1 UMUM", "SIM B2", "SIM B2 UMUM", "SIM A UMUM"
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