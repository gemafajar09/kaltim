@extends('backend.template.index')

@section('content')
<div class="row" style="margin-bottom:10%">
    <div class="col-md-8">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Data Biro</h3>
            </div>
            <div class="widget-content">
                <form action="">
                    <div class="col-md-12">
                        <label><b>Tanggal</b></label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Biro</b></label>
                        <select name="polres" id="polres" class="form-control select2">
                            <option value="">-Pilih-</option>
                            <option value="">Arka Trans Psikologi</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM A Baru</b></label>
                        <input type="number" name="tanggal" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM A Perpanjang</b></label>
                        <input type="number" name="tanggal" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM C Baru</b></label>
                        <input type="number" name="tanggal" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>SIM C Perpanjang</b></label>
                        <input type="number" name="tanggal" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Surat Pengantar</b></label>
                        <input type="number" name="tanggal" class="form-control">
                    </div>
                    <div class="col-md-12 py-3" align="right">
                        <button type="button" class="btn btn-outline-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('backend.template.component.calender')
</div>

@endsection
