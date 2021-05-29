<nav class="navbar navbar-expand-lg" style="background:transparent; color:white">
    <a class="navbar-brand" href="home">
        <img src="{{asset('/img/korl.png')}}" style="width:10%; color:white" alt="">
        <b style="font-size:25px; color:white">Sistem Laporan SIM Polda Kaltim</b> 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="#" class="nav-link" style="color:white" role="button">
                {{session('user_nama')}}&nbsp;
                <i style="color:white" class="shortcut-icon icon-user"></i>
            </a>
        </li>
        <li class="nav navbar-nav dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i style="color:white" class="icon-cogs"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="" id="ganti_pass">
                    <i class="icon-cogs text-gray-400"></i>
                    Setting
                </a>
                <a class="dropdown-item" href="data-user-logout">
                    <i class="icon-off mr-2 text-gray-400"></i>
                    Log Out
                </a>
            </div>
        </li>
    </ul>
</nav>

<!-- modal -->
<div class="modal" id="formModalGanti" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div style="display:none" id="error" class="alert alert-danger">
            {{session('error')}}
        </div>
        <div style="display:none" id="success" class="alert alert-success">
            {{session('pesan')}}
        </div>
        
        <form action="{{route('data-user-add')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="col-md-12">
                    <label><b>Nama</b></label>
                    <input type="text" name="user_nama" id="user_nama" placeholder="Nama User" class="form-control" value="{{ session()->get('user_nama') }}">
                    <input type="hidden" name="user_id" id="user_id"  value="{{ session()->get('user_id') }}">
                    <input type="hidden" name="cabang_id" id="cabang_id"  value="{{ session()->get('cabang_id') }}">
                    <input type="hidden" name="user_level" id="user_level"  value="{{ session()->get('user_level') }}">
                </div>
                <div class="col-md-12">
                    <label><b>Username</b></label>
                    <input type="text" name="user_username" id="user_username" placeholder="Username" class="form-control" value="{{ session()->get('user_username') }}">
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

<script>
    $('#ganti_pass').click(function (e) { 
        e.preventDefault();
        $('#formModalGanti').modal();
    });
</script>

@if (session('error'))
	<script>
		$('#error').show();
        $('#formModalGanti').modal();
        setInterval(function(){ $('#error').hide(); }, 5000);
	</script>
@endif
@if (session('success'))
	<script>
		$('#success').show();
        $('#formModalGanti').modal();
		setInterval(function(){ $('#success').hide(); }, 5000);
	</script>
@endif
