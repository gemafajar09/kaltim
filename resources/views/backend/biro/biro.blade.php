@extends('backend.template.index')

@section('content')
<center>
    <div class="row mb-4">
        <div class="float-left col-md-11">
            <h3><b>Biro Partner</b></h3>
        </div>
        <div class="float-right col-md-1">
            <button class="btn btn-sm" style="background-color: #019943" onclick="bukaModal()"><i style="color:white" class="icon-plus"></i></button>
        </div>
    </div>
</center>
<div class="row">
    @foreach($data as $no => $row)
        <div class="col-md-4">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <img src="{{asset('biro/'. $row->biro_foto)}}" style="width:100%" alt="">
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="col-md-12 py-3">
    <div class="widget">
        <div class="widget-header">
            <i class="icon-bar-chart"></i>
            <h3>Biro Partner</h3>
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
                    <tr>
                        <th>No</th>
                        <th>Nama Biro</th>
                        <th>Alamat</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $no => $row)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $row->biro_nama }}</td>
                        <td>{{ $row->biro_alamat }}</td>
                        <td style="text-align: center">
                            <a onclick="edit('{{$row->biro_id}}','{{$row->biro_nama}}','{{$row->biro_alamat}}')" class="icon-edit"></a>
                            <a href="{{route('biro-partner-delete', encrypt($row->biro_id))}}" class="icon-trash"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>


<!-- modal -->
<div class="modal" id="formModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Biro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('biro-partner-save')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                    <div class="col-md-12">
                        <label><b>Nama</b></label>
                        <input type="hidden" name="biro_id" id="biro_id">
                        <input type="text" name="biro_nama" id="biro_nama" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Alamat</b></label>
                        <textarea name="biro_alamat" id="biro_alamat" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label><b>File</b></label>
                        <input type="file" name="biro_foto" id="biro_foto" class="form-control">
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
        $('#biro_id').val(id);
        $('#biro_nama').val(nama);
        $('#biro_alamat').val(alamat);
        $('#formModal').modal('show');
    }
</script>
@endsection
