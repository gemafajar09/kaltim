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
                                @if( Session::get('user_level') == 1)
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
                                )" class="icon-edit"></a>
                                <a href="{{route('data-polres-delete', encrypt($row->data_polres_id))}}" class="icon-trash"></a>
                                @else
                                    -
                                @endif
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Data polres</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('data-polres-save') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <input type="hidden" name="data_polres_id" id="data_polres_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Tanggal</b></label>
                                <input readonly type="date" value="{{date('Y-m-d')}}" name="data_polres_tgl" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_baru" id="data_polres_sim_a_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A UMUM BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_umum_baru" id="data_polres_sim_a_umum_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B1 BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b1_baru" id="data_polres_sim_b1_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B2 BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b2_baru" id="data_polres_sim_b2_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM C BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_c_baru" id="data_polres_sim_c_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM D BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_d_baru" id="data_polres_sim_d_baru" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Polres</b></label>
                                <input type="text" id="nama_cabang" readonly class="form-control" value="">
                                <input type="hidden" value="" readonly class="form-control" name="polres_id" id="polres_id">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_perpanjang" id="data_polres_sim_a_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A UMUM PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_umum_perpanjang" id="data_polres_sim_a_umum_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B1 PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b1_perpanjang" id="data_polres_sim_b1_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B2 PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b2_perpanjang" id="data_polres_sim_b2_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM C PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_c_perpanjang" id="data_polres_sim_c_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM D PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_d_perpanjang" id="data_polres_sim_d_perpanjang" class="form-control">
                            </div>
                        </div>
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
    function edit(
        id_data,
        polres_id,
        cabang_nama,
        tgl,
        sim_a,
        sim_a_umum,
        sim_b1,
        sim_b2,
        sim_c,
        sim_d,
        sim_ap,
        sim_a_umump,
        sim_b1p,
        sim_b2p,
        sim_cp,
        sim_dp,
    ){
        $('#data_polres_id').val(id_data);
        $('#nama_cabang').val(cabang_nama);
        $('#polres_id').val(polres_id);
        $('#data_polres_tgl').val(tgl);
        $('#data_polres_sim_a_baru').val(sim_a);
        $('#data_polres_sim_a_umum_baru').val(sim_a_umum);
        $('#data_polres_sim_b1_baru').val(sim_b1);
        $('#data_polres_sim_b2_baru').val(sim_b2);
        $('#data_polres_sim_c_baru').val(sim_c);
        $('#data_polres_sim_d_baru').val(sim_d);
        $('#data_polres_sim_a_perpanjang').val(sim_ap);
        $('#data_polres_sim_a_umum_perpanjang').val(sim_a_umump);
        $('#data_polres_sim_b1_perpanjang').val(sim_b1p);
        $('#data_polres_sim_b2_perpanjang').val(sim_b2p);
        $('#data_polres_sim_c_perpanjang').val(sim_cp);
        $('#data_polres_sim_d_perpanjang').val(sim_dp);
        $('#formModal').modal('show');
    }
</script>



@endsection
