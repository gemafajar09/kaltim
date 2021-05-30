
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
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=laporan-harian-".date('Y-m-d').".xls");
    $c = 0;
    $aa = 0;
    $b1 = 0;
    $b2 = 0;
    $au = 0;
    $b1u = 0;
    $b2u = 0;
    $ac = 0;

    $kc = 0;
    $ka = 0;
    $kb1 = 0;
    $kb2 = 0;
    $kau = 0;
    $kb1u = 0;
    $kb2u = 0;
    $jml = 0;
    $jumlah = 0;
?>
    <table>
        <thead>
            <tr>
                <th colspan="6" style="font-size:18px">
                    KEPOLISIAN DAERAH KALIMANTAN TIMUR <br> DIREKTORAT LALU LINTAS
                <hr>
                </th>
            </tr>
            <tr>
                <th colspan="18" style="font-size:18px">LAPORAN HARIAN PRODUKSI SURAT KESEHATAN & PSIKOLOG <br> POLDA KALIMANTAN TIMUR <br><u> HARI / TANGGAL : <?= tanggal_indonesia(date('Y-m-d')) ?></u></th>
            </tr>
            <tr style="background-color:#9ad0f5;">
                <th style="border:1px solid black" rowspan="2">NO</th>
                <th style="border:1px solid black" rowspan="2">BIRO</th>
                <th style="border:1px solid black" colspan="7">SURAT LULUS KESEHATAN</th>
                <th style="border:1px solid black" colspan="7">SURAT LULUS UJI PSIKOLOGI</th>
                <th style="border:1px solid black">SRT KESEHATAN & PSIKOLOGI</th>
                <th style="border:1px solid black" style="width:50px" rowspan="2">JUMLAH</th>
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
                <th style="width:50px; border:1px solid black">C & A</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $a)
            <?php 


            $aa += $a->sim_a_baru;
            $c += $a->sim_c_baru;
            $b1 += $a->sim_b1;
            $b2 += $a->sim_b2;
            $au += $a->sim_a_umum;
            $b1u += $a->sim_b1_umum;
            $b2u += $a->sim_b2_umum;
            $ac += $a->sim_ac_baru;

            $kc += $a->kesehatan_sim_a_baru;
            $ka += $a->kesehatan_sim_c_baru;
            $kb1 += $a->kesehatan_sim_b1;
            $kb2 += $a->kesehatan_sim_b2;
            $kau += $a->kesehatan_sim_a_umum;
            $kb1u += $a->kesehatan_sim_b1_umum;
            $kb2u += $a->kesehatan_sim_b2_umum;

            $jml = $a->sim_a_baru + $a->sim_c_baru + $a->sim_b1 + $a->sim_b2 + $a->sim_a_umum + $a->sim_b1_umum + $a->sim_b2_umum + $a->sim_ac_baru + $a->kesehatan_sim_a_baru + $a->kesehatan_sim_c_baru + $a->kesehatan_sim_b1 + $a->kesehatan_sim_b2 + $a->kesehatan_sim_a_umum + $a->kesehatan_sim_b1_umum + $a->kesehatan_sim_b2_umum;

            $jumlah += $jml;
            ?>
            <tr>
                <th style="border:1px solid black">{{ $i+1 }}</th>
                <th style="border:1px solid black">{{ $a->cabang_nama }}</th>
                
                <th style="border:1px solid black">{{ $a->kesehatan_sim_c_baru }}</th>
                <th style="border:1px solid black">{{ $a->kesehatan_sim_a_baru }}</th>
                <th style="border:1px solid black">{{ $a->kesehatan_sim_b1 }}</th>
                <th style="border:1px solid black">{{ $a->kesehatan_sim_b2 }}</th>
                <th style="border:1px solid black">{{ $a->kesehatan_sim_a_umum }}</th>
                <th style="border:1px solid black">{{ $a->kesehatan_sim_b1_umum }}</th>
                <th style="border:1px solid black">{{ $a->kesehatan_sim_b2_umum }}</th>

                <th style="border:1px solid black">{{ $a->sim_c_baru }}</th>
                <th style="border:1px solid black">{{ $a->sim_a_baru }}</th>
                <th style="border:1px solid black">{{ $a->sim_b1 }}</th>
                <th style="border:1px solid black">{{ $a->sim_b2 }}</th>
                <th style="border:1px solid black">{{ $a->sim_a_umum }}</th>
                <th style="border:1px solid black">{{ $a->sim_b1_umum }}</th>
                <th style="border:1px solid black">{{ $a->sim_b2_umum }}</th>
                <th style="border:1px solid black">{{ $a->sim_ac_baru }}</th>

                <th style="border:1px solid black">{{ $jml }}</th>

            </tr>
            @endforeach
        </tbody>
        <tfoot>


            <tr style="background-color:#9ad0f5">
                <th style="border:1px solid black" colspan="2">JUMLAH</th>
                <th style="border:1px solid black">{{$kc}}</th>
                <th style="border:1px solid black">{{$ka}}</th>
                <th style="border:1px solid black">{{$kb1}}</th>
                <th style="border:1px solid black">{{$kb2}}</th>
                <th style="border:1px solid black">{{$kau}}</th>
                <th style="border:1px solid black">{{$kb1u}}</th>
                <th style="border:1px solid black">{{$kb2u}}</th>

                <th style="border:1px solid black">{{$c}}</th>
                <th style="border:1px solid black">{{$aa}}</th>
                <th style="border:1px solid black">{{$b1}}</th>
                <th style="border:1px solid black">{{$b2}}</th>
                <th style="border:1px solid black">{{$au}}</th>
                <th style="border:1px solid black">{{$b1u}}</th>
                <th style="border:1px solid black">{{$b2u}}</th>
                <th style="border:1px solid black">{{$ac}}</th>
                <th style="border:1px solid black">{{$jumlah}}</th>
            </tr>
            <tr>
                <th colspan="10"></th>
                <th colspan="8">
                    Balikpapan, <?= tanggal_indonesia(date('Y-m-d')) ?> <br>
                    a.n KASUBDITREGIDENT DITLANTAS POLDA KALTIM <br>
                    KASI SIM <br><br>
                    <u>RETNO ARIANI.,SH.,Sik.</u><br>
                    AKP NRP 85042043
                </th>
            </tr>
        </tfoot>
    </table>
</body>
</html>