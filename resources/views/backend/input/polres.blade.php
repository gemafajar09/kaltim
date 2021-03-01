@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-12" style="margin-bottom:10%">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3 style="color:black">Data Polres</h3>
            </div>
            <div class="widget-content" id="jam_buka" style="display: block;">
                <div style="display:none" id="error" class="alert alert-danger">
                    {{session('error')}}
                </div>
                <div style="display:none" id="success" class="alert alert-success">
                    {{session('pesan')}}
                </div>
                <form action="{{ route('data-polres-save') }}" method="POST" style="font-size:10px">
                    @csrf
                    <input type="hidden" name="data_polres_id" id="data_polres_id">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><b>Tanggal</b></label>
                            <input readonly type="date" value="{{date('Y-m-d')}}" name="data_polres_tgl" class="form-control">
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
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                BARU
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><b>SIM A BARU</b></label>
                                    <input placeholder="0" type="number" name="data_polres_sim_a_baru" class="form-control">
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
                                            <input placeholder="0" type="number" name="data_polres_sim_a_perpanjang" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM AU PERPANJANG</b></label>
                                            <input placeholder="0" type="number" name="data_polres_sim_a_umum_perpanjang" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM C PERPANJANG</b></label>
                                            <input placeholder="0" type="number" name="data_polres_sim_c_perpanjang" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><b>SIM D PERPANJANG</b></label>
                                            <input placeholder="0" type="number" name="data_polres_sim_d_perpanjang" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B1 PERPANJANG</b></label>
                                            <input placeholder="0" type="number" name="data_polres_sim_b1_perpanjang" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B1U PERPANJANG</b></label>
                                            <input placeholder="0" type="number" name="data_polres_sim_b1_umum_perpanjang" class="form-control">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><b>SIM B2 PERPANJANG</b></label>
                                            <input placeholder="0" type="number" name="data_polres_sim_b2_perpanjang" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><b>SIM B2U PERPANJANG</b></label>
                                            <input placeholder="0" type="number" name="data_polres_sim_b2_umum_perpanjang" class="form-control">
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
                                        <input placeholder="0" type="number" name="data_polres_sim_a_umum_baru" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM B1 PENINGKATAN</b></label>
                                        <input placeholder="0" type="number" name="data_polres_sim_b1_baru" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label><b>SIM B1U PENINGKATAN</b></label>
                                        <input placeholder="0" type="number" name="data_polres_sim_b1_umum" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><b>SIM B2 PENINGKATAN</b></label>
                                        <input placeholder="0" type="number" name="data_polres_sim_b2_baru" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><b>SIM B2U PENINGKATAN</b></label>
                                        <input placeholder="0" type="number" name="data_polres_sim_b2_umum" class="form-control">
                                    </div>
                                </div>
                            </div>
                                
                            </div>
                        </div>
                    </div>     
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><b>SIM LINK I A</b></label>
                            <input placeholder="0" type="number" name="simlink1a" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM LINK I AU</b></label>
                            <input placeholder="0" type="number" name="simlink1au" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM LINK I C</b></label>
                            <input placeholder="0" type="number" name="simlink1c" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM LINK I D</b></label>
                            <input placeholder="0" type="number" name="simlink1d" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>RUSAK</b></label>
                            <input placeholder="0" type="number" name="simlink1rusak" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><b>SIM LINK II A</b></label>
                            <input placeholder="0" type="number" name="simlink2a" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM LINK II AU</b></label>
                            <input placeholder="0" type="number" name="simlink2au" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM LINK II C</b></label>
                            <input placeholder="0" type="number" name="simlink2c" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM LINK II D</b></label>
                            <input placeholder="0" type="number" name="simlink2d" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>RUSAK</b></label>
                            <input placeholder="0" type="number" name="simlink2rusak" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><b>BUS MILENIAL A</b></label>
                            <input placeholder="0" type="number" name="simlinka" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>BUS MILENIAL AU</b></label>
                            <input placeholder="0" type="number" name="simlinkau" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>BUS MILENIAL C</b></label>
                            <input placeholder="0" type="number" name="simlinkc" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>BUS MILENIAL D</b></label>
                            <input placeholder="0" type="number" name="simlinkd" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>RUSAK</b></label>
                            <input placeholder="0" type="number" name="busmilenialrusak" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><b>DATA RUSAK</b></label>
                            <input placeholder="0" type="number" name="rusak" class="form-control">
                        </div>
                    </div>
                        <!-- databiro -->
                        <?php $biros = DB::table('tb_cabang')->where('cabang_kode',2)->get(); ?>
                        @foreach($biros as $br)
                        <div class="col-md-3 py-2">
                            <div class="card">
                                <div class="card-header" style="font-size:12px">
                                    {{$br->cabang_nama}}
                                    <input type="hidden" name="id_biro[]" value="{{$br->cabang_id}}">
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><b>SURAT KETERANGAN PSIKOLOGI SIM A</b></label>
                                                <input placeholder="0" type="number" name="data_biro_sim_a_baru[]" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SURAT KETERANGAN PSIKOLOGI SIM C</b></label>
                                                <input placeholder="0" type="number" name="data_biro_sim_c_baru[]" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label><b>SURAT KETERANGAN PSIKOLOGI SIM A DAN C</b></label>
                                                <input placeholder="0" type="number" name="data_biro_sim_ac_baru[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                    
                    <div class="col-md-12 py-3" align="right">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                    </div>
                </form>
            </div>
            <div class="widget-content" id="jam_tutup" style="display: none;">
                <h1>Opps..</h1>
                <h3>Batas Penginputan Data Biro Sudah Lewat</h3>
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
    <!-- @include('backend.template.component.calender') -->
</div>
<script>
    function my_Clock() {
        this.cur_date = new Date();
        this.hours = this.cur_date.getHours();
        this.minutes = this.cur_date.getMinutes();
        this.seconds = this.cur_date.getSeconds();
    }

    my_Clock.prototype.run = function () {
        setInterval(this.update.bind(this), 1000);
    };

    my_Clock.prototype.update = function () {
        this.updateTime(1);
        // buka aplikasi jam 8 pagi
        if(this.hours >= 8 && this.hours <= 16 ){
            // console.log('buka');
            if(this.hours <= 16 && this.minutes <= 59){
                // console.log('buka1');
                $('#jam_buka').css('display', 'block');
                $('#jam_tutup').css('display', 'none');
            }else{
                // console.log('tutup');
                $('#jam_buka').css('display', 'none');
                $('#jam_tutup').css('display', 'block');
            }
        }else{
            // console.log('tutup1');
            $('#jam_buka').css('display', 'none');
            $('#jam_tutup').css('display', 'block');
        }
        // console.log(this.hours + ":" + this.minutes + ":" + this.seconds);
    };
    my_Clock.prototype.updateTime = function (secs) {
        this.seconds += secs;
        if (this.seconds >= 60) {
            this.minutes++;
            this.seconds = 0;
        }
        if (this.minutes >= 60) {
            this.hours++;
            this.minutes = 0;
        }
        if (this.hours >= 24) {
            this.hours = 0;
        }
    };
    var clock = new my_Clock();
    clock.run();
    
</script>
@endsection
