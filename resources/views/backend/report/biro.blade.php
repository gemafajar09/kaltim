@extends('backend.template.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="float-left">
            <!-- <label for="" style="color:white">Print to:</label>
            <button type="button" onclick="cetakexcel()" class="btn btn-success"><img src="{{asset('/icon/excel.png')}}" style="width:20px" alt=""></button> -->
            <button type="button" onclick="cetakcari()" class="btn btn-success btn-sm"><i class="icon-cogs"></i> Option
                Cetak</button>
        </div>
        <div class="float-right">
            @if(session('user_level') == 1)
            <label for="" style="color:white">Filter Data: </label>
            
                <select name="cabang_id" id="cabang_ids">
                    <option value="0">--Semua Biro--</option>
                    @foreach($biro as $no => $row)
                    <option value="{{ $row->cabang_id }}">{{ $row->cabang_nama }}</option>
                    @endforeach
                </select>
            @else
            <input type="hidden" id="cabang_ids" value="{{session('cabang_id')}}">
            @endif

            <label for="" style="color:white">Dari:</label>
            <input type="date" id="dari" name="dari" class="from-control">
            <label for="" style="color:white">Sampai</label>
            <input type="date" id="sampai" name="sampai" class="from-control">
            <button type="button" onclick="caridata()" class="btn btn-success btn-sm"><i class="icon-search"></i></button>
        </div>
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3 style="color:black">Laporan Biro</h3>
            </div>
            <div class="widget-content">
                <div style="display:none" id="error" class="alert alert-danger">
                    {{session('error')}}
                </div>
                <div style="display:none" id="success" class="alert alert-success">
                    {{session('pesan')}}
                </div>
                <table id="table" class="table table-striped">
                    <thead>
                        <tr style="font-size:10px">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Biro</th>
                            <th>SIM A BARU</th>
                            <th>SIM C BARU</th>
                            <th>SIM A & C BARU</th>
                            <th>SIM A PERPANJANG</th>
                            <th>SIM C PERPANJANG</th>
                            <th>SIM A & C PERPANJANG</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="isi"></tbody>
                </table>
            </div>
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
<div class="modal" id="formModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title">Edit Biro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('data-biro-save') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <input type="hidden" name="data_biro_id" id="data_biro_id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><b>Tanggal</b></label>
                            <input readonly type="date" value="{{date('Y-m-d')}}" name="data_biro_tgl" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM A BARU</b></label>
                            <input placeholder="0" type="number" name="data_biro_sim_a_baru" id="data_biro_sim_a_baru" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM C BARU</b></label>
                            <input placeholder="0" type="number" name="data_biro_sim_c_baru" id="data_biro_sim_c_baru" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM A & C BARU</b></label>
                            <input placeholder="0" type="number" name="data_biro_sim_ac_baru" id="data_biro_sim_d_baru" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><b>Biro</b></label>
                            <input type="text" readonly class="form-control" id="cabang_nama">
                            <input type="hidden" readonly class="form-control" name="biro_id" id="biro_id">
                        </div>
                        <div class="form-group">
                            <label><b>SIM A PERPANJANG</b></label>
                            <input placeholder="0" type="number" name="data_biro_sim_a_perpanjang" id="data_biro_sim_a_perpanjang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM C PERPANJANG</b></label>
                            <input placeholder="0" type="number" name="data_biro_sim_c_perpanjang" id="data_biro_sim_c_perpanjang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>SIM A & C PERPANJANG</b></label>
                            <input placeholder="0" type="number" name="data_biro_sim_ac_perpanjang" id="data_biro_sim_d_perpanjang" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm" style="background-color: #019943">Save</button>
                <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Modal Cetak -->
<div id="cetakcari" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <h6>Cetak Harian</h6><br>
                        @if(session('user_level') == 1)
                            <select name="cabang_id" id="cabang_ids2" class="form-control">
                                <option value="0">--Semua Satpas--</option>
                                @foreach($polres as $no => $row)
                                    <option value="{{ $row->cabang_id }}">{{ $row->cabang_nama }}</option>
                                @endforeach
                            </select>
                            <br>
                        @else
                            <input type="hidden" id="cabang_ids2" value="{{ session('cabang_id') }}">
                        @endif
                        <div class="form-group">
                            <input type="date" name="tanggal" value="{{date('Y-m-d')}}" id="tanggals" class="form-control">
                        </div>
                        <button type="button" onclick="cetaksekarang()" class="btn btn-block" style=""><img src="{{ asset('/icon/excel.png') }}" style="width:20px" alt=""></button>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <h6>Cetak Bulanan</h6><br>
                        @if(session('user_level') == 1)
                            <select name="cabang_id" id="cabang_ids1" class="form-control">
                                <option value="0">--Semua Satpas--</option>
                                @foreach($polres as $no => $row)
                                    <option value="{{ $row->cabang_id }}">{{ $row->cabang_nama }}</option>
                                @endforeach
                            </select>
                            <br>
                        @else
                            <input type="hidden" id="cabang_ids1" value="{{ session('cabang_id') }}">
                        @endif
                        <div class="form-group">
                        <!-- <select name="bulan" id="bulans" class="form-control">
                            <option value="0">--Pilih Bulan--</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select> -->
                        <input type="month" id="bulans" class="form-control">
                        </div>
                        <button type="button" onclick="cetakexcelbulanan()" class="btn btn-success btn-block"><img src="{{ asset('/icon/excel.png') }}" style="width:20px" alt=""></button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function(){
        var c = $('#cabang_ids').val()
        var d = $('#dari').val()
        var s = $('#sampai').val()
        if(d == '')
        {
            var cabang = c;
            var dari = 0;
            var sampai = 0;
        }else{
            var cabang = c;
            var dari = d;
            var sampai = s;
        }
        $('#isi').load("/report-biro-data/"+ cabang +"/"+ dari +"/"+ sampai)
    })

    function caridata()
    {
        var cb = $('#cabang_ids').val()
        var d = $('#dari').val()
        var s = $('#sampai').val()
        if(d == '')
        {
            var cabang = cb;
            var dari = 0;
            var sampai = 0;
        }else{
            var cabang = cb;
            var dari = d;
            var sampai = s;
        }
        $('#isi').load("/report-biro-data/"+ cabang +"/"+ dari +"/"+ sampai)
    }

    function cetakexcel()
    {
        var cx = $('#cabang_ids').val()
        var d = $('#dari').val()
        var s = $('#sampai').val()
        if(d == '')
        {
            var cabang = cx != '' ? cx : 0;
            var dari = 0;
            var sampai = 0;
        }else{
            var cabang = cx;
            var dari = d;
            var sampai = s;
        }
        window.open(`{{ url('exportexcelbiro') }}/`+ cabang +"/"+ dari +"/"+ sampai, '_blank');
    }

    function edit(data_biro_id,cabang_nama, biro_id, data_biro_tgl,data_biro_sim_a_baru,data_biro_sim_c_baru,data_biro_sim_ac_baru,data_biro_sim_a_perpanjang,data_biro_sim_c_perpanjang,data_biro_sim_ac_perpanjang){
        $('#data_biro_id').val(data_biro_id);
        $('#cabang_nama').val(cabang_nama);
        $('#biro_id').val(biro_id);
        $('#data_biro_tgl').val(data_biro_tgl);
        $('#data_biro_sim_a_baru').val(data_biro_sim_a_baru);
        $('#data_biro_sim_c_baru').val(data_biro_sim_c_baru);
        $('#data_biro_sim_ac_baru').val(data_biro_sim_ac_baru);
        $('#data_biro_sim_a_perpanjang').val(data_biro_sim_a_perpanjang);
        $('#data_biro_sim_c_perpanjang').val(data_biro_sim_c_perpanjang);
        $('#data_biro_sim_ac_perpanjang').val(data_biro_sim_ac_perpanjang);
        $('#formModal').modal('show');
    }


    function cetaksekarang() {
        var cb = $('#cabang_ids2').val()
        var tgl = $('#tanggals').val()
        window.open(`{{ url('reportharianbiro') }}/` + cb +"/"+tgl);
    }

    function cetakexcelbulanan() { 
        var cx = $('#cabang_ids1').val()
        var bulan = $('#bulans').val()
        var cabang = cx != '' ? cx : 0;
        window.open(`{{ url('reportbulananbiro') }}/` + cabang + "/" + bulan, '_blank');
    }

    function cetakcari() {
        $('#cetakcari').modal()
    }

</script>

@endsection
