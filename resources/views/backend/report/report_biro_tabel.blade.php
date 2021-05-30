@foreach($data as $no => $row)
<tr>
    <td>{{ $no + 1 }}</td>
    <td>{{ $row->tanggal }}</td>
    <td>{{ $row->cabang_nama }}</td>
    <td>{{ $row->sim_a }}</td>
    <td>{{ $row->sim_c }}</td>
    <td>{{ $row->sim_ac }}</td>
    <!-- <td style="text-align: center">        
        <a href="{{route('data-biro-delete', encrypt($row->id_detail))}}" class="icon-trash"></a>
    </td> -->
</tr>
@endforeach