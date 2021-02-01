@extends('backend.template.index')

@section('content')
<div class="row" style="margin-bottom:10%">
    <div class="col-md-8">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Data Biro</h3>
            </div>
            <div class="widget-content" id="jam_buka" style="display: block;">
                <div style="display:none" id="error" class="alert alert-danger">
                    {{session('error')}}
                </div>
                <div style="display:none" id="success" class="alert alert-success">
                    {{session('pesan')}}
                </div>
                <form action="{{ route('data-biro-save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="data_biro_id" id="data_biro_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Tanggal</b></label>
                                <input readonly type="date" value="{{date('Y-m-d')}}" name="data_biro_tgl"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A BARU</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_a_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A UMUM BARU</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_a_umum_baru"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B1 BARU</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_b1_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B2 BARU</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_b2_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM C BARU</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_c_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM D BARU</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_d_baru" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Biro</b></label>
                                @php
                                $biro = DB::table('tb_cabang')->where('cabang_id',session('cabang_id'))->first();
                                @endphp
                                <input type="text" readonly class="form-control" value="{{$biro->cabang_nama}}">
                                <input type="hidden" value="{{session('cabang_id')}}" readonly class="form-control"
                                    name="biro_id" id="biro_id">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_a_perpanjang"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A UMUM PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_a_umum_perpanjang"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B1 PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_b1_perpanjang"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B2 PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_b2_perpanjang"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM C PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_c_perpanjang"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM D PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_biro_sim_d_perpanjang"
                                    class="form-control">
                            </div>
                        </div>
                    </div>

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
        setInterval(function () {
            $('#error').hide();
        }, 5000);

    </script>
    @endif
    @if (session('pesan'))
    <script>
        $('#success').show();
        setInterval(function () {
            $('#success').hide();
        }, 5000);

    </script>
    @endif

    @include('backend.template.component.calender')
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
        // tutup input jam 5 sore
        if(this.hours == 17 && this.minutes == 00 && this.seconds == 0){
            $('#jam_buka').css('display', 'none');
            $('#jam_tutup').css('display', 'block');
        }
        // buka aplikasi jam 8 pagi
        else if(this.hours == 8 && this.minutes == 00 && this.seconds == 0){
            $('#jam_buka').css('display', 'block');
            $('#jam_tutup').css('display', 'none');
        }
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
