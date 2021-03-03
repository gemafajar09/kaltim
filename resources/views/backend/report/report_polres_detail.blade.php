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
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                BARU
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><b>SIM A BARU</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_a_baru }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM C BARU</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_c_baru }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM D BARU</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_d_baru }}</b></label>
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
                                            <label><b>SIM A PERPANJANG</b></label>
                                            <label>:</label>
                                            <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_a_perpanjang }}</b></label>
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM AU PERPANJANG</b></label>
                                            <label>:</label>
                                            <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_a_umum_perpanjang }}</b></label>
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM C PERPANJANG</b></label>
                                            <label>:</label>
                                            <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_c_perpanjang }}</b></label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><b>SIM D PERPANJANG</b></label>
                                            <label>:</label>
                                            <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_d_perpanjang }}</b></label>
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B1 PERPANJANG</b></label>
                                            <label>:</label>
                                            <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_b1_perpanjang }}</b></label>
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B1U PERPANJANG</b></label>
                                            <label>:</label>
                                            <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_b1_umum_perpanjang }}</b></label>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><b>SIM B2 PERPANJANG</b></label>
                                            <label>:</label>
                                            <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_b2_perpanjang }}</b></label>
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B2U PERPANJANG</b></label>
                                            <label>:</label>
                                            <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_b2_umum_perpanjang }}</b></label>
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
                                        <label><b>SIM AU PENINGKATAN</b></label>
                                        <label>:</label>
                                        <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_a_umum_baru }}</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM B1 PENINGKATAN</b></label>
                                        <label>:</label>
                                        <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_b1_umum }}</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM B1U PENINGKATAN</b></label>
                                        <label>:</label>
                                        <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_b1_umum_perpanjang }}</b></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><b>SIM B2 PENINGKATAN</b></label>
                                        <label>:</label>
                                        <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_b2_umum }}</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM B2U PENINGKATAN</b></label>
                                        <label>:</label>
                                        <label><b style="font-size: 14px; font-style:italic;">{{ $sim->data_polres_sim_b2_umum_perpanjang }}</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label><b>DATA RUSAK</b></label>
                                        <label>:</label>
                                        <label><b style="font-size: 14px; font-style:italic;">{{ $sim->rusak }}</b></label>
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
                                <div class="form-group">
                                    <label><b>SIM LING I A</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;"> {{ $simlink->simlink1_a }} </b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM LING I C</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $simlink->simlink1_c }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM LING I RUSAK</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $simlink->simlink1_rusak }}</b></label>
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
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $simlink->simlink2_a }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM LING II C</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $simlink->simlink2_c }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM LING II RUSAK</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $simlink->simlink2_rusak }}</b></label>
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
                                <div class="form-group">
                                    <label><b>BUS MILENIAL A</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $bus->bus_a }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>BUS MILENIAL C</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $bus->bus_c }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>BUS MILENIAL RUSAK</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $bus->bus_rusak }}</b></label>
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
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $sim->gerai_a }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM C</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $sim->gerai_c }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM RUSAK</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $sim->gerai_rusak }}</b></label>
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
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $sim->mpp_a }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM C</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $sim->mpp_c }}</b></label>
                                </div>
                                <div class="form-group">
                                    <label><b>SIM RUSAK</b></label>
                                    <label>:</label>
                                    <label><b style="font-size: 14px; font-style:italic;">{{ $sim->mpp_rusak }}</b></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
