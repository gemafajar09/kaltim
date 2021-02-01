@extends('backend.template.index')

@section('content')
<center>
    <div class="row mb-4">
        <div class="float-left col-md-11">
            <h3><b>Data User</b></h3>
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
                <h3>Data User</h3>
            </div>
            <div class="widget-content">
            <div style="display:none" id="error" class="alert alert-danger">
                {{session('error')}}
            </div>
            <div style="display:none" id="success" class="alert alert-success">
                {{session('pesan')}}
            </div>
            <div class="widget-content table-responsive">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Cabang</th>
                            <th>Level</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $i => $user)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$user->user_nama}}</td>
                            <td>{{$user->user_username}}</td>
                            <td>{{substr($user->user_ulangi_password,0,15)}}</td>
                            <td>{{$user->cabang_nama}}</td>
                            <td>
                                @if($user->user_level == 1)
                                Kapolda
                                @elseif($user->user_level == 2)
                                Humas
                                @elseif($user->user_level == 3)
                                Biro
                                @endif
                            </td>
                            <td style="text-align: center">
                                <a onclick="edit()" class="icon-edit"></a>
                                <a href="" class="icon-trash"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!-- modal -->
<div class="modal" id="formModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Akun User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('data-user-add')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                    <div class="col-md-12">
                        <label><b>Nama</b></label>
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="text" name="user_nama" id="user_nama" placeholder="Nama User" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Cabang</b></label>
                        <select name="cabang_id" id="cabang_id" class="form-control">
                            <option value="">-SELECT-</option>
                            @foreach($cabang as $a)
                            <option value="{{$a->cabang_id}}">{!! $a->cabang_nama !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label><b>Level</b></label>
                        <select name="user_level" id="user_level" class="form-control">
                            <option value="">-SELECT-</option>
                            <option value="1">Kapolda</option>
                            <option value="2">Humas</option>
                            <option value="3">Biro</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label><b>Username</b></label>
                        <input type="text" name="user_username" id="user_username" placeholder="Username" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Password</b></label>
                        <input type="password" name="user_password" id="user_password" placeholder="Password" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label><b>Ulangi Password</b></label>
                        <input type="password" name="user_ulangi_password" id="user_ulangi_password" placeholder="password" class="form-control">
                    </div>
                    <div align="right" class="col-md-12 py-1">
                        <button type="reset" class="btn btn-outline-info">Reset</button>
                        <button type="submit" class="btn btn-outline-success">Save</button>
                    </div>
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
        $('#formModal').modal();
    }
    function edit(){
        $('#formModal').modal();
    }
</script>
@endsection
