
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
    // header("Content-Disposition: attachment; filename=laporan-bulan-".$type.".xls");
?>
    <table>
        <thead>
            <tr>
                <th rowspan="2" colspan="13" style="font-size:22px">Laporan Harian Biro</th>
            </tr>
        </thead>
    </table>

    <table border="2">
        <thead style="background-color:grey; color:white">
            <tr>
                <th width="5%" rowspan="3">NO</th>
                <th width="50%" rowspan="3">BIRO</th>
                <th width="40%" colspan="6">JENIS GOLONGAN</th>
            </tr>
            <tr>
                <th colspan="3">BARU</th>
                <th colspan="3">PERPANJANG</th>
            </tr>
            <tr>
                <th style="width:60px">A</th>
                <th style="width:60px">C</th>
                <th style="width:60px">A & C</th>

                <th style="width:60px">A</th>
                <th style="width:60px">C</th>
                <th style="width:60px">A & C</th>
            </tr>
        </thead>
    @if($cabang == 0)
        <?php 
            $biro = DB::table('tb_cabang')->where('cabang_kode',2)->where('turunan',0)->get();
            foreach($biro as $i => $a){

        ?>
        <tbody>
            <tr>
                <td style="text-align: center">{{$i+1}}</td>
                <td style="background-color:aqua;" colspan="12">{{$a->cabang_nama}}</td>
            </tr>
            <?php 
                $biroTurunan = DB::table('tb_cabang')->where('cabang_kode',2)->where('turunan',$a->cabang_id)->get();
                foreach($biroTurunan as $ii => $b){ 
                    $dataharian = DB::table('tb_data_biro')->where('biro_id',$b->cabang_id)->where('cabang_utama',$a->cabang_id)->where('data_biro_tgl',$tgl)->first();
            ?>
            <tr>
                <td></td>
                <td colspan="">&emsp;{{$b->cabang_nama}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_a_baru : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_c_baru : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_ac_baru : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_a_perpanjang : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_c_perpanjang : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_ac_perpanjang : 0}}</td>
            </tr>
            <?php } ?>
        </tbody>
        <?php } ?>

    @else
    <?php $namacabang = DB::table('tb_cabang')->where('cabang_id',$cabang)->first(); ?>
        <tbody>
            <tr>
                <td style="text-align: center">1</td>
                <td style="background-color:aqua;" colspan="12">{{$namacabang->cabang_nama}}</td>
            </tr>
            <?php 
                $biroTurunan = DB::table('tb_cabang')->where('cabang_kode',2)->where('turunan',$cabang)->get();
                foreach($biroTurunan as $ii => $b){ 
                    $dataharian = DB::table('tb_data_biro')->where('biro_id',$b->cabang_id)->where('cabang_utama',$cabang)->where('data_biro_tgl',$tgl)->first();
            ?>
            <tr>
                <td></td>
                <td colspan="">&emsp;{{$b->cabang_nama}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_a_baru : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_c_baru : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_ac_baru : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_a_perpanjang : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_c_perpanjang : 0}}</td>
                <td style="text-align: center">{{$dataharian != null ? $dataharian->data_biro_sim_ac_perpanjang : 0}}</td>
            </tr>
            <?php } ?>
        </tbody>

    @endif
    </table>


</body>
</html>