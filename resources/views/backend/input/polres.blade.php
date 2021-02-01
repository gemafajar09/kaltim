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
                    <input type="hidden" name="data_polres_id" id="data_polres_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Tanggal</b></label>
                                <input readonly type="date" value="{{date('Y-m-d')}}" name="data_polres_tgl" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A UMUM BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_umum_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B1 BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b1_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B2 BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b2_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM C BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_c_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM D BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_d_baru" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Polres</b></label>
                                @php
                                    $polres = DB::table('tb_cabang')->where('cabang_id',session('cabang_id'))->first();
                                @endphp
                                <input type="text" readonly class="form-control" value="{{$polres->cabang_nama}}">
                                <input type="hidden" value="{{session('cabang_id')}}" readonly class="form-control" name="polres_id" id="polres_id">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A UMUM PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_umum_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B1 PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b1_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B2 PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b2_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM C PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_c_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM D PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_d_perpanjang" class="form-control">
                            </div>
                        </div>
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
