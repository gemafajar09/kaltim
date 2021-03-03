@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-12" style="margin-bottom:10%">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3 style="color:black">Data Polres</h3>
            </div>
            <div class="widget-content">
                <a href="{{ route('report-polres') }}" class="btn btn-primary mb-3">Kembali</a>
                <form action="{{ route('data-polres-save') }}" method="POST" style="font-size:10px">
                    @csrf
                    <input type="hidden" name="data_polres_id" value="{{ $sim->data_polres_id }}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    BARU
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>SIM A</b></label>
                                        <input type="number" class="form-control" name="data_polres_sim_a_baru" value="{{ $sim->data_polres_sim_a_baru }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM C</b></label>
                                        <input type="number" class="form-control" name="data_polres_sim_c_baru" value="{{ $sim->data_polres_sim_c_baru }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM D</b></label>
                                        <input type="number" class="form-control" name="data_polres_sim_d_baru" value="{{ $sim->data_polres_sim_d_baru }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    PERPANJANG
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>SIM A</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_a_perpanjang" value="{{ $sim->data_polres_sim_a_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM AU</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_a_umum_perpanjang" value="{{ $sim->data_polres_sim_a_umum_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM C</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_c_perpanjang" value="{{ $sim->data_polres_sim_c_perpanjang }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>SIM D</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_d_perpanjang" value="{{ $sim->data_polres_sim_d_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM B1</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_b1_perpanjang" value="{{ $sim->data_polres_sim_b1_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM B1U</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_b1_umum_perpanjang" value="{{ $sim->data_polres_sim_b1_umum_perpanjang }}">
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>SIM B2</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_b2_perpanjang" value="{{ $sim->data_polres_sim_b2_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM B2U</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_b2_umum_perpanjang" value="{{ $sim->data_polres_sim_b2_umum_perpanjang }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    PENINGKATAN
                                </div>
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>SIM AU</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_a_umum_baru" value="{{ $sim->data_polres_sim_a_umum_baru }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B1</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_b1_umum" value="{{ $sim->data_polres_sim_b1_umum }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B1U</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_b1_umum_perpanjang" value="{{ $sim->data_polres_sim_b1_umum_perpanjang }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>SIM B2</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_b2_umum" value="{{ $sim->data_polres_sim_b2_umum }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B2U</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_b2_umum_perpanjang" value="{{ $sim->data_polres_sim_b2_umum_perpanjang }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>DATA RUSAK</b></label>
                                            <input type="number" class="form-control" name="rusak" value="{{ $sim->rusak }}">
                                        </div>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <div class="col-md-4 py-2">
                            <div class="card">
                                <div class="card-header">
                                    SIM LING I
                                </div>
                                <div class="card-body">
                                <input type="hidden" name="simlink_id" value="{{ $simlink->simlink_id }}">
                                    <div class="form-group">
                                        <label><b>SIM LING I A</b></label>
                                        <input type="number" class="form-control" name="simlink1_a" value="{{ $simlink->simlink1_a }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I C</b></label>
                                        <input type="number" class="form-control" name="simlink1_c" value="{{ $simlink->simlink1_c }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I RUSAK</b></label>
                                        <input type="number" class="form-control" name="simlink1_rusak" value="{{ $simlink->simlink1_rusak }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 py-2">
                            <div class="card">
                                <div class="card-header">
                                    SIM LING II
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>SIM LING II A</b></label>
                                        <input type="number" class="form-control" name="simlink2_a" value="{{ $simlink->simlink2_a }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING II C</b></label>
                                        <input type="number" class="form-control" name="simlink2_c" value="{{ $simlink->simlink2_c }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING II RUSAK</b></label>
                                        <input type="number" class="form-control" name="simlink2_rusak" value="{{ $simlink->simlink2_rusak }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 py-2">
                            <div class="card">
                                <div class="card-header">
                                    BUS MILENIAL
                                </div>
                                <div class="card-body">
                                <input type="hidden" name="bus_id" value="{{ $bus->bus_id }}">
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL A</b></label>
                                        <input type="number" class="form-control" name="bus_a" value="{{ $bus->bus_a }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL C</b></label>
                                        <input type="number" class="form-control" name="bus_c" value="{{ $bus->bus_c }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL RUSAK</b></label>
                                        <input type="number" class="form-control" name="bus_rusak" value="{{ $bus->bus_rusak }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 py-2">
                            <div class="card">
                                <div class="card-header">
                                    GERAI
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>SIM A</b></label>
                                        <input type="number" class="form-control" name="geraia" value="{{ $sim->gerai_a }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM C</b></label>
                                        <input type="number" class="form-control" name="geraic" value="{{ $sim->gerai_c }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM RUSAK</b></label>
                                        <input type="number" class="form-control" name="gerairusak" value="{{ $sim->gerai_rusak }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 py-2">
                            <div class="card">
                                <div class="card-header">
                                    MPP
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>SIM A</b></label>
                                        <input type="number" class="form-control" name="mppa" value="{{ $sim->mpp_a }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM C</b></label>
                                        <input type="number" class="form-control" name="mppc" value="{{ $sim->mpp_c }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM RUSAK</b></label>
                                        <input type="number" class="form-control" name="mpprusak" value="{{ $sim->mpp_rusak }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach($isi as $br)
                        <div class="col-md-4 py-2">
                            <div class="card">
                                <div class="card-header">
                                    {{$br->cabang_nama}}
                                    <input type="hidden" name="id_detail[]" value="{{$br->id_detail}}">
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><b>SURAT KETERANGAN PSIKOLOGI SIM A</b></label>
                                                <input value="{{$br->sim_a_baru}}" type="number" name="data_biro_sim_a_baru[]" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SURAT KETERANGAN PSIKOLOGI SIM C</b></label>
                                                <input value="{{$br->sim_c_baru}}" type="number" name="data_biro_sim_c_baru[]" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SURAT KETERANGAN PSIKOLOGI SIM A DAN C</b></label>
                                                <input value="{{$br->sim_ac_baru}}" type="number" name="data_biro_sim_ac_baru[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                    <div class="col-md-12 py-3" align="right">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                    </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
