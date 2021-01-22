<script>
        var barChartData1 = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
        ],
        datasets: [{
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,1)",
                data: [65, 59, 90, 81, 56, 55, 40]
            },
            {
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 96, 27, 100]
            }
        ]

    }
    var myLine0 = new Chart(document.getElementsByClassName("barchart")[0].getContext("2d")).Bar(barChartData1);
    var myLine1 = new Chart(document.getElementsByClassName("barchart")[1].getContext("2d")).Bar(barChartData1);
    var myLine2 = new Chart(document.getElementsByClassName("barchart")[2].getContext("2d")).Bar(barChartData1);
    var myLine3 = new Chart(document.getElementsByClassName("barchart")[3].getContext("2d")).Bar(barChartData1);
</script>