<table id="table" class="table table-striped table-responsive">
    <thead>
        <tr style="font-size:10px">
            <th>No</th>
            <th>Tanggal</th>
            <th>Polres</th>
            <th>SIM A</th>
            <th>SIM AU</th>
            <th>SIM C</th>
            <th>SIM D</th>
            <th>SIM B1</th>
            <th>SIM B1U</th>
            <th>SIM B2</th>
            <th>SIM B2U</th>
            <th>SIM A PERPANJANG</th>
            <th>SIM AU PERPANJANG</th>
            <th>SIM C PERPANJANG</th>
            <th>SIM D PERPANJANG</th>
            <th>SIM B1 PERPANJANG</th>
            <th>SIM B1U PERPANJANG</th>
            <th>SIM B2 PERPANJANG</th>
            <th>SIM B2U PERPANJANG</th>
            <th style="text-align: center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $no => $row)
        <tr>
            <td>{{ $no + 1 }}</td>
            <td>{{ $row->data_polres_tgl }}</td>
            <td>{{ $row->cabang_nama }}</td>
            <td>{{ $row->data_polres_sim_a_baru }}</td>
            <td>{{ $row->data_polres_sim_a_umum_baru }}</td>
            <td>{{ $row->data_polres_sim_c_baru }}</td>
            <td>{{ $row->data_polres_sim_d_baru }}</td>
            <td>{{ $row->data_polres_sim_b1_baru }}</td>
            <td>{{ $row->data_polres_sim_b1_umum }}</td>
            <td>{{ $row->data_polres_sim_b2_baru }}</td>
            <td>{{ $row->data_polres_sim_b2_umum }}</td>
            <td>{{ $row->data_polres_sim_a_perpanjang }}</td>
            <td>{{ $row->data_polres_sim_a_umum_perpanjang }}</td>
            <td>{{ $row->data_polres_sim_c_perpanjang }}</td>
            <td>{{ $row->data_polres_sim_d_perpanjang }}</td>
            <td>{{ $row->data_polres_sim_b1_perpanjang }}</td>
            <td>{{ $row->data_polres_sim_b1_umum_perpanjang }}</td>
            <td>{{ $row->data_polres_sim_b2_perpanjang }}</td>
            <td>{{ $row->data_polres_sim_b2_umum_perpanjang }}</td>
            <td style="text-align: center">
                <a href="{{ route('report-polres-detail', encrypt($row->data_polres_id) ) }}" class="btn btn-info btn-sm icon-info"></a>
                <a href="{{ route('report-polres-edit', encrypt($row->data_polres_id) ) }}" class="btn btn-warning btn-sm icon-edit"></a>
                <a href="{{route('data-polres-delete', encrypt($row->data_polres_id))}}" class="btn btn-danger btn-sm icon-trash"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>