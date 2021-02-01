@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Laporan Biro</h3>
            </div>
            <div class="widget-content">
                <div style="display:none" id="error" class="alert alert-danger">
                    {{session('error')}}
                </div>
                <div style="display:none" id="success" class="alert alert-success">
                    {{session('pesan')}}
                </div>
                <table id="table" class="table table-striped">
                    <thead>
                        <tr style="font-size:10px">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Biro</th>
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
                            <td>{{ bulantahun($row->data_biro_tgl) }}</td>
                            <td>{{ $row->cabang_nama }}</td>
                            <td>{{ $row->data_biro_sim_a_baru }}</td>
                            <td>{{ $row->data_biro_sim_a_umum_baru }}</td>
                            <td>{{ $row->data_biro_sim_b1_baru }}</td>
                            <td>{{ $row->data_biro_sim_b2_baru }}</td>
                            <td>{{ $row->data_biro_sim_c_baru }}</td>
                            <td>{{ $row->data_biro_sim_d_baru }}</td>
                            <td>{{ $row->data_biro_sim_a_perpanjang }}</td>
                            <td>{{ $row->data_biro_sim_a_umum_perpanjang }}</td>
                            <td>{{ $row->data_biro_sim_b1_perpanjang }}</td>
                            <td>{{ $row->data_biro_sim_b2_perpanjang }}</td>
                            <td>{{ $row->data_biro_sim_c_perpanjang }}</td>
                            <td>{{ $row->data_biro_sim_d_perpanjang }}</td>
                            <td style="text-align: center">
                                <a onclick="edit('{{$row->data_biro_id}}','{{$row->biro_id}}','{{$row->data_biro_tgl}}','{{$row->data_biro_sim_a_baru}}','{{$row->data_biro_sim_a_perpanjang}}','{{$row->data_biro_sim_c_baru}}','{{$row->data_biro_sim_c_perpanjang}}')" class="icon-edit"></a>
                                
                                <a href="{{route('data-biro-delete', encrypt($row->data_biro_id))}}" class="icon-trash"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    @if (session('validasi'))
        <script>
            $('#error').show();
            setInterval(function(){ $('#error').hide(); }, 5000);
        </script>
    @endif
    @if (session('pesan'))
        <script>
            $('#success').show();
            setInterval(function(){ $('#success').hide(); }, 5000);
        </script>
    @endif
<div class="modal" id="formModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Biro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('data-biro-save') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="col-md-12">
                    <label><b>Tanggal</b></label>
                    <input type="date" name="data_biro_tgl" id="data_biro_tgl" class="form-control">
                    <input type="hidden" name="data_biro_id" id="data_biro_id" class="form-control">
                </div>
                <div class="col-md-12">
                    
                </div>
                <div class="col-md-12">
                    <label><b>SIM A Baru</b></label>
                    <input type="number" name="data_biro_sim_a_baru" id="data_biro_sim_a_baru" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>SIM A Perpanjang</b></label>
                    <input type="number" name="data_biro_sim_a_perpanjang" id="data_biro_sim_a_perpanjang" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>SIM C Baru</b></label>
                    <input type="number" name="data_biro_sim_c_baru" id="data_biro_sim_c_baru" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>SIM C Perpanjang</b></label>
                    <input type="number" name="data_biro_sim_c_perpanjang" id="data_biro_sim_c_perpanjang" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>Surat Pengantar</b></label>
                    <input type="number" name="data_biro_surat_pengantar" id="data_biro_surat_pengantar" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm" style="background-color: #019943">Save</button>
                <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    function edit(data_biro_id, biro_id, data_biro_tgl,data_biro_sim_a_baru, data_biro_sim_a_perpanjang, data_biro_sim_c_baru,data_biro_sim_c_perpanjang,data_biro_surat_pengantar){
        $('#data_biro_id').val(data_biro_id);
        $('#biro_id').val(biro_id).change();
        $('#data_biro_tgl').val(data_biro_tgl);
        $('#data_biro_sim_a_baru').val(data_biro_sim_a_baru);
        $('#data_biro_sim_a_perpanjang').val(data_biro_sim_a_perpanjang);
        $('#data_biro_sim_c_baru').val(data_biro_sim_c_baru);
        $('#data_biro_sim_c_perpanjang').val(data_biro_sim_c_perpanjang);
        $('#data_biro_surat_pengantar').val(data_biro_surat_pengantar);
        $('#formModal').modal('show');
    }
</script>

@endsection
