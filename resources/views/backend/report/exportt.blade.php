
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
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Report-Excel.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
     
    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $baru = 0;
    $perpanjang = 0;
    $peningkatan = 0;   
    $rusak = 0;
    // total
    $simlink1_total =0;
    $simlink2_total =0;
    $gerai_total =0;
    $mpp_total =0;
    $bus_total =0;
    // tambahan
    $sim_ap =0;
    $sim_cp =0;

?>
    <table>
        <thead>
            <tr>
                <th rowspan="2" colspan="13" style="font-size:22px">Laporan SIM Polda Kalimantan Timur : <?= $type ?> </th>
            </tr>
        </thead>
    </table>

    <table border="2">
        <thead style="background-color:grey">
            <tr>
                <th rowspan="3">NO</th>
                <th rowspan="3">SATPAS</th>
                <th colspan="16">JENIS GOLONGAN SIM</th>
                <th rowspan="2" colspan="2">JUMLAH PRODUKSI TERMASUK SIM RUSAK</th>
            </tr>
            <tr>
                <th colspan="3">BARU</th>
                <th colspan="8">PERPANJANG</th>
                <th colspan="5">PENINGKATAN</th>
            </tr>
            <tr>
                <th>A</th>
                <th>C</th>
                <th>D</th>

                <th>A</th>
                <th>AU</th>
                <th>C</th>
                <th>D</th>
                <th>B1</th>
                <th>B1U</th>
                <th>B2</th>
                <th>B2U</th>

                <th>AU</th>
                <th>B1</th>
                <th>B1U</th>
                <th>B2</th>
                <th>B2U</th>

                <th width="100px">PENERBITAN</th>
                <th width="100px">RUSAK</th>
            </tr>
        </thead>
        <tbody>
            @foreach($isi as $i => $row)
            <?php 

            // pecah bulan
            $pecah = explode("-",$bulan);
            $bln = $pecah[1];
            $thn = $pecah[0];

            // data simling
            $simlink = DB::table('tb_simlink')
                        ->where('id_cabang',$row->cabang_id)
                        ->where(DB::raw('MONTH(tb_simlink.tanggal)'),$bln)
                        ->where(DB::raw('YEAR(tb_simlink.tanggal)'),$thn)
                        ->select(
                            DB::raw('SUM(tb_simlink.simlink1_a) as simlink1_a'),
                            DB::raw('SUM(tb_simlink.simlink1_c) as simlink1_c'),
                            DB::raw('SUM(tb_simlink.simlink1_rusak) as simlink1_rusak'),
                            DB::raw('SUM(tb_simlink.simlink2_a) as simlink2_a'),
                            DB::raw('SUM(tb_simlink.simlink2_c) as simlink2_c'),
                            DB::raw('SUM(tb_simlink.simlink2_rusak) as simlink2_rusak'),
                        )
                        ->first();
            // simling 1 total
            $simlink1_total = (
                $simlink->simlink1_a + 
                $simlink->simlink1_c
            );
            // simling2 total
            $simlink2_total = (
                $simlink->simlink2_a +  
                $simlink->simlink2_c 
            );
            
            // data bus
            $bus = DB::table('tb_bus')
                        ->where('id_polres',$row->cabang_id)
                        ->where(DB::raw('MONTH(tb_bus.tanggal)'),$bln)
                        ->where(DB::raw('YEAR(tb_bus.tanggal)'),$thn)
                        ->select(
                            DB::raw('SUM(tb_bus.bus_a) as bus_a'),
                            DB::raw('SUM(tb_bus.bus_c) as bus_c'),
                            DB::raw('SUM(tb_bus.bus_rusak) as bus_rusak')
                        )
                        ->first();
            // bus total
            $bus_total = (
                $bus->bus_a + 
                $bus->bus_c
            );

            // data gerai
            $gerai_total = (
                $row->gerai_a + 
                $row->gerai_c
            );
            // data mpp
            $mpp_total = (
                $row->mpp_a + 
                $row->mpp_c
            );
            
            // data sim baru
            $baru = (
                $row->data_polres_sim_a_baru + 
                $row->data_polres_sim_c_baru + 
                $row->data_polres_sim_d_baru
            );
            // data sim perpanjang
            $perpanjang = (
                $row->data_polres_sim_a_perpanjang + 
                $row->data_polres_sim_a_umum_perpanjang +  
                $row->data_polres_sim_c_perpanjang + 
                $row->data_polres_sim_d_perpanjang +  
                $row->data_polres_sim_b1_baru + 
                $row->data_polres_sim_b1_perpanjang + 
                $row->data_polres_sim_b2_baru +  
                $row->data_polres_sim_b2_perpanjang +
                $simlink->simlink1_a + 
                $simlink->simlink1_c +
                $simlink->simlink2_a +  
                $simlink->simlink2_c +
                $bus->bus_a + 
                $bus->bus_c +
                $row->gerai_a + 
                $row->gerai_c +
                $row->mpp_a + 
                $row->mpp_c
            );
            // data sim peningkatan
            $peningkatan = (
                $row->data_polres_sim_a_umum_baru +
                $row->data_polres_sim_b1_umum +
                $row->data_polres_sim_b1_umum_perpanjang +
                $row->data_polres_sim_b2_umum +
                $row->data_polres_sim_b2_umum_perpanjang
            );
            // data sim rusak
            $rusak = (
                $row->rusak + 
                $row->mpp_rusak + 
                $row->gerai_rusak + 
                $bus->bus_rusak + 
                $simlink->simlink2_rusak +  
                $simlink->simlink1_rusak
            ); 

            // perpanjang a
            $sim_ap = (
                $row->data_polres_sim_a_perpanjang +
                $row->mpp_a +
                $row->gerai_a +
                $bus->bus_a +
                $simlink->simlink1_a + 
                $simlink->simlink2_a 
            );
            // perpanjang c
            $sim_cp  = (
                $row->data_polres_sim_c_perpanjang +
                $row->mpp_c +
                $row->gerai_c +
                $bus->bus_c +
                $simlink->simlink1_c + 
                $simlink->simlink2_c
            );
            
            
            ?>
            <tr>
                <td>{{ $i + 1 }}</td>
                <th style="background-color:yellow">{{ $row->cabang_nama }}</th>

                <th>{{ $row->data_polres_sim_a_baru }}</th>
                <th>{{ $row->data_polres_sim_c_baru }}</th>
                <th>{{ $row->data_polres_sim_d_baru }}</th>

                <th>{{ $row->data_polres_sim_a_perpanjang }}</th>
                <th>{{ $row->data_polres_sim_a_umum_perpanjang }}</th>
                <th>{{ $row->data_polres_sim_c_perpanjang }}</th>
                <th>{{ $row->data_polres_sim_d_perpanjang }}</th>
                <th>{{ $row->data_polres_sim_b1_baru }}</th>
                <th>{{ $row->data_polres_sim_b1_perpanjang }}</th>
                <th>{{ $row->data_polres_sim_b2_baru }}</th>
                <th>{{ $row->data_polres_sim_b2_perpanjang }}</th>
                
                <th>{{ $row->data_polres_sim_a_umum_baru }}</th>
                <th>{{ $row->data_polres_sim_b1_umum }}</th>
                <th>{{ $row->data_polres_sim_b1_umum_perpanjang }}</th>
                <th>{{ $row->data_polres_sim_b2_umum }}</th>
                <th>{{ $row->data_polres_sim_b2_umum_perpanjang }}</th>
                
                <th>
                    {{ 
                        $row->data_polres_sim_a_baru + 
                        $row->data_polres_sim_c_baru +
                        $row->data_polres_sim_d_baru +

                        $row->data_polres_sim_a_perpanjang +
                        $row->data_polres_sim_a_umum_perpanjang +
                        $row->data_polres_sim_c_perpanjang +
                        $row->data_polres_sim_d_perpanjang +
                        $row->data_polres_sim_b1_baru +
                        $row->data_polres_sim_b1_perpanjang +
                        $row->data_polres_sim_b2_baru +
                        $row->data_polres_sim_b2_perpanjang +

                        $row->data_polres_sim_a_umum_baru +
                        $row->data_polres_sim_b1_umum +
                        $row->data_polres_sim_b1_umum_perpanjang +
                        $row->data_polres_sim_b2_umum +
                        $row->data_polres_sim_b2_umum_perpanjang 
                    }}
                </th>
                <th>{{ $row->rusak }}</th>

            </tr>
            
            <tr>
                <td></td>
                <th>SIMLING I</th>

                <td></td>
                <td></td>
                <td></td>

                <th>{{$simlink->simlink1_a}}</th>
                <th></th>
                <th>{{$simlink->simlink1_c}}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <th>{{$simlink1_total}}</th>
                <th>{{$simlink->simlink1_rusak}}</th>
                
            </tr>

            <tr>
                <td></td>
                <th>SIMLING II</th>

                <td></td>
                <td></td>
                <td></td>

                <th>{{$simlink->simlink2_a}}</th>
                <th></th>
                <th>{{$simlink->simlink2_c}}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <th>{{ $simlink2_total }}</th>
                <th>{{$simlink->simlink2_rusak}}</th>
                
            </tr>

            <tr>
                <td></td>
                <th>BUS MILENIAL</th>

                <td></td>
                <td></td>
                <td></td>

                <th>{{$bus->bus_a}}</th>
                <th></th>
                <th>{{$bus->bus_c}}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <th>{{ $bus_total }}</th>
                <th>{{$bus->bus_rusak}}</th>
                
            </tr>

            <tr>
                <td></td>
                <th>GERAI</th>

                <td></td>
                <td></td>
                <td></td>

                <th>{{$row->gerai_a}}</th>
                <th></th>
                <th>{{$row->gerai_c}}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <th>{{ $gerai_total }}</th>
                <th>{{ $row->gerai_rusak }}</th>
                
            </tr>
            
            <tr>
                <td></td>
                <th>MPP</th>

                <td></td>
                <td></td>
                <td></td>

                <th>{{$row->mpp_a}}</th>
                <th></th>
                <th>{{$row->mpp_c}}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <th>{{ $mpp_total }}</th>
                <th>{{$row->mpp_rusak}}</th>
                
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">JUMLAH</th>
                <th>{{ $row->data_polres_sim_a_baru }}</th>
                <th>{{ $row->data_polres_sim_c_baru }}</th>
                <th>{{ $row->data_polres_sim_d_baru }}</th>

                <th>{{ $sim_ap }}</th>
                <th>{{ $row->data_polres_sim_a_umum_perpanjang }}</th>
                <th>{{ $sim_cp }}</th>
                <th>{{ $row->data_polres_sim_d_perpanjang }}</th>
                <th>{{ $row->data_polres_sim_b1_baru }}</th>
                <th>{{ $row->data_polres_sim_b1_perpanjang }}</th>
                <th>{{ $row->data_polres_sim_b2_baru}}</th>
                <th>{{ $row->data_polres_sim_b2_perpanjang}}</th>
                
                <th>{{ $row->data_polres_sim_a_umum_baru }}</th>
                <th>{{ $row->data_polres_sim_b1_umum }}</th>
                <th>{{ $row->data_polres_sim_b1_umum_perpanjang }}</th>
                <th>{{ $row->data_polres_sim_b2_umum }}</th>
                <th>{{ $row->data_polres_sim_b2_umum_perpanjang }}</th>
                
                <th>
                    {{ 
                        $baru + $perpanjang + $peningkatan 
                    }}
                </th>
                <th>{{ $rusak }}</th>
            </tr>
            <!-- total 2 -->
            <tr>
            <th colspan="2"  rowspan="2"></th>
                <th colspan="3">
                    {{ 
                        $baru
                    }}
                </th>
                <th colspan="8">
                    {{
                        $perpanjang
                    }}
                </th>
                <th colspan="5">
                    {{
                        $peningkatan 
                    }}
                </th>
                <th colspan="2">&nbsp;</th>
            </tr>
            <!-- grand total -->
            <tr>
                <th colspan="18">
                    {{ 
                        $baru + $perpanjang + $peningkatan
                    }}
                </th>
            </tr>
        </tfoot> 
    </table>

