@extends('backend.template.index')

@section('content')
<center>
    <div class="row mb-4">
        <div class="float-left col-md-11">
            <h3><b>Polres</b></h3>
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
                            <th>Logo</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $no => $row)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $row->polres_nama }}</td>
                            <td>{{ $row->polres_alamat }}</td>
                            <td><img src="{{asset('polres/'. $row->polres_foto)}}" alt="" style="width: 100px; height: 100px;"></td>
                            <td style="text-align: center">
                                <a onclick="edit('{{$row->polres_id}}','{{$row->polres_nama}}','{{$row->polres_alamat}}')" class="icon-edit"></a>
                                <a href="{{route('polres-delete', encrypt($row->polres_id))}}" class="icon-trash"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-body">
                <h4 class="text-center">Kalimantan Timur</h4>
                <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo laudantium repellendus, eius impedit provident voluptatibus inventore? Voluptate enim nesciunt veritatis neque autem aliquam eius explicabo ad illum modi. Labore, dolorum.</h6>
            </div>
        </div>
    </div> --}}
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
                        <input type="hidden" name="polres_id" id="polres_id">
                        <input type="text" name="polres_nama" id="polres_nama" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Alamat</b></label>
                        <textarea name="polres_alamat" id="polres_alamat" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label><b>File</b></label>
                        <input type="file" name="polres_foto" id="polres_foto" class="form-control">
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
