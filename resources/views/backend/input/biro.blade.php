@extends('backend.template.index')

@section('content')
<div class="row" style="margin-bottom:10%">
    <div class="col-md-8">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Data Biro</h3>
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
                        <input type="date" name="data_biro_tgl" class="form-control">
                        <input type="hidden" name="data_biro_id" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Biro</b></label>
                        @php
                            $biro = DB::table('tb_biro')->get();
                        @endphp
                        <select name="biro_id" id="biro_id" class="form-control select2">
                            <option value="">-Pilih-</option>
                            @foreach($biro as $no => $row)
                            <option value="{{ $row->biro_id }}">{{ $row->biro_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM A Baru</b></label>
                        <input type="number" name="data_biro_sim_a_baru" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM A Perpanjang</b></label>
                        <input type="number" name="data_biro_sim_a_perpanjang" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM C Baru</b></label>
                        <input type="number" name="data_biro_sim_c_baru" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM C Perpanjang</b></label>
                        <input type="number" name="data_biro_sim_c_perpanjang" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Surat Pengantar</b></label>
                        <input type="number" name="data_biro_surat_pengantar" class="form-control">
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
