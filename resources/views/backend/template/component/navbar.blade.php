<nav class="navbar navbar-expand-lg" style="background-image: url('/img/back/homeds.svg'); color:white">
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


