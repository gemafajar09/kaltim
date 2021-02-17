<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Biro</th>
            <th>SURAT KETERANGAN PSIKOLOGI SIM A BARU</th>
            <th>SURAT KETERANGAN PSIKOLOGI SIM C BARU</th>
            <th>SURAT KETERANGAN PSIKOLOGI SIM A DAN C BARU</th>
            <th>SURAT KETERANGAN PSIKOLOGI SIM A PERPANJANG</th>
            <th>SURAT KETERANGAN PSIKOLOGI SIM C PERPANJANG</th>
            <th>SURAT KETERANGAN PSIKOLOGI SIM A DAN C PERPANJANG</th>
        </tr>
    </thead>
    <tbody>
    @foreach($isi as $i => $a)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$a->cabang_nama}}</td>
            <td>{{$a->sim_a_baru}}</td>
            <td>{{$a->sim_c_baru}}</td>
            <td>{{$a->sim_ac_baru}}</td>
            <td>{{$a->sim_a_perpanjang}}</td>
            <td>{{$a->sim_c_perpanjang}}</td>
            <td>{{$a->sim_ac_perpanjang}}</td>
        </tr>
    @endforeach
    </tbody>
</table>