<script>
    var datasimbaru = {
        labels: ["SIM A", "SIM A UMUM", "SIM B1", "SIM B2", "SIM C", "SIM D"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimbaru) ?>
            }
        ]

    }
    // perpanjang
    var datasimperpanjang = {
        labels: ["SIM A", "SIM A UMUM", "SIM B1", "SIM B2", "SIM C", "SIM D"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimperpanjang) ?>
            }
        ]

    }
    // element
    var baru = new Chart(document.getElementById("sim-data-baru").getContext("2d")).Bar(datasimbaru);
    var perpanjang = new Chart(document.getElementById("sim-data-perpanjang").getContext("2d")).Bar(datasimperpanjang);
</script>