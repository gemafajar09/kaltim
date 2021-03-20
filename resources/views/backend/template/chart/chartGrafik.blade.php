@php
$tahun = date('Y');
$datasimA = array();
$datasimAu = array();
$datasimB1 = array();
$datasimB2 = array();
$datasimB1u = array();
$datasimB2u = array();
$datasimC = array();
$datasimD = array();
$datasimAp = array();
$datasimAup = array();
$datasimB1p = array();
$datasimB2p = array();
$datasimB1up = array();
$datasimB2up = array();
$datasimCp = array();
$datasimDp = array();

$datasimac = array();
$datasimacp = array();

$sla = array();
$slc = array();

$sba = array();
$sbc = array();

$sga = array();
$sgc = array();

$sma = array();
$smc = array();

$pengantara = array();
$pengantarc = array();
$pengantarac = array();

for($i = 1; $i < 13; $i++)
{
    $bulan = str_pad($i, 2 , "0", STR_PAD_LEFT);
    if(session('user_level') == 1)
    {
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
            DB::raw('SUM(data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper'),
            DB::raw('SUM(gerai_a) as geraia'),
            DB::raw('SUM(gerai_c) as geraic'),
            DB::raw('SUM(mpp_a) as mppa'),
            DB::raw('SUM(mpp_c) as mppc')
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

        $simling = DB::table('tb_simlink')
                ->where(DB::raw('MONTH(tanggal)'),$bulan)
                ->where(DB::raw('YEAR(tanggal)'),$tahun)
                ->select(
                    DB::raw('SUM(simlink1_a) as sl1a'),
                    DB::raw('SUM(simlink2_a) as sl2a'),
                    DB::raw('SUM(simlink1_c) as sl1c'),
                    DB::raw('SUM(simlink2_c) as sl2c')
                )
                ->first();

        $simbus = DB::table('tb_bus')
                ->where(DB::raw('MONTH(tanggal)'),$bulan)
                ->where(DB::raw('YEAR(tanggal)'),$tahun)
                ->select(
                    DB::raw('SUM(bus_a) as bus_a'),
                    DB::raw('SUM(bus_c) as bus_c')
                )
                ->first();
    }elseif(session('user_level') == 2){
        $idcabang = session('cabang_id');
        $simAbaru = DB::table('tb_data_polres')
        ->where('polres_id',$idcabang)
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
            DB::raw('SUM(data_polres_sim_b2_umum_perpanjang) as simb2ubaruumper'),
            DB::raw('SUM(gerai_a) as geraia'),
            DB::raw('SUM(gerai_c) as geraic'),
            DB::raw('SUM(mpp_a) as mppa'),
            DB::raw('SUM(mpp_c) as mppc')
        )
        ->first();

        $pengantar = DB::table('tb_detail')
                ->where('id_cabang',$idcabang)
                ->where(DB::raw('MONTH(tanggal)'),$bulan)
                ->where(DB::raw('YEAR(tanggal)'),$tahun)
                ->select(
                    DB::raw('SUM(sim_a_baru) as pengantara'),
                    DB::raw('SUM(sim_c_baru) as pengantarc'),
                    DB::raw('SUM(sim_ac_baru) as pengantarac')
                )
                ->first();

        $simling = DB::table('tb_simlink')
                ->where('id_cabang',$idcabang)
                ->where(DB::raw('MONTH(tanggal)'),$bulan)
                ->where(DB::raw('YEAR(tanggal)'),$tahun)
                ->select(
                    DB::raw('SUM(simlink1_a) as sl1a'),
                    DB::raw('SUM(simlink2_a) as sl2a'),
                    DB::raw('SUM(simlink1_c) as sl1c'),
                    DB::raw('SUM(simlink2_c) as sl2c')
                )
                ->first();
        
        $simbus = DB::table('tb_bus')
                ->where(DB::raw('MONTH(tanggal)'),$bulan)
                ->where(DB::raw('YEAR(tanggal)'),$tahun)
                ->select(
                    DB::raw('SUM(bus_a) as bus_a'),
                    DB::raw('SUM(bus_c) as bus_c')
                )
                ->first();
    }else{
        $idcabang = session('cabang_id');
        $bulan = str_pad($i, 2 , "0", STR_PAD_LEFT);
        $simAbaru = DB::table('tb_data_biro')
        ->where('biro_id',$idcabang)
        ->where(DB::raw('MONTH(data_biro_tgl)'),$bulan)
        ->where(DB::raw('YEAR(data_biro_tgl)'),$tahun)
        ->select(
            DB::raw('SUM(data_biro_sim_a_baru) as simabaru'),
            DB::raw('SUM(data_biro_sim_c_baru) as simcbaru'),
            DB::raw('SUM(data_biro_sim_ac_baru) as simacbaru'),
            DB::raw('SUM(data_biro_sim_a_perpanjang) as simabarup'),
            DB::raw('SUM(data_biro_sim_c_perpanjang) as simcbarup'),
            DB::raw('SUM(data_biro_sim_ac_perpanjang) as simacbarup')
        )->first();   
    }

    if(session('user_level') == 1 || session('user_level') == 2)
    {
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

        $sla[] = ($simling->sl1a + $simling->sl2a) != null ?  ($simling->sl1a + $simling->sl2a) : 0; 
        $slc[] = ($simling->sl1c + $simling->sl2c) != null ?  ($simling->sl1c + $simling->sl2c) : 0; 

        $sba[] = $simbus->bus_a;
        $sbc[] = $simbus->bus_c;
        
        $sga[] = $simAbaru->geraia;
        $sgc[] = $simAbaru->geraic;
        
        $sma[] = $simAbaru->mppa;
        $smc[] = $simAbaru->mppc;

        $pengantara[] = $pengantar->pengantara != null ? $pengantar->pengantara : 0;
        $pengantarc[] = $pengantar->pengantarc != null ? $pengantar->pengantarc : 0;
        $pengantarac[] = $pengantar->pengantarac != null ? $pengantar->pengantarac : 0;

    }else{
            $datasimA[] = $simAbaru->simabaru != null ? $simAbaru->simabaru : 0;
            $datasimC[] = $simAbaru->simcbaru != null ? $simAbaru->simcbaru : 0;
            $datasimac[] = $simAbaru->simacbaru != null ? $simAbaru->simacbaru : 0;
            $datasimAP[] = $simAbaru->simabarup != null ? $simAbaru->simabarup : 0;
            $datasimCP[] = $simAbaru->simcbarup != null ? $simAbaru->simcbarup : 0;
            $datasimacp[] = $simAbaru->simacbarup != null ? $simAbaru->simacbarup : 0;
    }
}
@endphp
@if(Session('user_level') == 1 || Session('user_level') == 2)
<script>
    // sim a b
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

    // sim c b
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

    // sim d b
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

    // sim au
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

    // sim b1
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
    
    // sim b1u
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
    
    // sim b2
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
    
    // sim b2u
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

    // sim a p
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

    // sim au p
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
    
    // sim c p
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

    // sim d p
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
    
    // sim b1
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

    // sim b1u
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
    
    // sim b2
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

    // sim b2u
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

    // sim a p
    var sla = document.getElementsByClassName("barchart")[16].getContext('2d');
    new Chart(sla, {
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
                data: <?= json_encode($sla) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim au p
    var slc = document.getElementsByClassName("barchart")[17].getContext('2d');
    new Chart(slc, {
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
                data: <?= json_encode($slc) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim c p
    var sba = document.getElementsByClassName("barchart")[18].getContext('2d');
    new Chart(sba, {
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
                data: <?= json_encode($sba) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim sga
    var sbc = document.getElementsByClassName("barchart")[19].getContext('2d');
    new Chart(sbc, {
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
                data: <?= json_encode($sbc) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim sgc
    var sga = document.getElementsByClassName("barchart")[20].getContext('2d');
    new Chart(sga, {
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
                data: <?= json_encode($sga) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });

    // sim sma
    var sgc = document.getElementsByClassName("barchart")[21].getContext('2d');
    new Chart(sgc, {
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
                data: <?= json_encode($sgc) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim smc
    var sma = document.getElementsByClassName("barchart")[22].getContext('2d');
    new Chart(sma, {
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
                data: <?= json_encode($sma) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // sim smc
    var smc = document.getElementsByClassName("barchart")[23].getContext('2d');
    new Chart(smc, {
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
                data: <?= json_encode($smc) ?>
            }]
        },

        // Configuration options go here
        options: {}
    });
    
    // BIRO A
    var pengantara = document.getElementsByClassName("barchart")[24].getContext('2d');
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
    
    // BIRO C
    var pengantarc = document.getElementsByClassName("barchart")[25].getContext('2d');
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
    
    // BIRO AC
    var pengantarac = document.getElementsByClassName("barchart")[26].getContext('2d');
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
    @else
    <script>
        var ab = document.getElementsByClassName("birogrf")[0].getContext('2d');
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
        
        var cb = document.getElementsByClassName("birogrf")[1].getContext('2d');
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
        
        var acb = document.getElementsByClassName("birogrf")[2].getContext('2d');
        new Chart(acb, {
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
                    data: <?= json_encode($datasimac) ?>
                }]
            },

            // Configuration options go here
            options: {}
        });
        
        var ap = document.getElementsByClassName("birogrf")[3].getContext('2d');
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
                    data: <?= json_encode($datasimAP) ?>
                }]
            },

            // Configuration options go here
            options: {}
        });
        
        var cp = document.getElementsByClassName("birogrf")[4].getContext('2d');
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
                    data: <?= json_encode($datasimCP) ?>
                }]
            },

            // Configuration options go here
            options: {}
        });
        
        var acp = document.getElementsByClassName("birogrf")[5].getContext('2d');
        new Chart(acp, {
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
                    data: <?= json_encode($datasimacp) ?>
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
    @endif