@extends('backend.template.index')

@section('content')
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
                <h3>Grafik SIM A UMUM BARU</h3>
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
                <h3>Grafik SIM B1 BARU</h3>
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
                <h3>Grafik SIM B2 BARU</h3>
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
                <h3>Grafik SIM C BARU</h3>
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
                <h3>Grafik SIM D BARU</h3>
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
</div>

@include('backend.template.chart.chartGrafik')
@endsection
