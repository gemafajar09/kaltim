
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
                <th rowspan="2" colspan="13" style="font-size:22px">Laporan Surat Pisikologi Biro</th>
            </tr>
        </thead>
    </table>

    <table border="2">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Biro</th>
                <th colspan="3">Baru</th>
                <th colspan="3">Perpanjang</th>
            </tr>
            <tr>
                <th>Surat Psikologi Sim A</th>
                <th>Surat Psikologi Sim C</th>
                <th>Surat Psikologi Sim A & C</th>
                <th>Surat Psikologi Sim A</th>
                <th>Surat Psikologi Sim C</th>
                <th>Surat Psikologi Sim A & C</th>
            </tr>
        </thead>
        <tbody>
        @php
            $sab =0;
            $scb =0;
            $sacb =0;
            $sap =0;
            $scp =0;
            $sacp =0;
        @endphp
        @foreach($data as $no => $row)
        @php
            $sab += $row->data_biro_sim_a_baru;
            $scb += $row->data_biro_sim_c_baru;
            $sacb += $row->data_biro_sim_ac_baru;
            $sap += $row->data_biro_sim_a_perpanjang;
            $scp += $row->data_biro_sim_c_perpanjang;
            $sacp += $row->data_biro_sim_ac_perpanjang;

        @endphp
        <tr>
            <td>{{ $no + 1 }}</td>
            <th>{{ $row->cabang_nama }}</th>
            <th>{{ $row->data_biro_sim_a_baru }}</th>
            <th>{{ $row->data_biro_sim_c_baru }}</th>
            <th>{{ $row->data_biro_sim_ac_baru }}</th>
            <th>{{ $row->data_biro_sim_a_perpanjang }}</th>
            <th>{{ $row->data_biro_sim_c_perpanjang }}</th>
            <th>{{ $row->data_biro_sim_ac_perpanjang }}</th>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Jumlah</td>
                <th colspan="3">{{$sab + $scb + $sacb}}</th>
                <th colspan="3">{{$sap + $scp + $sacp}}</th>
            </tr>
        </tfoot>
    </table>


</body>
</html>