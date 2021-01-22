@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Data Polres</h3>
            </div>
            <div class="widget-content">
                <form action="">
                    <div class="col-md-12">
                        <label><b>Tanggal</b></label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Polres</b></label>
                        <select name="polres" id="polres" class="form-control select2">
                            <option value="">-Pilih-</option>
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
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
