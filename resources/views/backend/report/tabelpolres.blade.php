<table id="table" class="table table-striped table-responsive">
    <thead>
        <tr style="font-size:10px">
            <th>No</th>
            <th>Tanggal</th>
            <th>Polres</th>
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
            <th style="text-align: center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $no => $row)
        <tr>
            <td>{{ $no + 1 }}</td>
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
            <td style="text-align: center">
                @if( Session::get('user_level') == 1)
                <a onclick="detail('{{$row->data_polres_id}}')" class="btn btn-info btn-sm icon-info"></a>
                <a onclick="edit(
                '{{$row->data_polres_id}}',
                '{{$row->polres_id}}',
                '{{$row->cabang_nama}}',
                '{{$row->data_polres_tgl}}',
                '{{$row->data_polres_sim_a_baru}}',
                '{{$row->data_polres_sim_a_umum_baru}}',
                '{{$row->data_polres_sim_b1_baru}}',
                '{{$row->data_polres_sim_b2_baru}}',
                '{{$row->data_polres_sim_c_baru}}',
                '{{$row->data_polres_sim_d_baru}}',
                '{{$row->data_polres_sim_a_perpanjang}}',
                '{{$row->data_polres_sim_a_umum_perpanjang}}',
                '{{$row->data_polres_sim_b1_perpanjang}}',
                '{{$row->data_polres_sim_b2_perpanjang}}',
                '{{$row->data_polres_sim_c_perpanjang}}',
                '{{$row->data_polres_sim_d_perpanjang}}'
                )" class="btn btn-warning btn-sm icon-edit"></a>
                <a href="{{route('data-polres-delete', encrypt($row->data_polres_id))}}" class="btn btn-danger btn-sm icon-trash"></a>
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>