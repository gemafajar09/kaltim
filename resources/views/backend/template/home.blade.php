@extends('backend.template.index')

@section('content')

@if(session('user_level') != 3)
<div id="das" class="row">
    {{-- Sim BAru --}}
    <div class="col-md-12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Statistik Pembuatan SIM Baru</h3>
            </div>
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <div id="big_stats" class="cf">
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM A</i> <span class="value"><strong id="ab"></strong></span>
                            </div>
                            <!-- .stat -->

                            <div class="stat"> 
                                <i style="font-size: 12px">SIM C</i> <span class="value"><strong id="cb"></strong></span>
                            </div>
                            <!-- .stat -->

                            <div class="stat"> 
                                <i style="font-size: 12px">SIM D</i> <span class="value"><strong id="db"></strong></span>
                            </div>
                            <!-- .stat -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Statistik Pembuatan SIM Peningkatan</h3>
            </div>
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <div id="big_stats" class="cf">
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM A UMUM</i> <span class="value"><strong id="aub"></strong></span> 
                            </div>

                            <!-- .stat -->
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM B1</i> <span class="value"><strong id="b1b"></strong></span> 
                            </div>
                            
                            <!-- .stat -->
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM B1 UMUM</i> <span class="value"><strong id="b1ub"></strong></span> 
                            </div>

                            <div class="stat"> 
                                <i style="font-size: 12px">SIM B2</i> <span class="value"><strong id="b2b"></strong></span> 
                            </div>
                            <!-- .stat -->

                            <div class="stat"> 
                                <i style="font-size: 12px">SIM B2 UMUM</i> <span class="value"><strong id="b2ub"></strong></span> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Sim Perpanjang --}}
    <div class="col-md-12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Statistik Pembuatan SIM Perpanjang</h3>
            </div>
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <div id="big_stats" class="cf">
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM A</i> <span class="value"><strong id="ap"></strong></span>
                            </div>
                            <!-- .stat -->

                            <div class="stat"> 
                                <i style="font-size: 12px">SIM A UMUM</i> <span class="value"><strong id="aup"></strong></span>
                            </div>

                            <!-- .stat -->
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM C</i> <span class="value"><strong id="cp"></strong></span> 
                            </div>

                            <!-- .stat -->
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM D</i> <span class="value"><strong id="dp"></strong></span> 
                            </div>

                            <!-- .stat -->
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM B1</i> <span class="value"><strong id="b1p"></strong></span>
                            </div>

                            <!-- .stat -->
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM B1 UMUM</i> <span class="value"><strong id="b1up"></strong></span>
                            </div>

                            <!-- .stat -->
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM B2</i> <span class="value"><strong id="b2p"></strong></span> 
                            </div>

                            <!-- .stat -->
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM B2 UMUM</i> <span class="value"><strong id="b2up"></strong></span> 
                            </div>

                        </div>
                    </div>
                    <!-- /widget-content -->

                </div>
            </div>
        </div>
    </div>

    {{-- col md 12 --}}
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik Pengurusan SIM Baru Periode {{date('Y')}}</h3>
            </div>
            <div class="widget-content">
                <canvas id="sim-data-baru" class="chart-holder" width="1100px" height="380px"></canvas>
            </div>
        </div>
    </div>

    {{-- col md 12 --}}
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik Pengurusan SIM Perpanjang Periode {{date('Y')}}</h3>
            </div>
            <div class="widget-content">
                <canvas id="sim-data-perpanjang" class="chart-holder" width="1100px" height="380px"></canvas>
            </div>
        </div>
    </div>

    {{-- col md 12 --}}
    {{-- <div class="col-md-12">
        <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
                <h3>Shortcuts Menu</h3>
            </div>
            <div class="widget-content">
                <div class="shortcuts">
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-list-alt"></i>
                        <span class="shortcut-label">Reports</span>
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-bar-chart"></i>
                        <span class="shortcut-label">Grafik</span>
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-signal"></i>
                        <span class="shortcut-label">Reports</span>
                    </a><a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-comment"></i>
                        <span class="shortcut-label">Comments</span>
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-user"></i>
                        <span class="shortcut-label">Users</span>
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-file"></i>
                        <span class="shortcut-label">Notes</span>
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-picture"></i>
                        <span class="shortcut-label">Photos</span>
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-tag"></i>
                        <span class="shortcut-label">Tags</span>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@include('backend.template.chart.chartHome')

@else
<div id="das" class="row">
    {{-- Sim Baru --}}
    <div class="col-md-12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Statistik Pembuatan SIM Baru</h3>
            </div>
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <div id="big_stats" class="cf">
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM A</i> <span class="value"><strong id="ab"></strong></span>
                            </div>
                            <!-- .stat -->

                            <div class="stat"> 
                                <i style="font-size: 12px">SIM C</i> <span class="value"><strong id="cb"></strong></span>
                            </div>
                            <!-- .stat -->

                            <div class="stat"> 
                                <i style="font-size: 12px">SIM AC</i> <span class="value"><strong id="acb"></strong></span>
                            </div>
                            <!-- .stat -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sim Perpanjang --}}
    <div class="col-md-12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Statistik Pembuatan SIM Perpanjang</h3>
            </div>
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <div id="big_stats" class="cf">
                            <div class="stat"> 
                                <i style="font-size: 12px">SIM A</i> <span class="value"><strong id="abp"></strong></span>
                            </div>
                            <!-- .stat -->

                            <div class="stat"> 
                                <i style="font-size: 12px">SIM C</i> <span class="value"><strong id="cbp"></strong></span>
                            </div>
                            <!-- .stat -->

                            <div class="stat"> 
                                <i style="font-size: 12px">SIM AC</i> <span class="value"><strong id="acbp"></strong></span>
                            </div>
                            <!-- .stat -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- col md 12 --}}
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik Pengurusan SIM Baru Periode {{date('Y')}}</h3>
            </div>
            <div class="widget-content">
                <canvas id="sim-data-baru" class="chart-holder" width="1100px" height="380px"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik Pengurusan SIM Baru Perpanjang Periode {{date('Y')}}</h3>
            </div>
            <div class="widget-content">
                <canvas id="sim-data-perpanjang" class="chart-holder" width="1100px" height="380px"></canvas>
            </div>
        </div>
    </div>

</div>

@include('backend.template.chart.chartHomeBiro')

@endif

@endsection
