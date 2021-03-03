@foreach($data as $no => $row)
<tr>
    <td>{{ $no + 1 }}</td>
    <td>{{ bulantahun($row->data_biro_tgl) }}</td>
    <td>{{ $row->cabang_nama }}</td>
    <td>{{ $row->data_biro_sim_a_baru }}</td>
    <td>{{ $row->data_biro_sim_c_baru }}</td>
    <td>{{ $row->data_biro_sim_ac_baru }}</td>
    <td>{{ $row->data_biro_sim_a_perpanjang }}</td>
    <td>{{ $row->data_biro_sim_c_perpanjang }}</td>
    <td>{{ $row->data_biro_sim_ac_perpanjang }}</td>
    <td style="text-align: center">
        <a onclick="edit('{{$row->data_biro_id}}',
        '{{$row->cabang_nama}}',
        '{{$row->biro_id}}',
        '{{$row->data_biro_tgl}}',
        '{{$row->data_biro_sim_a_baru}}',
        '{{ $row->data_biro_sim_c_baru }}',
        '{{ $row->data_biro_sim_ac_baru }}',
        '{{$row->data_biro_sim_a_perpanjang}}',
        '{{ $row->data_biro_sim_c_perpanjang }}',
        '{{$row->data_biro_sim_ac_perpanjang}}')" class="icon-edit"></a>
        
        <a href="{{route('data-biro-delete', encrypt($row->data_biro_id))}}" class="icon-trash"></a>
    </td>
</tr>
@endforeach