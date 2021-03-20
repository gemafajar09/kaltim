
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
    // header("Content-Disposition: attachment; filename=laporan-".$type.".xls");

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
    // baru
    $sim_a =0;
    $sim_c =0;
    $sim_d =0;
    // perpanjang
    $sim_ap =0;
    $sim_aup =0;
    $sim_cp =0;
    $sim_dp =0;
    $sim_b1 =0;
    $sim_b1u =0;
    $sim_b2 =0;
    $sim_b2u =0;
    // peningkatan
    $sim_p_au =0;
    $sim_p_b1 =0;
    $sim_p_b1u =0;
    $sim_p_b2 =0;
    $sim_p_b2u =0;
    // gerai
    $gerai_a = 0;
    $gerai_c = 0;
    $gerai_rusak = 0;
    // mpp
    $mp_a = 0;
    $mp_c = 0;
    $mp_rusak = 0;
    // simling
    $simlinga = 0;
    $simlingc = 0;
    $rusaksimling = 0;

    $simlinga2 = 0;
    $simlingc2 = 0;
    $rusaksimling2 = 0;
    // sim bus
    $busa = 0;
    $busc = 0;
    $rusakbus = 0;
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

                <th>PENERBITAN</th>
                <th>RUSAK</th>
            </tr>
        </thead>
        <tbody>
            @foreach($isi as $i => $row)
            <?php 
            $bulan = date('m');
            if($type == 'Semua Data')
            {
                $cabang =  DB::table('tb_detail')
                            ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                            ->groupBy('tb_detail.id_cabang')
                            ->where(DB::raw('MONTH(tb_detail.tanggal)'),$bulan)
                            ->where('tb_detail.id_cabang',$row->cabang_id)
                            ->select(
                                DB::raw('SUM(tb_detail.sim_a_baru) as sim_a_baru'),
                                DB::raw('SUM(tb_detail.sim_a_baru) as sim_c_baru'),
                                DB::raw('SUM(tb_detail.sim_a_baru) as sim_ac_baru')
                            )
                            ->first();
                
                $simlink = DB::table('tb_simlink')
                            ->where(DB::raw('MONTH(tanggal)'),$bulan)
                            ->where('id_cabang',$row->cabang_id)
                            ->groupBy('tb_simlink.id_cabang')
                            ->select(
                                DB::raw('SUM(simlink1_a) as simlink1_a'),
                                DB::raw('SUM(simlink1_c) as simlink1_c'),
                                DB::raw('SUM(simlink1_rusak) as simlink1_rusak'),
                                DB::raw('SUM(simlink2_a) as simlink2_a'),
                                DB::raw('SUM(simlink2_c) as simlink2_c'),
                                DB::raw('SUM(simlink2_rusak) as simlink2_rusak'),
                            )
                            ->first();

                $bus = DB::table('tb_bus')
                            ->where(DB::raw('MONTH(tanggal)'),$bulan)
                            ->where('id_polres',$row->cabang_id)
                            ->groupBy('id_bus')
                            ->select(
                                DB::raw('SUM(bus_a) as bus_a'),
                                DB::raw('SUM(bus_c) as bus_c'),
                                DB::raw('SUM(bus_rusak) as bus_rusak'),
                            )
                            ->first();
            }else{
                $cabang =  DB::table('tb_detail')
                            ->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')
                            ->where('tb_detail.id_data',$row->data_polres_id)
                            ->first();
    
                $simlink = DB::table('tb_simlink')
                            ->where('id_data',$row->data_polres_id)
                            ->first();
                
                $bus = DB::table('tb_bus')
                            ->where('id_data',$row->data_polres_id)
                            ->first();
                
            }
            
            $simlink2_total += (
                $simlink->simlink2_a +  
                $simlink->simlink2_c 
            ); 

            $simlink1_total += (
                $simlink->simlink1_a + 
                $simlink->simlink1_c
            );

            $bus_total      += (
                $bus->bus_a + 
                $bus->bus_c
            );

            $baru += (
                $row->data_polres_sim_a_baru + 
                $row->data_polres_sim_c_baru + 
                $row->data_polres_sim_d_baru
            );

            $perpanjang += (
                $row->data_polres_sim_a_perpanjang + 
                $row->data_polres_sim_a_umum_perpanjang +  
                $row->data_polres_sim_c_perpanjang + 
                $row->data_polres_sim_d_perpanjang +  
                $row->data_polres_sim_b1_baru + 
                $row->data_polres_sim_b1_perpanjang + 
                $row->data_polres_sim_b2_baru +  
                $row->data_polres_sim_b2_perpanjang +
                $simlink->simlink2_a +  
                $simlink->simlink2_c + 
                $simlink->simlink1_a + 
                $simlink->simlink1_c + 
                $bus->bus_a + 
                $bus->bus_c 
            );

            $peningkatan += (
                $row->data_polres_sim_a_umum_baru +
                $row->data_polres_sim_b1_umum +
                $row->data_polres_sim_b1_umum_perpanjang +
                $row->data_polres_sim_b2_umum +
                $row->data_polres_sim_b2_umum_perpanjang
            );

            $gerai_total += ($row->gerai_a + $row->gerai_c);
            $mpp_total += ($row->mpp_a + $row->mpp_c);
            
            $rusak          += ($row->rusak); 
            $rusaksimling   += ($simlink->simlink1_rusak);
            $rusaksimling2  += ($simlink->simlink2_rusak);
            $rusakbus       += ( $bus->bus_rusak);
            // baru
            $sim_a          += $row->data_polres_sim_a_baru;
            $sim_c          += $row->data_polres_sim_c_baru;
            $sim_d          += $row->data_polres_sim_d_baru;
            // perpanjang
            $sim_ap     += $row->data_polres_sim_a_perpanjang;
            $sim_aup    += $row->data_polres_sim_a_umum_perpanjang;
            $sim_cp     += $row->data_polres_sim_c_perpanjang;
            $sim_dp     += $row->data_polres_sim_d_perpanjang;
            $sim_b1     += $row->data_polres_sim_b1_baru;
            $sim_b1u    += $row->data_polres_sim_b1_perpanjang;
            $sim_b2     += $row->data_polres_sim_b2_baru;
            $sim_b2u    += $row->data_polres_sim_b2_perpanjang;
            // peningkatan
            $sim_p_au   += $row->data_polres_sim_a_umum_baru;
            $sim_p_b1   += $row->data_polres_sim_b1_umum;
            $sim_p_b1u  += $row->data_polres_sim_b1_umum_perpanjang;
            $sim_p_b2   += $row->data_polres_sim_b2_umum;
            $sim_p_b2u  += $row->data_polres_sim_b2_umum_perpanjang;
            // simling
            $simlinga       += $simlink->simlink1_a;
            $simlingc       += $simlink->simlink1_c;
            // simling 2
            $simlinga2      += $simlink->simlink2_a;
            $simlingc2      += $simlink->simlink2_c;
            // bus
            $busa       += $bus->bus_a;
            $busc       += $bus->bus_c;
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

                <th>{{ $simlink->simlink1_a + $simlink->simlink1_c }}</th>
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

                <th>{{ $simlink->simlink2_a + $simlink->simlink2_c }}</th>
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

                <th>{{ $bus->bus_a + $bus->bus_c }}</th>
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

                <th>{{ $row->gerai_a + $row->gerai_c }}</th>
                <th>{{$row->gerai_rusak}}</th>
                
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

                <th>{{ $row->mpp_a + $row->mpp_c }}</th>
                <th>{{$row->mpp_rusak}}</th>
                
            </tr>

            <tr>
                    <td colspan="20">&nbsp;</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" rowspan="3">JUMLAH</th>
                <th>{{ $sim_a }}</th>
                <th>{{ $sim_c }}</th>
                <th>{{ $sim_d }}</th>

                <th>{{ $sim_ap + $simlinga + $simlinga2 + $busa }}</th>
                <th>{{ $sim_aup}}</th>
                <th>{{ $sim_c + $simlingc + $simlingc2 + $busc }}</th>
                <th>{{ $sim_d}}</th>
                <th>{{ $sim_b1}}</th>
                <th>{{ $sim_b1u}}</th>
                <th>{{ $sim_b2}}</th>
                <th>{{ $sim_b2u}}</th>
                
                <th>{{ $sim_p_au }}</th>
                <th>{{ $sim_p_b1 }}</th>
                <th>{{ $sim_p_b1u }}</th>
                <th>{{ $sim_p_b2 }}</th>
                <th>{{ $sim_p_b2u  }}</th>
                
                <th>
                    {{ 
                        $baru + $perpanjang + $peningkatan
                    }}
                </th>
                <th>{{ $rusak + $rusaksimling + $rusaksimling2 + $rusakbus }}</th>
            </tr>
            <!-- total 2 -->
            <tr>
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
                <th colspan="16">
                    {{ 
                        $baru + $perpanjang + $peningkatan
                    }}
                </th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </tfoot> 
    </table>


</body>
</html>