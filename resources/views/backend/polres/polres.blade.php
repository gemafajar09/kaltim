@extends('backend.template.index')

@section('content')
<center>
    <div class="row mb-4">
        <div class="float-left col-md-11">
            <h3 style="color:black"><b>Polres</b></h3>
        </div>
        <div class="float-right col-md-1">
            <button class="btn btn-sm" style="background-color: #019943" onclick="bukaModal()"><i style="color:white" class="icon-plus"></i></button>
        </div>
    </div>
</center>
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-bar-chart"></i>
                <h3>Data Polres</h3>
            </div>
            <div class="widget-content">
            <div style="display:none" id="error" class="alert alert-danger">
                {{session('error')}}
            </div>
            <div style="display:none" id="success" class="alert alert-success">
                {{session('pesan')}}
            </div>
            <div class="widget-content">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Polres</th>
                            <th>Alamat</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $no => $row)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $row->cabang_nama }}</td>
                            <td>{!! $row->cabang_alamat !!}</td>
                            <td style="text-align: center">
                                <a onclick="edit('{{$row->cabang_id}}','{{$row->cabang_nama}}','{{$row->cabang_alamat}}')" class="icon-edit"></a>
                                <a href="{{route('polres-delete', encrypt($row->cabang_id))}}" class="icon-trash"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>


<!-- modal -->
<div class="modal" id="formModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Polres</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('polres-save')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                    <div class="col-md-12">
                        <label><b>Nama</b></label>
                        <input type="hidden" name="cabang_id" id="cabang_id">
                        <input type="hidden" name="cabang_kode" id="cabang_kode" value="1">
                        <input type="text" name="cabang_nama" id="cabang_nama" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Alamat</b></label>
                        <textarea name="cabang_alamat" id="cabang_alamat" cols="30" rows="3" class="form-control"></textarea>
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


<script>
    function bukaModal(){
        $('#formModal').modal('show');
    }
    function edit(id, nama, alamat){
        $('#polres_id').val(id);
        $('#polres_nama').val(nama);
        $('#polres_alamat').val(alamat);
        $('#formModal').modal('show');
    }
</script>
@endsection
