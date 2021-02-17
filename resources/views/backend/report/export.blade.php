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
                <th>No</th>
                <th>TANGGAL</th>
                <th>POLRES</th>
                <th>SIM A BARU</th>
                <th>SIM A UMUM BARU</th>
                <th>SIM B1 BARU</th>
                <th>SIM B2 BARU</th>
                <th>SIM C BARU</th>
                <th>SIM D BARU</th>
                <th>SIM A PERPANJANG</th>
                <th>SIM A UMUM PERPANJANG</th>
                <th>SIM B1 PERPANJANG</th>
                <th>SIM B2 PERPANJANG</th>
                <th>SIM C PERPANJANG</th>
                <th>SIM D PERPANJANG</th>
                @foreach($biro as $c)
                <th>{{$c->cabang_nama}}</th>
                <th>SURAT KETERANGAN A BARU</th>
                <th>SURAT KETERANGAN C BARU</th>
                <th>SURAT KETERANGAN A & C BARU</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($isi as $i => $row)
            <?php $cabang =  DB::table('tb_detail')->join('tb_cabang','tb_cabang.cabang_id','tb_detail.id_biro')->where('tb_detail.id_data',$row->data_polres_id)->get(); ?>
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ bulantahun($row->data_polres_tgl) }}</td>
                <td>{{ $row->cabang_nama }}</td>
                <td>{{ $row->data_polres_sim_a_baru }}</td>
                <td>{{ $row->data_polres_sim_a_umum_baru }}</td>
                <td>{{ $row->data_polres_sim_b1_baru }}</td>
                <td>{{ $row->data_polres_sim_b2_baru }}</td>
                <td>{{ $row->data_polres_sim_c_baru }}</td>
                <td>{{ $row->data_polres_sim_d_baru }}</td>
                <td>{{ $row->data_polres_sim_a_perpanjang }}</td>
                <td>{{ $row->data_polres_sim_a_umum_perpanjang }}</td>
                <td>{{ $row->data_polres_sim_b1_perpanjang }}</td>
                <td>{{ $row->data_polres_sim_b2_perpanjang }}</td>
                <td>{{ $row->data_polres_sim_c_perpanjang }}</td>
                <td>{{ $row->data_polres_sim_d_perpanjang }}</td>
                @foreach($cabang as $b)
                <td>{{$b->cabang_nama}}</td>
                <td>{{$b->sim_a_baru}}</td>
                <td>{{$b->sim_c_baru}}</td>
                <td>{{$b->sim_ac_baru}}</td>
                <td>{{$b->sim_a_perpanjang}}</td>
                <td>{{$b->sim_c_perpanjang}}</td>
                <td>{{$b->sim_ac_perpanjang}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>