@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-8" style="margin-bottom:10%">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Data Polres</h3>
            </div>
            <div class="widget-content">
            <div style="display:none" id="error" class="alert alert-danger">
                {{session('error')}}
            </div>
            <div style="display:none" id="success" class="alert alert-success">
                {{session('pesan')}}
            </div>
                <form action="{{ route('data-polres-save') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <label><b>Tanggal</b></label>
                        <input type="date" name="data_polres_tgl" class="form-control">
                        <input type="hidden" name="data_polres_id" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Polres</b></label>
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
                        <input type="number" name="data_polres_sim_a_baru" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM A Perpanjang</b></label>
                        <input type="number" name="data_polres_sim_a_perpanjang" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM C Baru</b></label>
                        <input type="number" name="data_polres_sim_c_baru" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM C Perpanjang</b></label>
                        <input type="number" name="data_polres_sim_c_perpanjang" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Surat Pengantar Dari polres</b></label>
                        <input type="number" name="data_polres_surat_pengantar_dari_biro" class="form-control">
                    </div>
                    <div class="col-md-12 py-3" align="right">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                    </div>
                </form>
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
    @include('backend.template.component.calender')
</div>

@endsection
