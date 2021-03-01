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
$pengantara = array();
$pengantarc = array();
$pengantarac = array();
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
        DB::raw('SUM(data_polres_sim_d_perpanjang) as simdbarup'),
        DB::raw('SUM(data_polres_sim_b1_umum) as simb1ubaruum'),
        DB::raw('SUM(data_polres_sim_b2_umum) as simb2ubaruum'),
        DB::raw('SUM(data_polres_sim_b1_umum_perpanjang) as simb1ubaruumper'),
        DB::raw('SUM(data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper')
    )
    ->first();

    $pengantar = DB::table('tb_detail')
            ->where(DB::raw('MONTH(tanggal)'),$bulan)
            ->where(DB::raw('YEAR(tanggal)'),$tahun)
            ->select(
                DB::raw('SUM(sim_a_baru) as pengantara'),
                DB::raw('SUM(sim_c_baru) as pengantarc'),
                DB::raw('SUM(sim_ac_baru) as pengantarac')
            )
            ->first();

    $datasimA[] = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
    $datasimC[] = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
    $datasimD[] = $simAbaru->simdbaru != null ? $simAbaru->simdbaru : 0;
    $datasimAu[] = $simAbaru->simabaruumum != null ? $simAbaru->simabaruumum : 0;
    $datasimB1[] = $simAbaru->simb1baru != null ? $simAbaru->simb1baru : 0;
    $datasimB1u[] = $simAbaru->simb1ubaruum != null ? $simAbaru->simb1ubaruum : 0;
    $datasimB2[] = $simAbaru->simb2baru != null ? $simAbaru->simb2baru : 0;
    $datasimB2u[] = $simAbaru->simb2ubaruum != null ? $simAbaru->simb2ubaruum : 0;
    $datasimAp[] = $simAbaru->simabarup != null ? $simAbaru->simabaru : 0;
    $datasimAup[] = $simAbaru->simabaruumump != null ? $simAbaru->simabaruumump : 0;
    $datasimCp[] = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
    $datasimDp[] = $simAbaru->simdbarup != null ? $simAbaru->simdbarup : 0;
    $datasimB1p[] = $simAbaru->simb1barup != null ? $simAbaru->simb1barup : 0;
    $datasimB1up[] = $simAbaru->simb1ubaruumper != null ? $simAbaru->simb1ubaruumper : 0;
    $datasimB2p[] = $simAbaru->simb2barup != null ? $simAbaru->simb2barup : 0;
    $datasimB2up[] = $simAbaru->simb2ubaruumper != null ? $simAbaru->simb2ubaruumper : 0;
    $pengantara[] = $pengantar->pengantara != null ? $pengantar->pengantara : 0;
    $pengantarc[] = $pengantar->pengantarc != null ? $pengantar->pengantarc : 0;
    $pengantarac[] = $pengantar->pengantarac != null ? $pengantar->pengantarac : 0;
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
    var cb = document.getElementsByClassName("barchart")[1].getContext('2d');
    new Chart(cb, {
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

    // sim b1
    var db = document.getElementsByClassName("barchart")[2].getContext('2d');
    new Chart(db, {
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

    // sim b2
    var au = document.getElementsByClassName("barchart")[3].getContext('2d');
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
                data: <?= json_encode($datasimAu) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim c
    var b1 = document.getElementsByClassName("barchart")[4].getContext('2d');
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
    
    // sim d
    var b1u = document.getElementsByClassName("barchart")[5].getContext('2d');
    new Chart(b1u, {
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
                data: <?= json_encode($datasimB1u) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim perpanjang
    var b2 = document.getElementsByClassName("barchart")[6].getContext('2d');
    new Chart(b2, {
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
    
    // sim perpanjang
    var b2u = document.getElementsByClassName("barchart")[7].getContext('2d');
    new Chart(b2u, {
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
                data: <?= json_encode($datasimB2u) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim a umum
    var ap = document.getElementsByClassName("barchart")[8].getContext('2d');
    new Chart(ap, {
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
                data: <?= json_encode($datasimAp) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim b1
    var aup = document.getElementsByClassName("barchart")[9].getContext('2d');
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
                data: <?= json_encode($datasimAup) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim b2
    var cp = document.getElementsByClassName("barchart")[10].getContext('2d');
    new Chart(cp, {
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
                data: <?= json_encode($datasimCp) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim c
    var dp = document.getElementsByClassName("barchart")[11].getContext('2d');
    new Chart(dp, {
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
                data: <?= json_encode($datasimDp) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim d
    var b1p = document.getElementsByClassName("barchart")[12].getContext('2d');
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
                data: <?= json_encode($datasimB1p) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim d
    var b1up = document.getElementsByClassName("barchart")[13].getContext('2d');
    new Chart(b1up, {
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
                data: <?= json_encode($datasimB1up) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim d
    var b2p = document.getElementsByClassName("barchart")[14].getContext('2d');
    new Chart(b2p, {
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
                data: <?= json_encode($datasimB2p) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim d
    var b2up = document.getElementsByClassName("barchart")[15].getContext('2d');
    new Chart(b2up, {
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
                data: <?= json_encode($datasimB2up) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim d
    var pengantara = document.getElementsByClassName("barchart")[16].getContext('2d');
    new Chart(pengantara, {
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
                data: <?= json_encode($pengantara) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim d
    var pengantarc = document.getElementsByClassName("barchart")[17].getContext('2d');
    new Chart(pengantarc, {
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
                data: <?= json_encode($pengantarc) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim d
    var pengantarac = document.getElementsByClassName("barchart")[18].getContext('2d');
    new Chart(pengantarac, {
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
                data: <?= json_encode($pengantarac) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim d
    var pengantarac = document.getElementsByClassName("barchart")[19].getContext('2d');
    new Chart(pengantarac, {
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
                data: <?= json_encode($pengantarac) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    </script>