@extends('backend.template.index')

@section('content')
@if(session('user_level') != 3)
<div class="row">
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM A BARU</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM C</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM D</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM A UMUM PENINGKATAN</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM B1 PENINGKATAN</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM B1 UMUM PENINGKATAN</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM B2 PENINGKATAN</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM B2 UMUM PENINGKATAN</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>

    {{-- sim perpanjang --}}

    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM A PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM A UMUM PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM C PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM D PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM B1 PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM B1 UMUM PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM B2 PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM B2 UMUM PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>

    <!-- simling -->
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIMLING A</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIMLING C</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    <!-- sim bus -->
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik Bus Milenial A</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik Bus Milenial C</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    <!-- garai -->
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik Gerai SIM A</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>

    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik Gerai SIM C</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>

    {{-- biro --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SURAT PENGANTAR PSIKOLOGI A</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SURAT PENGANTAR PSIKOLOGI C</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SURAT PENGANTAR PSIKOLOGI A DAN C</h3>
            </div>
            <div class="widget-content">
                <canvas class="barchart" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM A BARU</h3>
            </div>
            <div class="widget-content">
                <canvas class="birogrf" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM C BARU</h3>
            </div>
            <div class="widget-content">
                <canvas class="birogrf" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM A & C BARU</h3>
            </div>
            <div class="widget-content">
                <canvas class="birogrf" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM A PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="birogrf" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM C PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="birogrf" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik SIM A & C PERPANJANG</h3>
            </div>
            <div class="widget-content">
                <canvas class="birogrf" class="chart-holder" width="600px" height="300px"></canvas>
            </div>
        </div>
    </div>
</div>
@endif
@include('backend.template.chart.chartGrafik')
@endsection
