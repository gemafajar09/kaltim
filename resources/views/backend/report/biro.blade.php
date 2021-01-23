@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Laporan Biro</h3>
            </div>
            <div class="widget-content">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Biro</th>
                            <th>SIM A BARU</th>
                            <th>SIM A PERPANJANG</th>
                            <th>SIM C BARU</th>
                            <th>SIM C PERPANJANG</th>
                            <th>Surat Pengantar Dari Biro</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{date('d-m-Y')}}</td>
                            <td>Arka Trans Psikologi</td>
                            <td style="text-align: center">12</td>
                            <td style="text-align: center">40</td>
                            <td style="text-align: center">35</td>
                            <td style="text-align: center">80</td>
                            <td style="text-align: center">24</td>
                            <td style="text-align: center">
                                <a class="icon-edit"></a>
                                <a class="icon-trash"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
