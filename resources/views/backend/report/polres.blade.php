@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Laporan Polres</h3>
            </div>
            <div class="widget-content">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Polres</th>
                            <th>SIM A BARU</th>
                            <th>SIM A PERPANJANG</th>
                            <th>SIM C BARU</th>
                            <th>SIM C PERPANJANG</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
