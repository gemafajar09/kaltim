
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
                <th colspan="18" style="font-size:18px">LAPORAN PRODUKSI SURAT KESEHATAN & PSIKOLOGI : BULAN,  <?= strtoupper($type) ?></u></th>
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
            @if($cabang == 0)
                @foreach($satpat as $ii => $st)
                    <tr style="background-color:#9ad0f5;">
                        <th style="border:1px solid black">{{ $ii + 1 }}</th>
                        <th style="border:1px solid black">{{ $st->cabang_nama }}</th>
                        <th style="border:1px solid black" colspan="17"></th>
                    </tr>
                    <?php 
                        $isi_table = DB::table('tb_detail')
                                    ->select(
                                        DB::raw('tb_cabang.*'),
                                        DB::raw('tb_detail.id_data as id_data'),
                                        DB::raw('tb_detail.id_biro as id_biro'),
                                        DB::raw('tb_detail.id_biro as id_biro'),
                                        DB::raw('tb_detail.id_cabang as id_cabang'),
                                        DB::raw('tb_detail.tanggal as tanggal'),

                                        DB::raw('SUM(tb_detail.sim_a_baru) as sim_a_baru'),
                                        DB::raw('SUM(tb_detail.sim_c_baru) as sim_c_baru'),
                                        DB::raw('SUM(tb_detail.sim_b1) as sim_b1'),
                                        DB::raw('SUM(tb_detail.sim_b2) as sim_b2'),
                                        DB::raw('SUM(tb_detail.sim_a_umum) as sim_a_umum'),
                                        DB::raw('SUM(tb_detail.sim_b1_umum) as sim_b1_umum'),
                                        DB::raw('SUM(tb_detail.sim_b2_umum) as sim_b2_umum'),
                                        DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac_baru'),

                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_baru) as kesehatan_sim_a_baru'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_c_baru) as kesehatan_sim_c_baru'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1) as kesehatan_sim_b1'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2) as kesehatan_sim_b2'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_umum) as kesehatan_sim_a_umum'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1_umum) as kesehatan_sim_b1_umum'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2_umum) as kesehatan_sim_b2_umum'),

                                        )
                                    ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                                    ->join('tb_lulus_kesehatan','tb_cabang.cabang_id','tb_lulus_kesehatan.id_biro')
                                    ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bln)
                                    ->where(DB::raw('Year(tb_detail.tanggal)'),$thn)
                                    ->where('tb_detail.id_cabang', $st->cabang_id)
                                    ->groupBy('tb_detail.id_biro')
                                    ->get();
                    ?>
                    @foreach($isi_table as $i => $a)
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
                @endforeach
            @else
                @foreach($satpat as $ii => $st)
                    <tr style="background-color:#9ad0f5;">
                        <th style="border:1px solid black">{{ $ii + 1 }}</th>
                        <th style="border:1px solid black">{{ $st->cabang_nama }}</th>
                        <th style="border:1px solid black" colspan="17"></th>
                    </tr>
                    <?php 
                        $isi_table = DB::table('tb_detail')
                                    ->select(
                                        DB::raw('tb_cabang.*'),
                                        DB::raw('tb_detail.id_data as id_data'),
                                        DB::raw('tb_detail.id_biro as id_biro'),
                                        DB::raw('tb_detail.id_biro as id_biro'),
                                        DB::raw('tb_detail.id_cabang as id_cabang'),
                                        DB::raw('tb_detail.tanggal as tanggal'),

                                        DB::raw('SUM(tb_detail.sim_a_baru) as sim_a_baru'),
                                        DB::raw('SUM(tb_detail.sim_c_baru) as sim_c_baru'),
                                        DB::raw('SUM(tb_detail.sim_b1) as sim_b1'),
                                        DB::raw('SUM(tb_detail.sim_b2) as sim_b2'),
                                        DB::raw('SUM(tb_detail.sim_a_umum) as sim_a_umum'),
                                        DB::raw('SUM(tb_detail.sim_b1_umum) as sim_b1_umum'),
                                        DB::raw('SUM(tb_detail.sim_b2_umum) as sim_b2_umum'),
                                        DB::raw('SUM(tb_detail.sim_ac_baru) as sim_ac_baru'),

                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_baru) as kesehatan_sim_a_baru'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_c_baru) as kesehatan_sim_c_baru'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1) as kesehatan_sim_b1'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2) as kesehatan_sim_b2'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_umum) as kesehatan_sim_a_umum'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1_umum) as kesehatan_sim_b1_umum'),
                                        DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2_umum) as kesehatan_sim_b2_umum'),

                                        )
                                    ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                                    ->join('tb_lulus_kesehatan','tb_cabang.cabang_id','tb_lulus_kesehatan.id_biro')
                                    ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bln)
                                    ->where(DB::raw('Year(tb_detail.tanggal)'),$thn)
                                    ->where('tb_detail.id_cabang', $st->cabang_id)
                                    ->groupBy('tb_detail.id_biro')
                                    ->get();
                    ?>
                    @foreach($isi_table as $i => $a)
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
                @endforeach 
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
            
        </tfoot>
    </table>
    <br>
    <br>
    <br>
    <br>
    @if($cabang == 0)
        @foreach($biro as $no => $br)
        <table>
            <thead>
                <tr style="background-color:#9ad0f5;">
                    <th style="border:1px solid black" rowspan="2">NO</th>
                    <th style="border:1px solid black" rowspan="2">BIRO</th>
                    <th style="border:1px solid black" rowspan="2">TANGGAL</th>
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
                <?php 
                    $table = DB::table('tb_detail')
                            ->select(
                                DB::raw('tb_cabang.*'),
                                DB::raw('tb_detail.id_data as id_data'),
                                DB::raw('tb_detail.id_biro as id_biro'),
                                DB::raw('tb_detail.id_biro as id_biro'),
                                DB::raw('tb_detail.id_cabang as id_cabang'),
                                DB::raw('tb_detail.tanggal as tanggal'),

                                DB::raw('(tb_detail.sim_a_baru) as sim_a_baru'),
                                DB::raw('(tb_detail.sim_c_baru) as sim_c_baru'),
                                DB::raw('(tb_detail.sim_b1) as sim_b1'),
                                DB::raw('(tb_detail.sim_b2) as sim_b2'),
                                DB::raw('(tb_detail.sim_a_umum) as sim_a_umum'),
                                DB::raw('(tb_detail.sim_b1_umum) as sim_b1_umum'),
                                DB::raw('(tb_detail.sim_b2_umum) as sim_b2_umum'),
                                DB::raw('(tb_detail.sim_ac_baru) as sim_ac_baru'),

                                )
                            ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                            ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bln)
                            ->where(DB::raw('Year(tb_detail.tanggal)'),$thn)
                            ->where('tb_detail.id_biro', $br->cabang_id)
                            ->get();

                    $table2 = DB::table('tb_lulus_kesehatan')
                            ->select(
                                DB::raw('tb_cabang.*'),
                                DB::raw('tb_lulus_kesehatan.id_data as id_data'),
                                DB::raw('tb_lulus_kesehatan.id_biro as id_biro'),
                                DB::raw('tb_lulus_kesehatan.id_biro as id_biro'),
                                DB::raw('tb_lulus_kesehatan.id_cabang as id_cabang'),
                                DB::raw('tb_lulus_kesehatan.tanggal as tanggal'),

                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_a_baru) as kesehatan_sim_a_baru'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_c_baru) as kesehatan_sim_c_baru'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_b1) as kesehatan_sim_b1'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_b2) as kesehatan_sim_b2'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_a_umum) as kesehatan_sim_a_umum'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_b1_umum) as kesehatan_sim_b1_umum'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_b2_umum) as kesehatan_sim_b2_umum'),

                                )
                            ->join('tb_cabang','tb_cabang.cabang_id','tb_lulus_kesehatan.id_biro')
                            ->where(DB::raw('MONTH(tb_lulus_kesehatan.tanggal)'),$bln)
                            ->where(DB::raw('Year(tb_lulus_kesehatan.tanggal)'),$thn)
                            ->where('tb_lulus_kesehatan.id_biro', $br->cabang_id)
                            ->get();

                                    // dd($table2);
                ?>
                @foreach($table as $nt => $tb)
                <?php 
                if(isset($table2[$nt])){
                    $kkc = ($table2[$nt]->kesehatan_sim_c_baru != '') ? $table2[$nt]->kesehatan_sim_c_baru : 0 ;
                    $kka = ($table2[$nt]->kesehatan_sim_a_baru != '') ? $table2[$nt]->kesehatan_sim_a_baru : 0;
                    $kkb1 = ($table2[$nt]->kesehatan_sim_b1 != '') ? $table2[$nt]->kesehatan_sim_b1 : 0;         
                    $kkb2 = ($table2[$nt]->kesehatan_sim_b2 != '') ? $table2[$nt]->kesehatan_sim_b2 : 0;         
                    $kkau = ($table2[$nt]->kesehatan_sim_a_umum != '') ? $table2[$nt]->kesehatan_sim_a_umum : 0;
                    $kkb1u = ($table2[$nt]->kesehatan_sim_b1_umum != '') ? $table2[$nt]->kesehatan_sim_b1_umum : 0;
                    $kkb2u = ($table2[$nt]->kesehatan_sim_b2_umum != '') ? $table2[$nt]->kesehatan_sim_b2_umum : 0;

                    $tgl = $table2[$nt]->tanggal;
                }
                ?>
                <tr>
                    <th style="border:1px solid black">{{ $nt + 1 }}</th>
                    <th style="border:1px solid black">{{ $tb->cabang_nama }}</th>
                    <th style="border:1px solid black">{{ \Carbon\Carbon::parse($tb->tanggal)->isoFormat('D/MM/Y') }}</th>
                    
                    <?php 
                        if($tgl !== $tb->tanggal){
                        ?>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                        <?php 
                        }else{
                        ?>
                            <th style="border:1px solid black">{{ $kkc  }}</th>
                            <th style="border:1px solid black">{{ $kka  }}</th>
                            <th style="border:1px solid black">{{ $kkb1  }}</th>
                            <th style="border:1px solid black">{{ $kkb2  }}</th>
                            <th style="border:1px solid black">{{ $kkau  }}</th>
                            <th style="border:1px solid black">{{ $kkb1u  }}</th>
                            <th style="border:1px solid black">{{ $kkb2u  }}</th>

                        <?php
                        }
                    ?>
                    <th style="border:1px solid black">{{ $tb->sim_c_baru }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_a_baru }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_b1 }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_b2 }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_a_umum }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_b1_umum }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_b2_umum }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_ac_baru }}</th>

                    <th style="border:1px solid black">
                        {{ 
                            (($tgl === $tb->tanggal) ? $kkc : 0) +
                            (($tgl === $tb->tanggal) ? $kka : 0) +
                            (($tgl === $tb->tanggal) ? $kkb1 : 0) +
                            (($tgl === $tb->tanggal) ? $kkb2 : 0) +
                            (($tgl === $tb->tanggal) ? $kkau : 0) +
                            (($tgl === $tb->tanggal) ? $kkb1u : 0) +
                            (($tgl === $tb->tanggal) ? $kkb2u : 0) +
                            $tb->sim_c_baru +  
                            $tb->sim_a_baru +  
                            $tb->sim_b1 +  
                            $tb->sim_b2 +  
                            $tb->sim_a_umum +  
                            $tb->sim_b1_umum +  
                            $tb->sim_b2_umum +  
                            $tb->sim_ac_baru 
                        }}
                    </th>

                </tr>
                @endforeach

            </tbody>
        </table>
        <br>
        <br>
        @endforeach
    @else
        @foreach($biro as $no => $br)
        <table>
            <thead>
                <tr style="background-color:#9ad0f5;">
                    <th style="border:1px solid black" rowspan="2">NO</th>
                    <th style="border:1px solid black" rowspan="2">BIRO</th>
                    <th style="border:1px solid black" rowspan="2">TANGGAL</th>
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
                <?php 
                    $table = DB::table('tb_detail')
                            ->select(
                                DB::raw('tb_cabang.*'),
                                DB::raw('tb_detail.id_data as id_data'),
                                DB::raw('tb_detail.id_biro as id_biro'),
                                DB::raw('tb_detail.id_biro as id_biro'),
                                DB::raw('tb_detail.id_cabang as id_cabang'),
                                DB::raw('tb_detail.tanggal as tanggal'),

                                DB::raw('(tb_detail.sim_a_baru) as sim_a_baru'),
                                DB::raw('(tb_detail.sim_c_baru) as sim_c_baru'),
                                DB::raw('(tb_detail.sim_b1) as sim_b1'),
                                DB::raw('(tb_detail.sim_b2) as sim_b2'),
                                DB::raw('(tb_detail.sim_a_umum) as sim_a_umum'),
                                DB::raw('(tb_detail.sim_b1_umum) as sim_b1_umum'),
                                DB::raw('(tb_detail.sim_b2_umum) as sim_b2_umum'),
                                DB::raw('(tb_detail.sim_ac_baru) as sim_ac_baru'),

                                )
                            ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                            ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bln)
                            ->where(DB::raw('Year(tb_detail.tanggal)'),$thn)
                            ->where('tb_detail.id_biro', $br->cabang_id)
                            ->get();

                    $table2 = DB::table('tb_lulus_kesehatan')
                            ->select(
                                DB::raw('tb_cabang.*'),
                                DB::raw('tb_lulus_kesehatan.id_data as id_data'),
                                DB::raw('tb_lulus_kesehatan.id_biro as id_biro'),
                                DB::raw('tb_lulus_kesehatan.id_biro as id_biro'),
                                DB::raw('tb_lulus_kesehatan.id_cabang as id_cabang'),
                                DB::raw('tb_lulus_kesehatan.tanggal as tanggal'),

                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_a_baru) as kesehatan_sim_a_baru'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_c_baru) as kesehatan_sim_c_baru'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_b1) as kesehatan_sim_b1'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_b2) as kesehatan_sim_b2'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_a_umum) as kesehatan_sim_a_umum'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_b1_umum) as kesehatan_sim_b1_umum'),
                                DB::raw('(tb_lulus_kesehatan.kesehatan_sim_b2_umum) as kesehatan_sim_b2_umum'),

                                )
                            ->join('tb_cabang','tb_cabang.cabang_id','tb_lulus_kesehatan.id_biro')
                            ->where(DB::raw('MONTH(tb_lulus_kesehatan.tanggal)'),$bln)
                            ->where(DB::raw('Year(tb_lulus_kesehatan.tanggal)'),$thn)
                            ->where('tb_lulus_kesehatan.id_biro', $br->cabang_id)
                            ->get();

                                    // dd($table2);
                ?>
                @foreach($table as $nt => $tb)
                <?php 
                if(isset($table2[$nt])){
                    $kkc = ($table2[$nt]->kesehatan_sim_c_baru != '') ? $table2[$nt]->kesehatan_sim_c_baru : 0 ;
                    $kka = ($table2[$nt]->kesehatan_sim_a_baru != '') ? $table2[$nt]->kesehatan_sim_a_baru : 0;
                    $kkb1 = ($table2[$nt]->kesehatan_sim_b1 != '') ? $table2[$nt]->kesehatan_sim_b1 : 0;         
                    $kkb2 = ($table2[$nt]->kesehatan_sim_b2 != '') ? $table2[$nt]->kesehatan_sim_b2 : 0;         
                    $kkau = ($table2[$nt]->kesehatan_sim_a_umum != '') ? $table2[$nt]->kesehatan_sim_a_umum : 0;
                    $kkb1u = ($table2[$nt]->kesehatan_sim_b1_umum != '') ? $table2[$nt]->kesehatan_sim_b1_umum : 0;
                    $kkb2u = ($table2[$nt]->kesehatan_sim_b2_umum != '') ? $table2[$nt]->kesehatan_sim_b2_umum : 0;

                    $tgl = $table2[$nt]->tanggal;
                }
                ?>
                <tr>
                    <th style="border:1px solid black">{{ $nt + 1 }}</th>
                    <th style="border:1px solid black">{{ $tb->cabang_nama }}</th>
                    <th style="border:1px solid black">{{ \Carbon\Carbon::parse($tb->tanggal)->isoFormat('D - MM - Y') }}</th>
                    
                    <?php 
                        if($tgl == $tb->tanggal){
                        ?>
                            <th style="border:1px solid black">{{ $kkc  }}</th>
                            <th style="border:1px solid black">{{ $kka  }}</th>
                            <th style="border:1px solid black">{{ $kkb1  }}</th>
                            <th style="border:1px solid black">{{ $kkb2  }}</th>
                            <th style="border:1px solid black">{{ $kkau  }}</th>
                            <th style="border:1px solid black">{{ $kkb1u  }}</th>
                            <th style="border:1px solid black">{{ $kkb2u  }}</th>
                        <?php 
                        }else{
                        ?>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                            <th style="border:1px solid black">0</th>
                        <?php
                        }
                    ?>
                    <th style="border:1px solid black">{{ $tb->sim_c_baru }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_a_baru }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_b1 }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_b2 }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_a_umum }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_b1_umum }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_b2_umum }}</th>
                    <th style="border:1px solid black">{{ $tb->sim_ac_baru }}</th>

                    <th style="border:1px solid black">
                        {{ 
                            $kkc +
                            $kka +
                            $kkb1 +         
                            $kkb2 +         
                            $kkau +
                            $kkb1u +
                            $kkb2u +
                            $tb->sim_c_baru +  
                            $tb->sim_a_baru +  
                            $tb->sim_b1 +  
                            $tb->sim_b2 +  
                            $tb->sim_a_umum +  
                            $tb->sim_b1_umum +  
                            $tb->sim_b2_umum +  
                            $tb->sim_ac_baru 
                        }}
                    </th>

                </tr>
                @endforeach

            </tbody>
        </table>
        <br>
        <br>
        @endforeach
    @endif
</body>
</html>