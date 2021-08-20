
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
                                ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bln)
                                ->where(DB::raw('Year(tb_detail.tanggal)'),$thn)
                                ->where('tb_detail.id_biro', $a->cabang_id)
                                ->where('tb_detail.id_cabang', $st->cabang_id)
                                ->first();
                            //  dari tabel lulus kesehatan
                                $kesehatan = DB::table('tb_lulus_kesehatan')
                                ->select(
                                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_baru) as kesehatan_sim_a_baru'),
                                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_c_baru) as kesehatan_sim_c_baru'),
                                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1) as kesehatan_sim_b1'),
                                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2) as kesehatan_sim_b2'),
                                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_umum) as kesehatan_sim_a_umum'),
                                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1_umum) as kesehatan_sim_b1_umum'),
                                    DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2_umum) as kesehatan_sim_b2_umum')
                                )
                                ->where(DB::raw('MONTH(tb_lulus_kesehatan.tanggal)'),$bln)
                                ->where(DB::raw('Year(tb_lulus_kesehatan.tanggal)'),$thn)
                                ->where('tb_lulus_kesehatan.id_biro', $a->cabang_id)
                                ->where('tb_lulus_kesehatan.id_cabang', $st->cabang_id)
                                ->first();

                                $aa += ($detail->sim_a_baru != '') ? $detail->sim_a_baru : 0;
                                $c += ($detail->sim_c_baru != '') ? $detail->sim_c_baru : 0;
                                $b1 += ($detail->sim_b1 != '') ? $detail->sim_b1 : 0;
                                $b2 += ($detail->sim_b2 != '') ? $detail->sim_b2 : 0;
                                $au += ($detail->sim_a_umum != '') ? $detail->sim_a_umum : 0;
                                $b1u += ($detail->sim_b1_umum != '') ? $detail->sim_b1_umum : 0;
                                $b2u += ($detail->sim_b2_umum != '') ? $detail->sim_b2_umum : 0;
                                $ac += ($detail->sim_ac_baru != '') ? $detail->sim_ac_baru : 0;

                                $ka += ($kesehatan->kesehatan_sim_a_baru != '') ? $kesehatan->kesehatan_sim_a_baru : 0;
                                $kc += ($kesehatan->kesehatan_sim_c_baru != '') ? $kesehatan->kesehatan_sim_c_baru : 0;
                                $kb1 += ($kesehatan->kesehatan_sim_b1 != '') ? $kesehatan->kesehatan_sim_b1 : 0;
                                $kb2 += ($kesehatan->kesehatan_sim_b2 != '') ? $kesehatan->kesehatan_sim_b2 : 0;
                                $kau += ($kesehatan->kesehatan_sim_a_umum != '') ? $kesehatan->kesehatan_sim_a_umum : 0;
                                $kb1u += ($kesehatan->kesehatan_sim_b1_umum != '') ? $kesehatan->kesehatan_sim_b1_umum : 0;
                                $kb2u += ($kesehatan->kesehatan_sim_b2_umum != '') ? $kesehatan->kesehatan_sim_b2_umum : 0;

                                $jml = $detail->sim_a_baru + $detail->sim_c_baru + $detail->sim_b1 + $detail->sim_b2 + $detail->sim_a_umum + $detail->sim_b1_umum + $detail->sim_b2_umum + $detail->sim_ac_baru + $kesehatan->kesehatan_sim_a_baru + $kesehatan->kesehatan_sim_c_baru + $kesehatan->kesehatan_sim_b1 + $kesehatan->kesehatan_sim_b2 + $kesehatan->kesehatan_sim_a_umum + $kesehatan->kesehatan_sim_b1_umum + $kesehatan->kesehatan_sim_b2_umum;

                                $jumlah += $jml;
                            ?>
                        <tr>
                            <th style="border:1px solid black"></th>
                            <th style="border:1px solid black; text-align:left">{{ $a->cabang_nama }}</th>

                            <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_c_baru }}</th>
                            <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_a_baru }}</th>
                            <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_b1 }}</th>
                            <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_b2 }}</th>
                            <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_a_umum }}</th>
                            <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_b1_umum }}</th>
                            <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_b2_umum }}</th>

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
                @endforeach
            @else
                <?php $cbg_nama = DB::table('tb_cabang')->where('cabang_id',$cabang)->first();
                ?>
                <tr style="background-color:#9ad0f5;">
                    <th style="border:1px solid black">1</th>
                    <th style="border:1px solid black; text-align:left">{{ $cbg_nama->cabang_nama }}</th>
                    <th style="border:1px solid black" colspan="16"></th>
                </tr>
                
                @foreach($cabang_all as $i => $a)
                        <?php 
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
                            ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bln)
                            ->where(DB::raw('Year(tb_detail.tanggal)'),$thn)
                            ->where('tb_detail.id_biro', $a->cabang_id)
                            ->where('tb_detail.id_cabang', $cabang)
                            ->first();

                            $kesehatan = DB::table('tb_lulus_kesehatan')
                            ->select(
                                DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_baru) as kesehatan_sim_a_baru'),
                                DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_c_baru) as kesehatan_sim_c_baru'),
                                DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1) as kesehatan_sim_b1'),
                                DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2) as kesehatan_sim_b2'),
                                DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_a_umum) as kesehatan_sim_a_umum'),
                                DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b1_umum) as kesehatan_sim_b1_umum'),
                                DB::raw('SUM(tb_lulus_kesehatan.kesehatan_sim_b2_umum) as kesehatan_sim_b2_umum')
                            )
                            ->where(DB::raw('MONTH(tb_lulus_kesehatan.tanggal)'),$bln)
                            ->where(DB::raw('Year(tb_lulus_kesehatan.tanggal)'),$thn)
                            ->where('tb_lulus_kesehatan.id_biro', $a->cabang_id)
                            ->where('tb_lulus_kesehatan.id_cabang', $cabang)
                            ->first();

                            $aa += ($detail->sim_a_baru != '') ? $detail->sim_a_baru : 0;
                            $c += ($detail->sim_c_baru != '') ? $detail->sim_c_baru : 0;
                            $b1 += ($detail->sim_b1 != '') ? $detail->sim_b1 : 0;
                            $b2 += ($detail->sim_b2 != '') ? $detail->sim_b2 : 0;
                            $au += ($detail->sim_a_umum != '') ? $detail->sim_a_umum : 0;
                            $b1u += ($detail->sim_b1_umum != '') ? $detail->sim_b1_umum : 0;
                            $b2u += ($detail->sim_b2_umum != '') ? $detail->sim_b2_umum : 0;
                            $ac += ($detail->sim_ac_baru != '') ? $detail->sim_ac_baru : 0;

                            $ka += ($kesehatan->kesehatan_sim_a_baru != '') ? $kesehatan->kesehatan_sim_a_baru : 0;
                            $kc += ($kesehatan->kesehatan_sim_c_baru != '') ? $kesehatan->kesehatan_sim_c_baru : 0;
                            $kb1 += ($kesehatan->kesehatan_sim_b1 != '') ? $kesehatan->kesehatan_sim_b1 : 0;
                            $kb2 += ($kesehatan->kesehatan_sim_b2 != '') ? $kesehatan->kesehatan_sim_b2 : 0;
                            $kau += ($kesehatan->kesehatan_sim_a_umum != '') ? $kesehatan->kesehatan_sim_a_umum : 0;
                            $kb1u += ($kesehatan->kesehatan_sim_b1_umum != '') ? $kesehatan->kesehatan_sim_b1_umum : 0;
                            $kb2u += ($kesehatan->kesehatan_sim_b2_umum != '') ? $kesehatan->kesehatan_sim_b2_umum : 0;
                            
                            $jml = $detail->sim_a_baru + $detail->sim_c_baru + $detail->sim_b1 + $detail->sim_b2 + $detail->sim_a_umum + $detail->sim_b1_umum + $detail->sim_b2_umum + $detail->sim_ac_baru + $kesehatan->kesehatan_sim_a_baru + $kesehatan->kesehatan_sim_c_baru + $kesehatan->kesehatan_sim_b1 + $kesehatan->kesehatan_sim_b2 + $kesehatan->kesehatan_sim_a_umum + $kesehatan->kesehatan_sim_b1_umum + $kesehatan->kesehatan_sim_b2_umum;

                            $jumlah += $jml;
                        ?>
                    <tr>
                        <th style="border:1px solid black"></th>
                        <th style="border:1px solid black; text-align:left">{{ $a->cabang_nama }}</th>

                        <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_c_baru }}</th>
                        <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_a_baru }}</th>
                        <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_b1 }}</th>
                        <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_b2 }}</th>
                        <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_a_umum }}</th>
                        <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_b1_umum }}</th>
                        <th style="border:1px solid black">{{ $kesehatan->kesehatan_sim_b2_umum }}</th>

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
        @foreach($satpat as $stp)
            @if($stp->cabang_id != 17)
            <table>
                <thead>
                    <tr>
                        <th colspan="19">{{ $stp->cabang_nama }}</th>
                    </tr>
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
                    @foreach($biro as $no => $br)
                        <?php 
                            $table = DB::table('tb_data_polres')
                            ->join('tb_lulus_kesehatan','tb_data_polres.data_polres_id','tb_lulus_kesehatan.id_data')
                            ->join('tb_cabang','tb_cabang.cabang_id','tb_lulus_kesehatan.id_biro')
                            ->where(DB::raw('MONTH(tb_lulus_kesehatan.tanggal)'),$bln)
                            ->where(DB::raw('Year(tb_lulus_kesehatan.tanggal)'),$thn)
                            ->where('tb_lulus_kesehatan.id_biro', $br->cabang_id)
                            ->where('tb_data_polres.polres_id',$stp->cabang_id)
                            ->get();

                        ?>
                        @foreach($table as $nt => $tb)
                            <?php 
                                if(isset($tb)){
                                    $kkc = ($tb->kesehatan_sim_c_baru != '') ? $tb->kesehatan_sim_c_baru : 0 ;
                                    $kka = ($tb->kesehatan_sim_a_baru != '') ? $tb->kesehatan_sim_a_baru : 0;
                                    $kkb1 = ($tb->kesehatan_sim_b1 != '') ? $tb->kesehatan_sim_b1 : 0;         
                                    $kkb2 = ($tb->kesehatan_sim_b2 != '') ? $tb->kesehatan_sim_b2 : 0;         
                                    $kkau = ($tb->kesehatan_sim_a_umum != '') ? $tb->kesehatan_sim_a_umum : 0;
                                    $kkb1u = ($tb->kesehatan_sim_b1_umum != '') ? $tb->kesehatan_sim_b1_umum : 0;
                                    $kkb2u = ($tb->kesehatan_sim_b2_umum != '') ? $tb->kesehatan_sim_b2_umum : 0;

                                    $tgl = $tb->tanggal;
                                }
                                $detail = DB::table('tb_detail')->where('id_data', $tb->data_polres_id)->first();
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
                                <th style="border:1px solid black">{{ $detail->sim_c_baru }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_a_baru }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_b1 }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_b2 }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_a_umum }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_b1_umum }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_b2_umum }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_ac_baru }}</th>
                                

                                <th style="border:1px solid black">
                                    {{ 
                                        (($tgl === $tb->tanggal) ? $kkc : 0) +
                                        (($tgl === $tb->tanggal) ? $kka : 0) +
                                        (($tgl === $tb->tanggal) ? $kkb1 : 0) +
                                        (($tgl === $tb->tanggal) ? $kkb2 : 0) +
                                        (($tgl === $tb->tanggal) ? $kkau : 0) +
                                        (($tgl === $tb->tanggal) ? $kkb1u : 0) +
                                        (($tgl === $tb->tanggal) ? $kkb2u : 0) +
                                        $detail->sim_c_baru +  
                                        $detail->sim_a_baru +  
                                        $detail->sim_b1 +  
                                        $detail->sim_b2 +  
                                        $detail->sim_a_umum +  
                                        $detail->sim_b1_umum +  
                                        $detail->sim_b2_umum +  
                                        $detail->sim_ac_baru 
                                    }}
                                </th>

                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="19" style="background-color: #9ad0f5">Pembatas</th>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            @endif
        @endforeach
    @else
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
                    @foreach($biro as $no => $br)
                        <?php 
                            $table = DB::table('tb_data_polres')
                            ->join('tb_lulus_kesehatan','tb_data_polres.data_polres_id','tb_lulus_kesehatan.id_data')
                            ->join('tb_cabang','tb_cabang.cabang_id','tb_lulus_kesehatan.id_biro')
                            ->where(DB::raw('MONTH(tb_lulus_kesehatan.tanggal)'),$bln)
                            ->where(DB::raw('Year(tb_lulus_kesehatan.tanggal)'),$thn)
                            ->where('tb_lulus_kesehatan.id_biro', $br->cabang_id)
                            ->where('tb_data_polres.polres_id',$cabang)
                            ->get();

                        ?>
                        @foreach($table as $nt => $tb)
                            <?php 
                                if(isset($tb)){
                                    $kkc = ($tb->kesehatan_sim_c_baru != '') ? $tb->kesehatan_sim_c_baru : 0 ;
                                    $kka = ($tb->kesehatan_sim_a_baru != '') ? $tb->kesehatan_sim_a_baru : 0;
                                    $kkb1 = ($tb->kesehatan_sim_b1 != '') ? $tb->kesehatan_sim_b1 : 0;         
                                    $kkb2 = ($tb->kesehatan_sim_b2 != '') ? $tb->kesehatan_sim_b2 : 0;         
                                    $kkau = ($tb->kesehatan_sim_a_umum != '') ? $tb->kesehatan_sim_a_umum : 0;
                                    $kkb1u = ($tb->kesehatan_sim_b1_umum != '') ? $tb->kesehatan_sim_b1_umum : 0;
                                    $kkb2u = ($tb->kesehatan_sim_b2_umum != '') ? $tb->kesehatan_sim_b2_umum : 0;

                                    $tgl = $tb->tanggal;
                                }
                                $detail = DB::table('tb_detail')->where('id_data', $tb->data_polres_id)->first();
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
                                <th style="border:1px solid black">{{ $detail->sim_c_baru }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_a_baru }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_b1 }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_b2 }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_a_umum }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_b1_umum }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_b2_umum }}</th>
                                <th style="border:1px solid black">{{ $detail->sim_ac_baru }}</th>
                                

                                <th style="border:1px solid black">
                                    {{ 
                                        (($tgl === $tb->tanggal) ? $kkc : 0) +
                                        (($tgl === $tb->tanggal) ? $kka : 0) +
                                        (($tgl === $tb->tanggal) ? $kkb1 : 0) +
                                        (($tgl === $tb->tanggal) ? $kkb2 : 0) +
                                        (($tgl === $tb->tanggal) ? $kkau : 0) +
                                        (($tgl === $tb->tanggal) ? $kkb1u : 0) +
                                        (($tgl === $tb->tanggal) ? $kkb2u : 0) +
                                        $detail->sim_c_baru +  
                                        $detail->sim_a_baru +  
                                        $detail->sim_b1 +  
                                        $detail->sim_b2 +  
                                        $detail->sim_a_umum +  
                                        $detail->sim_b1_umum +  
                                        $detail->sim_b2_umum +  
                                        $detail->sim_ac_baru 
                                    }}
                                </th>

                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="19" style="background-color: #9ad0f5">Pembatas</th>
                        </tr>
                    @endforeach

                </tbody>
        </table>
    @endif
</body>
</html>