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
    var siamabaru = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimA) ?>
            }
        ]

    }
    // sim a umum
    var siamabaruumum = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimAumum) ?>
            }
        ]

    }
    // sim b1
    var siamb1baru = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimB1) ?>
            }
        ]

    }
    // sim b2
    var siamb2baru = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimB2) ?>
            }
        ]

    }
    // sim c
    var siamcbaru = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimC) ?>
            }
        ]

    }
    // sim d
    var siamdbaru = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimD) ?>
            }
        ]

    }

    // sim perpanjang

    var siamabarup = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimAP) ?>
            }
        ]

    }
    // sim a umum
    var siamabaruumump = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimAumumP) ?>
            }
        ]

    }
    // sim b1
    var siamb1barup = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimB1P) ?>
            }
        ]

    }
    // sim b2
    var siamb2barup = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimB2P) ?>
            }
        ]

    }
    // sim c
    var siamcbarup = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimCP) ?>
            }
        ]

    }
    // sim d
    var siamdbarup = {
        labels: ["January", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September",
            "October", "November", "Desember"
        ],
        datasets: [{
                fillColor: "rgba(55,20,220,0.5)",
                strokeColor: "rgba(110,50,120,1)",
                data: <?= json_encode($datasimDP) ?>
            }
        ]

    }

    var myLine0 = new Chart(document.getElementsByClassName("barchart")[0].getContext("2d")).Bar(siamabaru);
    var myLine1 = new Chart(document.getElementsByClassName("barchart")[1].getContext("2d")).Bar(siamabaruumum);
    var myLine2 = new Chart(document.getElementsByClassName("barchart")[2].getContext("2d")).Bar(siamb1baru);
    var myLine3 = new Chart(document.getElementsByClassName("barchart")[3].getContext("2d")).Bar(siamb2baru);
    var myLine4 = new Chart(document.getElementsByClassName("barchart")[4].getContext("2d")).Bar(siamcbaru);
    var myLine5 = new Chart(document.getElementsByClassName("barchart")[5].getContext("2d")).Bar(siamdbaru);
    var myLine6 = new Chart(document.getElementsByClassName("barchart")[6].getContext("2d")).Bar(siamabarup);
    var myLine7 = new Chart(document.getElementsByClassName("barchart")[7].getContext("2d")).Bar(siamabaruumump);
    var myLine8 = new Chart(document.getElementsByClassName("barchart")[8].getContext("2d")).Bar(siamb1barup);
    var myLine9 = new Chart(document.getElementsByClassName("barchart")[9].getContext("2d")).Bar(siamb2barup);
    var myLine10 = new Chart(document.getElementsByClassName("barchart")[10].getContext("2d")).Bar(siamcbarup);
    var myLine11 = new Chart(document.getElementsByClassName("barchart")[11].getContext("2d")).Bar(siamdbarup);
</script> 