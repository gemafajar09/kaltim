
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
    $cabang_all = DB::table('tb_cabang')->where('cabang_kode','2')->where('turunan','0')->get();
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
            @if($penanda == 0)
                @foreach($satpat as $ii => $st)
                    @if($st->cabang_id != 17)
                            <tr style="background-color:#9ad0f5;">
                                <th style="border:1px solid black">{{ $ii + 1 }}</th>
                                <th style="border:1px solid black">{{ $st->cabang_nama }}</th>
                                <th style="border:1px solid black" colspan="16"></th>
                            </tr>
                            @foreach($cabang_all as $i => $a)
                                <?php 
                                    // dari tabel detail
                                        $detail = DB::table('tb_detail')
                                                    ->select(
                                                        DB::raw('SUM(tb_detail.sim_a_baru) as sim_a_baru'),
                                                        DB::raw('SUM(tb_detail.sim_c_baru) as sim_c_baru'),
                                                        DB::raw('SUM(tb_detail.sim_b1) as sim_b1'),
                                                        DB::raw('SUM(tb_detail.sim_b2) as sim_b2'),
                                                        DB::raw('SUM(tb_detail.sim_a_umum) as sim_a_umum'),
                                                        DB::raw('SUM(tb_detail.sim_b1_umum) as sim_b1_umum'),
                                                        DB::raw('SUM(tb_detail.sim_b2_umum) as sim_b2_umum'),
                                                        DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac_baru')
                                                    )
                                                    ->where('tb_detail.tanggal',$tanggal)
                                                    ->where('tb_detail.id_biro', $a->cabang_id)
                                                    ->where('tb_detail.id_cabang', $st->cabang_id)
                                                    ->first();
                                    //  dari tabel lulus kesehatan
                                        $isikesehatan = DB::table('tb_lulus_kesehatan')
                                                    ->select(
                                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_baru) as kesehatan_sim_a_baru'),
                                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_c_baru) as kesehatan_sim_c_baru'),
                                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1) as kesehatan_sim_b1'),
                                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2) as kesehatan_sim_b2'),
                                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_umum) as kesehatan_sim_a_umum'),
                                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1_umum) as kesehatan_sim_b1_umum'),
                                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2_umum) as kesehatan_sim_b2_umum')
                                                    )
                                                    ->where('tb_lulus_kesehatan.tanggal',$tanggal)
                                                    ->where('tb_lulus_kesehatan.id_biro', $a->cabang_id)
                                                    ->where('tb_lulus_kesehatan.id_cabang', $st->cabang_id)
                                                    ->first();
                                    
                                    $aa += $detail->sim_a_baru;
                                    $c += $detail->sim_c_baru;
                                    $b1 += $detail->sim_b1;
                                    $b2 += $detail->sim_b2;
                                    $au += $detail->sim_a_umum;
                                    $b1u += $detail->sim_b1_umum;
                                    $b2u += $detail->sim_b2_umum;
                                    $ac += $detail->sim_ac_baru;
                                    
                                    $kc += $isikesehatan->kesehatan_sim_a_baru;
                                    $ka += $isikesehatan->kesehatan_sim_c_baru;
                                    $kb1 += $isikesehatan->kesehatan_sim_b1;
                                    $kb2 += $isikesehatan->kesehatan_sim_b2;
                                    $kau += $isikesehatan->kesehatan_sim_a_umum;
                                    $kb1u += $isikesehatan->kesehatan_sim_b1_umum;
                                    $kb2u += $isikesehatan->kesehatan_sim_b2_umum;
                                    
                                    $jml = $detail->sim_a_baru + $detail->sim_c_baru + $detail->sim_b1 + $detail->sim_b2 + $detail->sim_a_umum + $detail->sim_b1_umum + $detail->sim_b2_umum + $detail->sim_ac_baru + $isikesehatan->kesehatan_sim_a_baru + $isikesehatan->kesehatan_sim_c_baru + $isikesehatan->kesehatan_sim_b1 + $isikesehatan->kesehatan_sim_b2 + $isikesehatan->kesehatan_sim_a_umum + $isikesehatan->kesehatan_sim_b1_umum + $isikesehatan->kesehatan_sim_b2_umum;
                                    
                                    // $jumlah += $jml;
                                    // $aa += $a->sim_a_baru;
                                    // $c += $a->sim_c_baru;
                                    // $b1 += $a->sim_b1;
                                    // $b2 += $a->sim_b2;
                                    // $au += $a->sim_a_umum;
                                    // $b1u += $a->sim_b1_umum;
                                    // $b2u += $a->sim_b2_umum;
                                    // $ac += $a->sim_ac_baru;

                                    // $kc += $a->kesehatan_sim_a_baru;
                                    // $ka += $a->kesehatan_sim_c_baru;
                                    // $kb1 += $a->kesehatan_sim_b1;
                                    // $kb2 += $a->kesehatan_sim_b2;
                                    // $kau += $a->kesehatan_sim_a_umum;
                                    // $kb1u += $a->kesehatan_sim_b1_umum;
                                    // $kb2u += $a->kesehatan_sim_b2_umum;

                                    // $jml = $a->sim_a_baru + $a->sim_c_baru + $a->sim_b1 + $a->sim_b2 + $a->sim_a_umum + $a->sim_b1_umum + $a->sim_b2_umum + $a->sim_ac_baru + $a->kesehatan_sim_a_baru + $a->kesehatan_sim_c_baru + $a->kesehatan_sim_b1 + $a->kesehatan_sim_b2 + $a->kesehatan_sim_a_umum + $a->kesehatan_sim_b1_umum + $a->kesehatan_sim_b2_umum;

                                    // $jumlah += $jml;
                                ?>
                                    <tr>
                                        <th style="border:1px solid black"></th>
                                        <th style="border:1px solid black">{{ $a->cabang_nama }}</th>
                                        
                                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_c_baru }}</th>
                                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_a_baru }}</th>
                                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_b1 }}</th>
                                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_b2 }}</th>
                                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_a_umum }}</th>
                                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_b1_umum }}</th>
                                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_b2_umum }}</th>

                                        <th style="border:1px solid black">{{ $detail->sim_c_baru }}</th>
                                        <th style="border:1px solid black">{{ $detail->sim_a_baru }}</th>
                                        <th style="border:1px solid black">{{ $detail->sim_b1 }}</th>
                                        <th style="border:1px solid black">{{ $detail->sim_b2 }}</th>
                                        <th style="border:1px solid black">{{ $detail->sim_a_umum }}</th>
                                        <th style="border:1px solid black">{{ $detail->sim_b1_umum }}</th>
                                        <th style="border:1px solid black">{{ $detail->sim_b2_umum }}</th>
                                        <th style="border:1px solid black">{{ $detail->sim_ac_baru }}</th>

                                        <th style="border:1px solid black">{{ $jml }}</th>

                                    </tr>
                            @endforeach
                    @endif 
                @endforeach
            @else
                <tr style="background-color:#9ad0f5;">
                    <th style="border:1px solid black">{{ 1 }}</th>
                    <th style="border:1px solid black">{{$cabang->cabang_nama}}</th>
                    <th style="border:1px solid black" colspan="16"></th>
                </tr>
                
                <?php 
                    foreach($biros as $a){
                        $isikesehatan =  DB::table('tb_data_polres')
                        ->join('tb_lulus_kesehatan','tb_data_polres.data_polres_id','tb_lulus_kesehatan.id_data')
                        ->join('tb_cabang','tb_cabang.cabang_id','tb_lulus_kesehatan.id_biro')
                        ->where('tb_lulus_kesehatan.tanggal',$tanggal)
                        ->where('tb_lulus_kesehatan.id_biro', $a->cabang_id)
                        ->where('tb_data_polres.polres_id',$penanda)
                        ->first();

                        // $detail = DB::table('tb_detail')->where('id_data', $isikesehatan->data_polres_id)->first();

                        $detail = DB::table('tb_detail')
                                ->select(
                                    DB::raw('SUM(tb_detail.sim_a_baru) as sim_a_baru'),
                                    DB::raw('SUM(tb_detail.sim_c_baru) as sim_c_baru'),
                                    DB::raw('SUM(tb_detail.sim_b1) as sim_b1'),
                                    DB::raw('SUM(tb_detail.sim_b2) as sim_b2'),
                                    DB::raw('SUM(tb_detail.sim_a_umum) as sim_a_umum'),
                                    DB::raw('SUM(tb_detail.sim_b1_umum) as sim_b1_umum'),
                                    DB::raw('SUM(tb_detail.sim_b2_umum) as sim_b2_umum'),
                                    DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac_baru')
                                )
                                ->where('tb_detail.tanggal',$tanggal)
                                ->where('tb_detail.id_biro', $a->cabang_id)
                                ->where('tb_detail.id_data', $isikesehatan->data_polres_id)
                                ->first();


                        $aa += $detail->sim_a_baru;
                        $c += $detail->sim_c_baru;
                        $b1 += $detail->sim_b1;
                        $b2 += $detail->sim_b2;
                        $au += $detail->sim_a_umum;
                        $b1u += $detail->sim_b1_umum;
                        $b2u += $detail->sim_b2_umum;
                        $ac += $detail->sim_ac_baru;
                        
                        $kc += $isikesehatan->kesehatan_sim_a_baru;
                        $ka += $isikesehatan->kesehatan_sim_c_baru;
                        $kb1 += $isikesehatan->kesehatan_sim_b1;
                        $kb2 += $isikesehatan->kesehatan_sim_b2;
                        $kau += $isikesehatan->kesehatan_sim_a_umum;
                        $kb1u += $isikesehatan->kesehatan_sim_b1_umum;
                        $kb2u += $isikesehatan->kesehatan_sim_b2_umum;
                        
                        $jml = $detail->sim_a_baru + $detail->sim_c_baru + $detail->sim_b1 + $detail->sim_b2 + $detail->sim_a_umum + $detail->sim_b1_umum + $detail->sim_b2_umum + $detail->sim_ac_baru + $isikesehatan->kesehatan_sim_a_baru + $isikesehatan->kesehatan_sim_c_baru + $isikesehatan->kesehatan_sim_b1 + $isikesehatan->kesehatan_sim_b2 + $isikesehatan->kesehatan_sim_a_umum + $isikesehatan->kesehatan_sim_b1_umum + $isikesehatan->kesehatan_sim_b2_umum;
                        
                        $jumlah += $jml;
                        ?>
                    <tr>
                        <th style="border:1px solid black"></th>
                        <th style="border:1px solid black">{{ $a->cabang_nama }}</th>
                        
                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_c_baru }}</th>
                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_a_baru }}</th>
                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_b1 }}</th>
                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_b2 }}</th>
                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_a_umum }}</th>
                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_b1_umum }}</th>
                        <th style="border:1px solid black">{{ $isikesehatan->kesehatan_sim_b2_umum }}</th>

                        <th style="border:1px solid black">{{ $detail->sim_c_baru }}</th>
                        <th style="border:1px solid black">{{ $detail->sim_a_baru }}</th>
                        <th style="border:1px solid black">{{ $detail->sim_b1 }}</th>
                        <th style="border:1px solid black">{{ $detail->sim_b2 }}</th>
                        <th style="border:1px solid black">{{ $detail->sim_a_umum }}</th>
                        <th style="border:1px solid black">{{ $detail->sim_b1_umum }}</th>
                        <th style="border:1px solid black">{{ $detail->sim_b2_umum }}</th>
                        <th style="border:1px solid black">{{ $detail->sim_ac_baru }}</th>

                        <th style="border:1px solid black">{{ $jml }}</th>

                    </tr>
                <?php } ?>
            @endif

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