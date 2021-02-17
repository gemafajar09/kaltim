@php
$tahun = date('Y');
$datasimA = array();
$datasimAumum = array();
$datasimB1 = array();
$datasimB2 = array();
$datasimC = array();
$datasimD = array();
$datasimAP = array();
$datasimAumumP = array();
$datasimB1P = array();
$datasimB2P = array();
$datasimCP = array();
$datasimDP = array();
for($i = 1; $i < 13; $i++)
{
    $bulan = str_pad($i, 2 , "0", STR_PAD_LEFT);
    $simAbaru = DB::table('tb_data_polres')
    ->where(DB::raw('MONTH(data_polres_tgl)'),$bulan)
    ->where(DB::raw('YEAR(data_polres_tgl)'),$tahun)
    ->select(
        DB::raw('SUM(data_polres_sim_a_baru) as simabaru'),
        DB::raw('SUM(data_polres_sim_a_umum_baru) as simabaruumum'),
        DB::raw('SUM(data_polres_sim_b1_baru) as simb1baru'),
        DB::raw('SUM(data_polres_sim_b2_baru) as simb2baru'),
        DB::raw('SUM(data_polres_sim_c_baru) as simcbaru'),
        DB::raw('SUM(data_polres_sim_d_baru) as simdbaru'),
        DB::raw('SUM(data_polres_sim_a_perpanjang) as simabarup'),
        DB::raw('SUM(data_polres_sim_a_umum_perpanjang) as simabaruumump'),
        DB::raw('SUM(data_polres_sim_b1_perpanjang) as simb1barup'),
        DB::raw('SUM(data_polres_sim_b2_perpanjang) as simb2barup'),
        DB::raw('SUM(data_polres_sim_c_perpanjang) as simcbarup'),
        DB::raw('SUM(data_polres_sim_d_perpanjang) as simdbarup')
    )
    ->first();
    $datasimA[] = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
    $datasimAumum[] = $simAbaru->simabaruumum != null ? $simAbaru->simabaruumum : 0;
    $datasimB1[] = $simAbaru->simb1baru != null ? $simAbaru->simb1baru : 0;
    $datasimB2[] = $simAbaru->simb2baru != null ? $simAbaru->simb2baru : 0;
    $datasimC[] = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
    $datasimD[] = $simAbaru->simdbaru != null ? $simAbaru->simdbaru : 0;
    $datasimAP[] = $simAbaru->simabarup != null ? $simAbaru->simabaru : 0;
    $datasimAumumP[] = $simAbaru->simabaruumump != null ? $simAbaru->simabaruumump : 0;
    $datasimB1P[] = $simAbaru->simb1barup != null ? $simAbaru->simb1barup : 0;
    $datasimB2P[] = $simAbaru->simb2barup != null ? $simAbaru->simb2barup : 0;
    $datasimCP[] = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
    $datasimDP[] = $simAbaru->simdbarup != null ? $simAbaru->simdbarup : 0;
}
@endphp
<script>
    var ab = document.getElementsByClassName("barchart")[0].getContext('2d');
    new Chart(ab, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimA) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim a umum
    var au = document.getElementsByClassName("barchart")[1].getContext('2d');
    new Chart(au, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimAumum) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim b1
    var b1 = document.getElementsByClassName("barchart")[2].getContext('2d');
    new Chart(b1, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimB1) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim b2
    var siamb2baru = document.getElementsByClassName("barchart")[3].getContext('2d');
    new Chart(siamb2baru, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimB2) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim c
    var siamcbaru = document.getElementsByClassName("barchart")[4].getContext('2d');
    new Chart(siamcbaru, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimC) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim d
    var siamdbaru = document.getElementsByClassName("barchart")[5].getContext('2d');
    new Chart(siamdbaru, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimD) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim perpanjang

    var abp = document.getElementsByClassName("barchart")[6].getContext('2d');
    new Chart(abp, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimAP) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    // sim a umum
    var aup = document.getElementsByClassName("barchart")[7].getContext('2d');
    new Chart(aup, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimAumumP) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    // sim b1
    var b1p = document.getElementsByClassName("barchart")[8].getContext('2d');
    new Chart(b1p, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimB1P) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    // sim b2
    var siamb2barup = document.getElementsByClassName("barchart")[9].getContext('2d');
    new Chart(siamb2barup, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimB2P) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim c
    var siamcp = document.getElementsByClassName("barchart")[10].getContext('2d');
    new Chart(siamcp, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimCP) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim d
    var siamdp = document.getElementsByClassName("barchart")[11].getContext('2d');
    new Chart(siamdp, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
            datasets: [{
                // label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($datasimDP) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    </script>