@extends('backend.template.index')

@section('content')
@if(session('pesan'))
<script>
    alert('<?= session('pesan') ?>')
</script>
@endif
@if(session('error'))
<script>
    alert('<?= session('error') ?>')
</script>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="float-left">
            <button type="button" onclick="cetakcari()" class="btn btn-success btn-sm"><i class="icon-cogs"></i> Option
                Cetak</button>
        </div>
        <div class="float-right">
            @if(session('user_level') == 1)
                <label for="" style="color:white">Filter Data: </label>

                <select name="cabang_id" id="cabang_ids">
                    <option value="0">--Semua Polres--</option>
                    @foreach($polres as $no => $row)
                        <option value="{{ $row->cabang_id }}">{{ $row->cabang_nama }}</option>
                    @endforeach
                </select>
            @else
                <input type="hidden" id="cabang_ids" value="{{ session('cabang_id') }}">
            @endif

            <label for="" style="color:white">Dari:</label>
            <input type="date" id="dari" name="dari" class="from-control">
            <label for="" style="color:white">Sampai</label>
            <input type="date" id="sampai" name="sampai" class="from-control">
            <button type="button" onclick="caridata()" class="btn btn-success btn-sm"><i
                    class="icon-search"></i></button>
        </div>
        <div class="widget py-2">
            <div class="widget-header widget-md">
                <div class="float-left">
                    <i class="icon-bar-chart"></i>
                    <h3 style="color:black">Laporan Polres</h3>
                </div>
            </div>
            <div class="widget-content">
                <div style="display:none" id="error" class="alert alert-danger">
                    {{ session('error') }}
                </div>
                <div style="display:none" id="success" class="alert alert-success">
                    {{ session('pesan') }}
                </div>
                <div id="isi"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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
                                @if($row->cabang_nama != 'Polda Kaltim')
                                    <option value="{{ $row->cabang_id }}">{{ $row->cabang_nama }}</option>
                                @endif
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
                        <button type="button" onclick="cetakexcel()" class="btn btn-success btn-block"><img src="{{ asset('/icon/excel.png') }}" style="width:20px" alt=""></button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

@if(session('validasi'))
    <script>
        $('#error').show();
        setInterval(function () {
            $('#error').hide();
        }, 5000);

    </script>
@endif
@if(session('pesan'))
    <script>
        $('#success').show();
        setInterval(function () {
            $('#success').hide();
        }, 5000);

    </script>
@endif
<div class="modal" id="formModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data polres</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('data-polres-save') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="data_polres_id" id="data_polres_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Tanggal</b></label>
                                <input readonly type="date" value="{{ date('Y-m-d') }}"
                                    name="data_polres_tgl" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_baru"
                                    id="data_polres_sim_a_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A UMUM BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_umum_baru"
                                    id="data_polres_sim_a_umum_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B1 BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b1_baru"
                                    id="data_polres_sim_b1_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B2 BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b2_baru"
                                    id="data_polres_sim_b2_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM C BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_c_baru"
                                    id="data_polres_sim_c_baru" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM D BARU</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_d_baru"
                                    id="data_polres_sim_d_baru" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Polres</b></label>
                                <input type="text" id="nama_cabang" readonly class="form-control" value="">
                                <input type="hidden" value="" readonly class="form-control" name="polres_id"
                                    id="polres_id">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_perpanjang"
                                    id="data_polres_sim_a_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM A UMUM PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_a_umum_perpanjang"
                                    id="data_polres_sim_a_umum_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B1 PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b1_perpanjang"
                                    id="data_polres_sim_b1_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM B2 PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_b2_perpanjang"
                                    id="data_polres_sim_b2_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM C PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_c_perpanjang"
                                    id="data_polres_sim_c_perpanjang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><b>SIM D PERPANJANG</b></label>
                                <input placeholder="0" type="number" name="data_polres_sim_d_perpanjang"
                                    id="data_polres_sim_d_perpanjang" class="form-control">
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

<div class="modal" id="detail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="isidetail"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var c = $('#cabang_ids').val()
        var d = $('#dari').val()
        var s = $('#sampai').val()
        if (d == '') {
            var cabang = c;
            var dari = 0;
            var sampai = 0;
        } else {
            var cabang = c;
            var dari = d;
            var sampai = s;
        }
        $('#isi').load("/datatable/" + cabang + "/" + dari + "/" + sampai)
    })

    function caridata() {
        var cb = $('#cabang_ids').val()
        var d = $('#dari').val()
        var s = $('#sampai').val()
        if (d == '') {
            var cabang = cb;
            var dari = 0;
            var sampai = 0;
        } else {
            var cabang = cb;
            var dari = d;
            var sampai = s;
        }
        $('#isi').load("/datatable/" + cabang + "/" + dari + "/" + sampai)
    }

    function detail(id) {
        $.ajax({
            url: '/api/data-polres-detail',
            type: 'POST',
            data: {
                'id': id,
                "_token": "{{ csrf_token() }}",
            },
            dataType: 'HTML',
            success: function (data) {
                $('#isidetail').html(data)
                $('#detail').modal()
            }
        })
    }

    function cetakexcel() {
        var cx = $('#cabang_ids1').val()
        var bulan = $('#bulans').val()
        var cabang = cx != '' ? cx : 0;
        window.open(`{{ url('exportexcel') }}/` + cabang + "/" + bulan, '_blank');
    }

    function cetaksekarang() {
        var cb = $('#cabang_ids2').val()
        var tgl = $('#tanggals').val()
        window.open(`{{ url('reportharian') }}/` + cb +"/"+tgl);
    }

    function edit(
        id_data,
        polres_id,
        cabang_nama,
        tgl,
        sim_a,
        sim_a_umum,
        sim_b1,
        sim_b2,
        sim_c,
        sim_d,
        sim_ap,
        sim_a_umump,
        sim_b1p,
        sim_b2p,
        sim_cp,
        sim_dp,
    ) {
        $('#data_polres_id').val(id_data);
        $('#nama_cabang').val(cabang_nama);
        $('#polres_id').val(polres_id);
        $('#data_polres_tgl').val(tgl);
        $('#data_polres_sim_a_baru').val(sim_a);
        $('#data_polres_sim_a_umum_baru').val(sim_a_umum);
        $('#data_polres_sim_b1_baru').val(sim_b1);
        $('#data_polres_sim_b2_baru').val(sim_b2);
        $('#data_polres_sim_c_baru').val(sim_c);
        $('#data_polres_sim_d_baru').val(sim_d);
        $('#data_polres_sim_a_perpanjang').val(sim_ap);
        $('#data_polres_sim_a_umum_perpanjang').val(sim_a_umump);
        $('#data_polres_sim_b1_perpanjang').val(sim_b1p);
        $('#data_polres_sim_b2_perpanjang').val(sim_b2p);
        $('#data_polres_sim_c_perpanjang').val(sim_cp);
        $('#data_polres_sim_d_perpanjang').val(sim_dp);
        $('#formModal').modal('show');
    }

    function cetakcari() {
        $('#cetakcari').modal()
    }

</script>

@endsection
