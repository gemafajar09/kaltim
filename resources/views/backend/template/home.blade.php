@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-6">
        {{--  --}}
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Statistik</h3>
            </div>
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                        <div id="big_stats" class="cf">
                            <div class="stat"> <i style="font-size: 12px">SIM A BARU</i> <span class="value">55</span>
                            </div>
                            <!-- .stat -->

                            <div class="stat"> <i style="font-size: 12px">SIM C BARU</i> <span class="value">85</span>
                            </div>
                            <!-- .stat -->

                            <div class="stat"> <i style="font-size: 12px">SIM A PERPANJANG</i> <span
                                    class="value">90</span> </div>
                            <!-- .stat -->

                            <div class="stat"> <i style="font-size: 12px">SIM C PERPANJANG</i> <span
                                    class="value">115</span> </div>
                            <!-- .stat -->
                        </div>
                    </div>
                    <!-- /widget-content -->

                </div>
            </div>
        </div>
        {{--  --}}
        <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
                <h3>Shortcuts Menu</h3>
            </div>
            <div class="widget-content">
                <div class="shortcuts">
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-list-alt"></i>
                        <span class="shortcut-label">Apps</span>
                    </a>
                    <a href="javascript:;" class="shortcut">
                        <i class="shortcut-icon icon-bookmark"></i>
                        <span class="shortcut-label">Bookmarks</span>
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
        {{--  --}}
    </div>
    {{-- col md 6 --}}
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Grafik</h3>
            </div>
            <div class="widget-content">
                <canvas id="bar-chart" class="chart-holder" width="600px" height="380px"></canvas>
            </div>
        </div>
    </div>
</div>

@include('backend.template.chart.chartHome')
@endsection
