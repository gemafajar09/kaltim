
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
header("Content-Disposition: attachment; filename=laporan-".date('Y-m').".xls");
?>
    <table>
        <thead>
            <tr>
                <th rowspan="2" colspan="13" style="font-size:22px">Laporan SIM Polda Kalimantan Timur Tanggal : <?= tanggal_indonesia(date('Y-m-d')) ?> </th>
            </tr>
        </thead>
    </table>

    <table border="2">
        <thead>
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
            <?php
                $baru = 0;
                $perpanjang = 0;
                $peningkatan = 0;
                $peningkatan = 0;
                $rusaksimling = 0;
                $rusaksimling2 = 0;
                $rusakbus = 0;
                $rusak = 0;
                $sim_a =0;
                $sim_c =0;
                $sim_d =0;

                $sim_ap =0;
                $sim_aup =0;
                $sim_c =0;
                $sim_d =0;
                $sim_b1 =0;
                $sim_b1u =0;
                $sim_b2 =0;
                $sim_b2u =0;

                $sim_p_au =0;
                $sim_p_b1 =0;
                $sim_p_b1u =0;
                $sim_p_b2 =0;
                $sim_p_b2u =0;

                $simlink1_total =0;
                $simlink2_total =0;
                $bus_total =0;

                $simlinga = 0;
                $simlingau = 0;
                $simlingc = 0;
                $simlingd = 0;
                $simlingb1 = 0;
                $simlingb1u = 0;
                $simlingb2 = 0;
                $simlingb2u = 0;
                $simlinga2 = 0;
                $simlingau2 = 0;
                $simlingc2 = 0;
                $simlingd2 = 0;
                $simlingb12 = 0;
                $simlingb1u2 = 0;
                $simlingb22 = 0;
                $simlingb2u2 = 0;

                $busa = 0;
                $busau = 0;
                $busc = 0;
                $busd = 0;
                $busb1 = 0;
                $busb1u = 0;
                $busb2 = 0;
                $busb2u = 0;
            ?>
            @foreach($isi as $i => $row)
            <?php 
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
            
            $baru += ($row->data_polres_sim_a_baru + $row->data_polres_sim_c_baru + $row->data_polres_sim_d_baru);

            $perpanjang += (
                            $row->data_polres_sim_a_perpanjang + $row->data_polres_sim_a_umum_perpanjang +  $row->data_polres_sim_c_perpanjang + $row->data_polres_sim_d_perpanjang +  $row->data_polres_sim_b1_baru + $row->data_polres_sim_b1_perpanjang + $row->data_polres_sim_b2_baru +  $row->data_polres_sim_b2_perpanjang );

            $peningkatan += (
                                $row->data_polres_sim_a_umum_baru +
                                $row->data_polres_sim_b1_umum +
                                $row->data_polres_sim_b1_umum_perpanjang +
                                $row->data_polres_sim_b2_umum +
                                $row->data_polres_sim_b2_umum_perpanjang
                            );

            $rusak += ($row->rusak); 
            $rusaksimling += ($simlink->simlink1_rusak);
            $rusaksimling2 += ($simlink->simlink2_rusak);
            $rusakbus += ( $bus->bus_rusak);

            $sim_a += $row->data_polres_sim_a_baru;
            $sim_c += $row->data_polres_sim_c_baru;
            $sim_d += $row->data_polres_sim_d_baru;

            $sim_ap += $row->data_polres_sim_a_perpanjang;
            $sim_aup += $row->data_polres_sim_a_umum_perpanjang;
            $sim_c += $row->data_polres_sim_c_perpanjang;
            $sim_d += $row->data_polres_sim_d_perpanjang;
            $sim_b1 += $row->data_polres_sim_b1_baru;
            $sim_b1u += $row->data_polres_sim_b1_perpanjang;
            $sim_b2 += $row->data_polres_sim_b2_baru;
            $sim_b2u += $row->data_polres_sim_b2_perpanjang;

            $sim_p_au +=$row->data_polres_sim_a_umum_baru;
            $sim_p_b1 +=$row->data_polres_sim_b1_umum;
            $sim_p_b1u +=$row->data_polres_sim_b1_umum_perpanjang;
            $sim_p_b2 +=$row->data_polres_sim_b2_umum;
            $sim_p_b2u +=$row->data_polres_sim_b2_umum_perpanjang;

            $simlink1_total += ($simlink->simlink1_a + $simlink->simlink1_au + $simlink->simlink1_c + $simlink->simlink1_d + $simlink->simlink1_b1 + $simlink->simlink1_b1u + $simlink->simlink1_b2 + $simlink->simlink1_b2u ); 
            $simlinga += $simlink->simlink1_a;
            $simlingau += $simlink->simlink1_au;
            $simlingc += $simlink->simlink1_c;
            $simlingd += $simlink->simlink1_d;
            $simlingb1 += $simlink->simlink1_b1;
            $simlingb1u += $simlink->simlink1_b1u;
            $simlingb2 += $simlink->simlink1_b2;
            $simlingb2u += $simlink->simlink1_b2u;
            $simlink2_total += ($simlink->simlink2_a + $simlink->simlink2_au + $simlink->simlink2_c + $simlink->simlink2_d + $simlink->simlink2_b1 + $simlink->simlink2_b1u + $simlink->simlink2_b2 + $simlink->simlink2_b2u ); 
            $simlinga2 += $simlink->simlink2_a;
            $simlingau2 += $simlink->simlink2_au;
            $simlingc2 += $simlink->simlink2_c;
            $simlingd2 += $simlink->simlink2_d;
            $simlingb12 += $simlink->simlink2_b1;
            $simlingb1u2 += $simlink->simlink2_b1u;
            $simlingb22 += $simlink->simlink2_b2;
            $simlingb2u2 += $simlink->simlink2_b2u;
            $bus_total += ($bus->bus_a + $bus->bus_au + $bus->bus_c + $bus->bus_d + $bus->bus_b1 + $bus->bus_b1u + $bus->bus_b2 + $bus->bus_b2u);
            $busa += $bus->bus_a;
            $busau += $bus->bus_au;
            $busc += $bus->bus_c;
            $busd += $bus->bus_d;
            $busb1 += $bus->bus_b1;
            $busb1u += $bus->bus_b1u;
            $busb2 += $bus->bus_b2;
            $busb2u += $bus->bus_b2u;
            ?>
            <tr>
                <td>{{ $i + 1 }}</td>
                <th>{{ $row->cabang_nama }}</th>

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
                <th>{{$simlink->simlink1_au}}</th>
                <th>{{$simlink->simlink1_c}}</th>
                <th>{{$simlink->simlink1_d}}</th>
                <th>{{$simlink->simlink1_b1}}</th>
                <th>{{$simlink->simlink1_b1u}}</th>
                <th>{{$simlink->simlink1_b2}}</th>
                <th>{{$simlink->simlink1_b2u}}</th>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <th>{{ $simlink1_total }}</th>
                <th>{{$simlink->simlink1_rusak}}</th>
                
            </tr>

            <tr>
                <td></td>
                <th>SIMLING II</th>

                <td></td>
                <td></td>
                <td></td>

                <th>{{$simlink->simlink2_a}}</th>
                <th>{{$simlink->simlink2_au}}</th>
                <th>{{$simlink->simlink2_c}}</th>
                <th>{{$simlink->simlink2_d}}</th>
                <th>{{$simlink->simlink2_b1}}</th>
                <th>{{$simlink->simlink2_b1u}}</th>
                <th>{{$simlink->simlink2_b2}}</th>
                <th>{{$simlink->simlink2_b2u}}</th>

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
                <th>{{$bus->bus_au}}</th>
                <th>{{$bus->bus_c}}</th>
                <th>{{$bus->bus_d}}</th>
                <th>{{$bus->bus_b1}}</th>
                <th>{{$bus->bus_b1u}}</th>
                <th>{{$bus->bus_b2}}</th>
                <th>{{$bus->bus_b2u}}</th>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <th>{{ $bus_total }}</th>
                <th>{{$bus->bus_rusak}}</th>
                
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" rowspan="3">JUMLAH</th>
                <th>{{ $sim_a }}</th>
                <th>{{ $sim_c }}</th>
                <th>{{ $sim_d }}</th>

                <th>{{ $sim_ap+$simlinga+$simlinga2+$busa }}</th>
                <th>{{ $sim_aup+$simlingau+$simlingau2+$busau }}</th>
                <th>{{ $sim_c+$simlingc+$simlingc2+$busc }}</th>
                <th>{{ $sim_d+$simlingd+$simlingd2+$busd }}</th>
                <th>{{ $sim_b1+$simlingb1+$simlingb12+$busb1 }}</th>
                <th>{{ $sim_b1u+$simlingb1u+$simlingb1u2+$busb1u }}</th>
                <th>{{ $sim_b2+$simlingb2+$simlingb22+$busb2 }}</th>
                <th>{{ $sim_b2u+$simlingb2u+$simlingb2u2+$busb2u }}</th>
                
                <th>{{ $sim_p_au }}</th>
                <th>{{ $sim_p_b1 }}</th>
                <th>{{ $sim_p_b1u }}</th>
                <th>{{ $sim_p_b2 }}</th>
                <th>{{ $sim_p_b2u  }}</th>
                
                <th>
                    {{ 
                        $baru + $perpanjang + $peningkatan + $simlink1_total + $simlink2_total + $bus_total
                    }}
                </th>
                <th>{{ $rusak + $rusaksimling + $rusaksimling2 + $rusakbus }}</th>
            </tr>
            <tr>
                <th colspan="3">
                    {{ 
                        $sim_a + $sim_c + $sim_d
                    }}
                </th>
                <th colspan="8">
                    {{
                        ($sim_ap+$simlinga+$simlinga2+$busa)+($sim_aup+$simlingau+$simlingau2+$busau)+($sim_c+$simlingc+$simlingc2+$busc)+($sim_d+$simlingd+$simlingd2+$busd)+($sim_b1+$simlingb1+$simlingb12+$busb1)+($sim_b1u+$simlingb1u+$simlingb1u2+$busb1u)+($sim_b2+$simlingb2+$simlingb22+$busb2)+($sim_b2u+$simlingb2u+$simlingb2u2+$busb2u)
                    }}
                </th>
                <th colspan="5">
                    {{
                        $peningkatan 
                    }}
                </th>
                <th colspan="2">&nbsp;</th>
            </tr>
            <tr>
                <th colspan="16">
                    {{ 
                        ($sim_a + $sim_c + $sim_d) + (($sim_ap+$simlinga+$simlinga2+$busa)+($sim_aup+$simlingau+$simlingau2+$busau)+($sim_c+$simlingc+$simlingc2+$busc)+($sim_d+$simlingd+$simlingd2+$busd)+($sim_b1+$simlingb1+$simlingb12+$busb1)+($sim_b1u+$simlingb1u+$simlingb1u2+$busb1u)+($sim_b2+$simlingb2+$simlingb22+$busb2)+($sim_b2u+$simlingb2u+$simlingb2u2+$busb2u)) + $peningkatan
                    }}
                </th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </tfoot> 
    </table>


</body>
</html>