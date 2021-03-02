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
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    BARU
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>SIM A BARU</b></label>
                                        <input type="number" class="form-control" name="data_polres_sim_a_baru" value="{{ $sim->data_polres_sim_a_baru }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM C BARU</b></label>
                                        <input type="number" class="form-control" name="data_polres_sim_c_baru" value="{{ $sim->data_polres_sim_c_baru }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM D BARU</b></label>
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
                                                <label><b>SIM A PERPANJANG</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_a_perpanjang" value="{{ $sim->data_polres_sim_a_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM AU PERPANJANG</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_a_umum_perpanjang" value="{{ $sim->data_polres_sim_a_umum_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM C PERPANJANG</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_c_perpanjang" value="{{ $sim->data_polres_sim_c_perpanjang }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>SIM D PERPANJANG</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_d_perpanjang" value="{{ $sim->data_polres_sim_d_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM B1 PERPANJANG</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_b1_perpanjang" value="{{ $sim->data_polres_sim_b1_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM B1U PERPANJANG</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_b1_umum_perpanjang" value="{{ $sim->data_polres_sim_b1_umum_perpanjang }}">
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><b>SIM B2 PERPANJANG</b></label>
                                                <input type="number" class="form-control" name="data_polres_sim_b2_perpanjang" value="{{ $sim->data_polres_sim_b2_perpanjang }}">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SIM B2U PERPANJANG</b></label>
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
                                            <label><b>SIM AU PENINGKATAN</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_a_umum_baru" value="{{ $sim->data_polres_sim_a_umum_baru }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B1 PENINGKATAN</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_b1_umum" value="{{ $sim->data_polres_sim_b1_umum }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B1U PENINGKATAN</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_b1_umum_perpanjang" value="{{ $sim->data_polres_sim_b1_umum_perpanjang }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>SIM B2 PENINGKATAN</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_b2_umum" value="{{ $sim->data_polres_sim_b2_umum }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B2U PENINGKATAN</b></label>
                                            <input type="number" class="form-control" name="data_polres_sim_b2_umum_perpanjang" value="{{ $sim->data_polres_sim_b2_umum_perpanjang }}">
                                        </div>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <div class="col-md-3 py-2">
                            <div class="card">
                                <div class="card-header">
                                    SIM LING I
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>SIM LING I A</b></label>
                                        <input type="number" class="form-control" name="simlink1_a" value="{{ $simlink->simlink1_a }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I AU</b></label>
                                        <input type="number" class="form-control" name="simlink1_au" value="{{ $simlink->simlink1_au }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I C</b></label>
                                        <input type="number" class="form-control" name="simlink1_c" value="{{ $simlink->simlink1_c }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I D</b></label>
                                        <input type="number" class="form-control" name="simlink1_d" value="{{ $simlink->simlink1_d }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I B1</b></label>
                                        <input type="number" class="form-control" name="simlink1_b1" value="{{ $simlink->simlink1_b1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I B1U</b></label>
                                        <input type="number" class="form-control" name="simlink1_b1u" value="{{ $simlink->simlink1_b1u }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I B2</b></label>
                                        <input type="number" class="form-control" name="simlink1_b2" value="{{ $simlink->simlink1_b2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I B2U</b></label>
                                        <input type="number" class="form-control" name="simlink1_b2u" value="{{ $simlink->simlink1_b2u }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING I RUSAK</b></label>
                                        <input type="number" class="form-control" name="simlink1_rusak" value="{{ $simlink->simlink1_rusak }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 py-2">
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
                                        <label><b>SIM LING II AU</b></label>
                                        <input type="number" class="form-control" name="simlink2_au" value="{{ $simlink->simlink2_au }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING II C</b></label>
                                        <input type="number" class="form-control" name="simlink2_c" value="{{ $simlink->simlink2_c }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING II D</b></label>
                                        <input type="number" class="form-control" name="simlink2_d" value="{{ $simlink->simlink2_d }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING II B1</b></label>
                                        <input type="number" class="form-control" name="simlink2_b1" value="{{ $simlink->simlink2_b1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING II B1U</b></label>
                                        <input type="number" class="form-control" name="simlink2_b1u" value="{{ $simlink->simlink2_b1u }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING II B2</b></label>
                                        <input type="number" class="form-control" name="simlink2_b2" value="{{ $simlink->simlink2_b2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING II B2U</b></label>
                                        <input type="number" class="form-control" name="simlink2_b2u" value="{{ $simlink->simlink2_b2u }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM LING II RUSAK</b></label>
                                        <input type="number" class="form-control" name="simlink2_rusak" value="{{ $simlink->simlink2_rusak }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 py-2">
                            <div class="card">
                                <div class="card-header">
                                    BUS MILENIAL
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL A</b></label>
                                        <input type="number" class="form-control" name="bus_a" value="{{ $bus->bus_a }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL AU</b></label>
                                        <input type="number" class="form-control" name="bus_au" value="{{ $bus->bus_au }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL C</b></label>
                                        <input type="number" class="form-control" name="bus_c" value="{{ $bus->bus_c }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL D</b></label>
                                        <input type="number" class="form-control" name="bus_d" value="{{ $bus->bus_d }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL B1</b></label>
                                        <input type="number" class="form-control" name="bus_b1" value="{{ $bus->bus_b1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL B1U</b></label>
                                        <input type="number" class="form-control" name="bus_b1u" value="{{ $bus->bus_b1u }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL B2</b></label>
                                        <input type="number" class="form-control" name="bus_b2" value="{{ $bus->bus_b2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL B2U</b></label>
                                        <input type="number" class="form-control" name="bus_b2u" value="{{ $bus->bus_b2u }}">
                                    </div>
                                    <div class="form-group">
                                        <label><b>BUS MILENIAL RUSAK</b></label>
                                        <input type="number" class="form-control" name="bus_rusak" value="{{ $bus->bus_rusak }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 py-2">
                            <div class="form-group">
                                <label><b>DATA RUSAK</b></label>
                                <input type="number" class="form-control" name="rusak" value="{{ $sim->rusak }}">
                            </div>
                        </div>
                    
                    <div class="col-md-12 py-3" align="right">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                    </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
