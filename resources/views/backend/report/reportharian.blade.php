
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // header("Content-type: application/vnd-ms-excel");
    // header("Content-Disposition: attachment; filename=laporan-harian-".date('Y-m-d').".xls");
    $cb = 0;
    $ab = 0;
    $b1b = 0;
    $b2b = 0;
    $aub = 0;
    $b1ub = 0;
    $b2ub = 0;

    $cp = 0;
    $ap = 0;
    $b1p = 0;
    $b2p = 0;
    $aup = 0;
    $b1up = 0;
    $b2up = 0;

    $jumlah = 0;
    $rusak = 0;
    $total = 0;
?>
    <table>
        <thead>
            <tr>
                <th colspan="6" style="font-size:18px">
                    KEPOLISIAN DAERAH KALIMANTAN TIMUR <br> DIREKTORAT LALU LINTAS
                </th>
            </tr>
            <tr>
                <th colspan="18" style="font-size:18px">LAPORAN HARIAN PRODUKSI SIM <br> POLDA KALIMANTAN TIMUR <br><u> HARI / TANGGAL : <?= tanggal_indonesia(date('Y-m-d')) ?></u></th>
            </tr>
            <tr style="background-color:#9ad0f5;">
                <th style="border:1px solid black" rowspan="2">NO</th>
                <th style="border:1px solid black" rowspan="2">SATPAS</th>
                <th style="border:1px solid black" colspan="7">SIM BARU</th>
                <th style="border:1px solid black" colspan="7">SIM PERPANJANG</th>
                <th style="border:1px solid black" style="width:50px" rowspan="2">JUMLAH</th>
                <th style="border:1px solid black" style="width:50px" rowspan="2">KET RUSAK</th>
            </tr>
            <tr style="background-color:#9ad0f5;">
                <th style="width:50px; border:1px solid black">C</th>
                <th style="width:50px; border:1px solid black">A</th>
                <th style="width:50px; border:1px solid black">B I</th>
                <th style="width:50px; border:1px solid black">B II</th>
                <th style="width:50px; border:1px solid black">A UMUM</th>
                <th style="width:50px; border:1px solid black">B I UMUM</th>
                <th style="width:50px; border:1px solid black">B II UMUM</th>
                <th style="width:50px; border:1px solid black">C</th>
                <th style="width:50px; border:1px solid black">A</th>
                <th style="width:50px; border:1px solid black">B I</th>
                <th style="width:50px; border:1px solid black">B II</th>
                <th style="width:50px; border:1px solid black">A UMUM</th>
                <th style="width:50px; border:1px solid black">B I UMUM</th>
                <th style="width:50px; border:1px solid black">B II UMUM</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $a)
            <?php 
            $datas = DB::table('tb_simlink')->where('id_data',$a->data_polres_id)->first();
            // dd($datas);

            $cb += $a->data_polres_sim_c_baru;
            $ab += $a->data_polres_sim_a_baru;
            $b1b += $a->data_polres_sim_b1_baru;
            $b2b += $a->data_polres_sim_b2_baru;
            $aub += $a->data_polres_sim_a_umum_baru;
            $b1ub += $a->data_polres_sim_b1_umum;
            $b2ub += $a->data_polres_sim_b2_umum;

            $cp += ($a->data_polres_sim_c_perpanjang + $datas->simlink1_c +  $datas->simlink2_c);
            $ap += ($a->data_polres_sim_a_perpanjang + $datas->simlink1_a +  $datas->simlink2_a);
            $b1p += $a->data_polres_sim_b1_perpanjang;
            $b2p += $a->data_polres_sim_b2_perpanjang;
            $aup += $a->data_polres_sim_a_umum_perpanjang;
            $b1up += $a->data_polres_sim_b1_umum_perpanjang;
            $b2up += $a->data_polres_sim_b2_umum_perpanjang;
            $jumlah = (
                $a->data_polres_sim_c_baru +
                $a->data_polres_sim_a_baru +
                $a->data_polres_sim_b1_baru +
                $a->data_polres_sim_b2_baru +
                $a->data_polres_sim_a_umum_baru +
                $a->data_polres_sim_b1_umum +
                $a->data_polres_sim_b2_umum +
                $a->data_polres_sim_c_perpanjang +
                $a->data_polres_sim_a_perpanjang +
                $a->data_polres_sim_b1_perpanjang +
                $a->data_polres_sim_b2_perpanjang +
                $a->data_polres_sim_a_umum_perpanjang +
                $a->data_polres_sim_b1_umum_perpanjang +
                $a->data_polres_sim_b2_umum_perpanjang +
                $datas->simlink1_c +  
                $datas->simlink2_c +
                $datas->simlink1_a +  
                $datas->simlink2_a
            );
            $total += $jumlah;
            $rusak += $a->rusak;
            ?>
            <tr>
                <th style="border:1px solid black">{{$i+1}}</th>
                <th style="border:1px solid black">{{$a->cabang_nama}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_c_baru}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_a_baru}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_b1_baru}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_b2_baru}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_a_umum_baru}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_b1_umum}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_b2_umum}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_c_perpanjang + $datas->simlink1_c +  $datas->simlink2_c}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_a_perpanjang + $datas->simlink1_a +  $datas->simlink2_a}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_b1_perpanjang}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_b2_perpanjang}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_a_umum_perpanjang}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_b1_umum_perpanjang}}</th>
                <th style="border:1px solid black">{{$a->data_polres_sim_b2_umum_perpanjang}}</th>
                <th style="border:1px solid black">{{$jumlah}}</th>
                <th style="border:1px solid black">{{$a->rusak}}</th>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr style="background-color:#9ad0f5">
                <th style="border:1px solid black" colspan="2">JUMLAH</th>
                <th style="border:1px solid black">{{$cb}}</th>
                <th style="border:1px solid black">{{$ab}}</th>
                <th style="border:1px solid black">{{$b1b}}</th>
                <th style="border:1px solid black">{{$b2b}}</th>
                <th style="border:1px solid black">{{$aub}}</th>
                <th style="border:1px solid black">{{$b1ub}}</th>
                <th style="border:1px solid black">{{$b2ub}}</th>
                <th style="border:1px solid black">{{$cp}}</th>
                <th style="border:1px solid black">{{$ap}}</th>
                <th style="border:1px solid black">{{$b1p}}</th>
                <th style="border:1px solid black">{{$b2p}}</th>
                <th style="border:1px solid black">{{$aup}}</th>
                <th style="border:1px solid black">{{$b1up}}</th>
                <th style="border:1px solid black">{{$b2up}}</th>
                <th style="border:1px solid black">{{$total}}</th>
                <th style="border:1px solid black">{{$rusak}}</th>
            </tr>
            <tr>
                <th colspan="10"></th>
                <th colspan="8">
                    Balikpapan, <?= tanggal_indonesia(date('Y-m-d')) ?> <br>
                    a.n KASUBDITREGIDENT DITLANTAS POLDA KALTIM <br>
                    Ps. KASI SIM <br><br>
                    <u>REZA PRATAMA RHAMDANI YUSUF.S.I.K.</u><br>
                    AKP NRP 90030381
                </th>
            </tr>
        </tfoot>
    </table>
</body>
</html>