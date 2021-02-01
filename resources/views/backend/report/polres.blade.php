@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Laporan Polres</h3>
            </div>
            <div class="widget-content">
                <div style="display:none" id="error" class="alert alert-danger">
                    {{session('error')}}
                </div>
                <div style="display:none" id="success" class="alert alert-success">
                    {{session('pesan')}}
                </div>
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
                                <a onclick="edit('{{$row->data_polres_id}}','{{$row->polres_id}}','{{$row->data_polres_tgl}}','{{$row->data_polres_sim_a_baru}}','{{$row->data_polres_sim_a_perpanjang}}','{{$row->data_polres_sim_c_baru}}','{{$row->data_polres_sim_c_perpanjang}}')" class="icon-edit"></a>
                                <a href="{{route('data-polres-delete', encrypt($row->data_polres_id))}}" class="icon-trash"></a>
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
            <h5 class="modal-title">Add polres</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('data-polres-save') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="col-md-12">
                    <label><b>Tanggal</b></label>
                    <input type="date" name="data_polres_tgl" id="data_polres_tgl" class="form-control">
                    <input type="hidden" name="data_polres_id" id="data_polres_id" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>polres</b></label>
                    @php
                        $polres = DB::table('tb_polres')->get();
                    @endphp
                    <select name="polres_id" id="polres_id" class="form-control select2">
                        <option value="">-Pilih-</option>
                        @foreach($polres as $no => $row)
                        <option value="{{ $row->polres_id }}">{{ $row->polres_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label><b>SIM A Baru</b></label>
                    <input type="number" name="data_polres_sim_a_baru" id="data_polres_sim_a_baru" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>SIM A Perpanjang</b></label>
                    <input type="number" name="data_polres_sim_a_perpanjang" id="data_polres_sim_a_perpanjang" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>SIM C Baru</b></label>
                    <input type="number" name="data_polres_sim_c_baru" id="data_polres_sim_c_baru" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>SIM C Perpanjang</b></label>
                    <input type="number" name="data_polres_sim_c_perpanjang" id="data_polres_sim_c_perpanjang" class="form-control">
                </div>
                <div class="col-md-12">
                    <label><b>Surat Pengantar</b></label>
                    <input type="number" name="data_polres_surat_pengantar_dari_biro" id="data_polres_surat_pengantar_dari_biro" class="form-control">
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
    function edit(data_polres_id, polres_id, data_polres_tgl,data_polres_sim_a_baru, data_polres_sim_a_perpanjang, data_polres_sim_c_baru,data_polres_sim_c_perpanjang,data_polres_surat_pengantar_dari_biro){
        $('#data_polres_id').val(data_polres_id);
        $('#polres_id').val(polres_id).change();
        $('#data_polres_tgl').val(data_polres_tgl);
        $('#data_polres_sim_a_baru').val(data_polres_sim_a_baru);
        $('#data_polres_sim_a_perpanjang').val(data_polres_sim_a_perpanjang);
        $('#data_polres_sim_c_baru').val(data_polres_sim_c_baru);
        $('#data_polres_sim_c_perpanjang').val(data_polres_sim_c_perpanjang);
        $('#data_polres_surat_pengantar_dari_biro').val(data_polres_surat_pengantar_dari_biro);
        $('#formModal').modal('show');
    }
</script>



@endsection