<!-- detail inputan -->
<br><br><br><br><br><br><br><br>
<?php
$ab = 0;
$cb = 0;
$db = 0;
$ap = 0;
$aup = 0;
$cp = 0;
$dp = 0;
$b1p = 0;
$b1up = 0;
$b2p = 0;
$b2up = 0;
$pau = 0;
$pb1 = 0;
$pb1u = 0;
$pb2 = 0;
$pb2u = 0;
$sl1a =0;
$sl1c =0;
$sl1r =0;
$sl2a =0;
$sl2c =0;
$sl2r =0;
$ba =0;
$bc =0;
$br =0;
$ma =0;
$mc =0;
$mr =0;
$ga =0;
$gc =0;
$gr =0;
?>
    <table border="2">
        <thead style="background-color:grey">
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">SATPAS</th>
                <th rowspan="2">TANGGAL</th>
                <th colspan="3">BARU</th>
                <th colspan="8">PERPANJANG</th>
                <th colspan="5">PERPANJANG</th>
                <th colspan="3">SIMLING 1</th>
                <th colspan="3">SIMLING 2</th>
                <th colspan="3">GERAI</th>
                <th colspan="3">BUS MILINEAL</th>
                <th colspan="3">MPP</th>
                
            </tr>
            <tr>
                <th width="80px">A</th>
                <th width="80px">C</th>
                <th width="80px">D</th>
                <th width="80px">A</th>
                <th width="80px">AU</th>
                <th width="80px">C</th>
                <th width="80px">D</th>
                <th width="80px">B1</th>
                <th width="80px">B1U</th>
                <th width="80px">B2</th>
                <th width="80px">B2U</th>
                <th width="80px">AU</th>
                <th width="80px">B1</th>
                <th width="80px">B1U</th>
                <th width="80px">B2</th>
                <th width="80px">B2U</th>
                <th width="80px">A</th>
                <th width="80px">C</th>
                <th width="80px">RUSAK</th>
                <th width="80px">A</th>
                <th width="80px">C</th>
                <th width="80px">RUSAK</th>
                <th width="80px">A</th>
                <th width="80px">C</th>
                <th width="80px">RUSAK</th>
                <th width="80px">A</th>
                <th width="80px">C</th>
                <th width="80px">RUSAK</th>
                <th width="80px">A</th>
                <th width="80px">C</th>
                <th width="80px">RUSAK</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail as $i => $d)
            <?php
            // $simlinkk = DB::table('tb_simlink')
            //             ->where('id_data',$row->data_polres_id)
            //             ->where(DB::raw('MONTH(tb_simlink.tanggal)'),$bln)
            //             ->where(DB::raw('YEAR(tb_simlink.tanggal)'),$thn)
            //             ->first();
            
            // // data bus
            // $buss = DB::table('tb_bus')
            //             ->where('id_data',$row->data_polres_id)
            //             ->where(DB::raw('MONTH(tb_bus.tanggal)'),$bln)
            //             ->where(DB::raw('YEAR(tb_bus.tanggal)'),$thn)
                        // ->first();

            $ab += $d->data_polres_sim_a_baru;
            $cb += $d->data_polres_sim_c_baru;
            $db += $d->data_polres_sim_d_baru;
            $ap += $d->data_polres_sim_a_perpanjang;
            $aup += $d->data_polres_sim_a_umum_perpanjang;
            $cp += $d->data_polres_sim_c_perpanjang;
            $dp += $d->data_polres_sim_d_perpanjang;
            $b1p += $d->data_polres_sim_b1_perpanjang;
            $b1up += $d->data_polres_sim_b1_umum_perpanjang;
            $b2p += $d->data_polres_sim_b2_perpanjang;
            $b2up += $d->data_polres_sim_b2_umum_perpanjang;
            $pau  += $d->data_polres_sim_a_umum_baru;
            $pb1  += $d->data_polres_sim_b1_baru;
            $pb1u  += $d->data_polres_sim_b1_umum;
            $pb2  += $d->data_polres_sim_b2_baru;
            $pb2u  += $d->data_polres_sim_b2_umum;
            $sl1a  += $d->simlink1_a;
            $sl1c  += $d->simlink1_c;
            $sl1r  += $d->simlink1_rusak;
            $sl2a  += $d->simlink2_a;
            $sl2c  += $d->simlink2_c;
            $sl2r  += $d->simlink2_rusak;
            $ba  += $d->bus_a;
            $bc  += $d->bus_c;
            $br  += $d->bus_rusak;
            $ma  += $d->mpp_a;
            $mc  += $d->mpp_c;
            $mr  += $d->mpp_rusak;
            $ga  += $d->gerai_a;
            $gc  += $d->gerai_c;
            $gr  += $d->gerai_rusak;
            
            ?>
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$d->cabang_nama}}</td>
                    <td>{{$d->data_polres_tgl}}</td>
                    <td>{{$d->data_polres_sim_a_baru}}</td>
                    <td>{{$d->data_polres_sim_c_baru}}</td>
                    <td>{{$d->data_polres_sim_d_baru}}</td>
                    <td>{{$d->data_polres_sim_a_perpanjang}}</td>
                    <td>{{$d->data_polres_sim_a_umum_perpanjang}}</td>
                    <td>{{$d->data_polres_sim_c_perpanjang}}</td>
                    <td>{{$d->data_polres_sim_d_perpanjang}}</td>
                    <td>{{$d->data_polres_sim_b1_perpanjang}}</td>
                    <td>{{$d->data_polres_sim_b1_umum_perpanjang}}</td>
                    <td>{{$d->data_polres_sim_b2_perpanjang}}</td>
                    <td>{{$d->data_polres_sim_b2_umum_perpanjang}}</td>
                    <td>{{$d->data_polres_sim_a_umum_baru}}</td>
                    <td>{{$d->data_polres_sim_b1_baru}}</td>
                    <td>{{$d->data_polres_sim_b1_umum}}</td>
                    <td>{{$d->data_polres_sim_b2_baru}}</td>
                    <td>{{$d->data_polres_sim_b2_umum}}</td>
                    <td>{{$d->simlink1_a}}</td>
                    <td>{{$d->simlink1_c}}</td>
                    <td>{{$d->simlink1_rusak}}</td>
                    <td>{{$d->simlink2_a}}</td>
                    <td>{{$d->simlink2_c}}</td>
                    <td>{{$d->simlink2_rusak}}</td>
                    <td>{{$d->gerai_a}}</td>
                    <td>{{$d->gerai_c}}</td>
                    <td>{{$d->gerai_rusak}}</td>
                    <td>{{$d->bus_a}}</td>
                    <td>{{$d->bus_c}}</td>
                    <td>{{$d->bus_rusak}}</td>
                    <td>{{$d->mpp_a}}</td>
                    <td>{{$d->mpp_c}}</td>
                    <td>{{$d->mpp_rusak}}</td>

                </tr>
            @endforeach
        </tbody>
        <tfoot style="background-color:yellow">
            <tr>
                <td colspan="3">Jumlah</td>
                <td>{{$ab}}</td>
                <td>{{$cb}}</td>
                <td>{{$db}}</td>
                <!-- <td></td> -->
                <td>{{$ap}}</td>
                <td>{{$aup}}</td>
                <td>{{$cp}}</td>
                <td>{{$dp}}</td>
                <td>{{$b1p}}</td>
                <td>{{$b1up}}</td>
                <td>{{$b2p}}</td>
                <td>{{$b2up}}</td>
                <!-- <td></td> -->
                <td>{{$pau}}</td>
                <td>{{$pb1}}</td>
                <td>{{$pb1u}}</td>
                <td>{{$pb2}}</td>
                <td>{{$pb2u}}</td>
                <!-- <td></td> -->
                <td>{{$sl1a}}</td>
                <td>{{$sl1c}}</td>
                <td>{{$sl1r}}</td>
                <!-- <td></td> -->
                <td>{{$sl2a}}</td>
                <td>{{$sl2c}}</td>
                <td>{{$sl2r}}</td>
                <!-- <td></td> -->
                <td>{{$ga}}</td>
                <td>{{$gc}}</td>
                <td>{{$gr}}</td>
                <!-- <td></td> -->
                <td>{{$ba}}</td>
                <td>{{$bc}}</td>
                <td>{{$br}}</td>
                <!-- <td></td> -->
                <td>{{$ma}}</td>
                <td>{{$mc}}</td>
                <td>{{$mr}}</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>