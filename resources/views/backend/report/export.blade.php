<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

                $simlink_total =0;
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

            $simlink_total += ($simlink->simlink1 + $simlink->simlink2); 
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
                <td>SIMLING I</td>

                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <th>{{ $simlink->simlink1 }}</th>
                <td></td>
                
            </tr>

            <tr>
                <td></td>
                <td>SIMLING II</td>

                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <th>{{ $simlink->simlink2 }}</th>
                <td></td>
                
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" rowspan="3">JUMLAH</th>
                <th>{{ $sim_a }}</th>
                <th>{{ $sim_c }}</th>
                <th>{{ $sim_d }}</th>

                <th>{{ $sim_ap }}</th>
                <th>{{ $sim_aup }}</th>
                <th>{{ $sim_c }}</th>
                <th>{{ $sim_d }}</th>
                <th>{{ $sim_b1 }}</th>
                <th>{{ $sim_b1u }}</th>
                <th>{{ $sim_b2 }}</th>
                <th>{{ $sim_b2u }}</th>
                
                <th>{{ $sim_p_au }}</th>
                <th>{{ $sim_p_b1 }}</th>
                <th>{{ $sim_p_b1u }}</th>
                <th>{{ $sim_p_b2 }}</th>
                <th>{{ $sim_p_b2u  }}</th>
                
                <th>
                    {{ 
                        $baru + $perpanjang + $peningkatan + $simlink_total
                    }}
                </th>
                <th>{{ $rusak }}</th>
            </tr>
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