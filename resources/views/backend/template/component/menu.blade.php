<div class="subnavbar">
    <div class="subnavbar-inner"  style="background-color: transparent;">
        <div class="container">
            <!-- jika polres -->
            @if( Session::get('user_level') == 1)
            <ul class="mainnav">
                <li><a style="color:white" href="{{route('home')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" style="color:white" class="dropdown-toggle" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-list-alt"></i><span>Reports</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="report-polres">
                            <i class="icon-file text-gray-400"></i>
                            Report Polres
                        </a>
                        <a class="dropdown-item" href="data-polres-biro">
                            <i class="icon-file text-gray-400"></i>
                            Report polres Biro
                        </a>
                        <a class="dropdown-item" href="report-biro">
                            <i class="icon-file text-gray-400"></i>
                            Report Biro
                        </a>
                    </div>
                </li>
                <li><a style="color:white" href="grafik-detail"><i class="icon-bar-chart"></i><span>Grafik</span> </a> </li>
                <li class="dropdown">
                    <a style="color:white" href="javascript:;" class="dropdown-toggle" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-location-arrow"></i><span>Input</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('data-polres')}}">
                            <i class="icon-file text-gray-400"></i>
                            Data Polres
                        </a>
                        <a class="dropdown-item" href="{{route('data-biro')}}">
                            <i class="icon-file text-gray-400"></i>
                            Data Biro
                        </a>
                    </div>
                </li>
                <li><a style="color:white" href="{{ route('polres') }}"><i class="icon-user"></i><span>Polres</span> </a></li>
                <li><a style="color:white" href="biro-partner"><i class="icon-sitemap"></i><span>Biro</span> </a> </li>
                <li><a style="color:white" href="data-user"><i class="icon-user"></i><span>User</span> </a> </li>
            </ul>
            <!-- jika humas -->
            @elseif(Session::get('user_level') == 2)
            <ul class="mainnav">
                <li><a style="color:white" href="{{route('home')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" style="color:white" class="dropdown-toggle" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-list-alt"></i><span>Reports</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="report-polres">
                            <i class="icon-file text-gray-400"></i>
                            Report Polres
                        </a>
                        <a class="dropdown-item" href="data-polres-biro">
                            <i class="icon-file text-gray-400"></i>
                            Report Polres Biro
                        </a>
                    </div>
                </li>
                <li><a style="color:white" href="grafik-detail"><i class="icon-bar-chart"></i><span>Grafik</span> </a> </li>
                <li class="dropdown">
                    <a style="color:white" href="javascript:;" class="dropdown-toggle" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-location-arrow"></i><span>Input</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('data-polres')}}">
                            <i class="icon-file text-gray-400"></i>
                            Data Polres
                        </a>
                    </div>
                </li>
            </ul>
            @elseif(Session::get('user_level') == 3 || Session::get('user_level') == 4)
            <ul class="mainnav">
                <li><a style="color:white" href="{{route('home')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" style="color:white" class="dropdown-toggle" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-list-alt"></i><span>Reports</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="report-biro">
                            <i class="icon-file text-gray-400"></i>
                            Report Biro
                        </a>
                    </div>
                </li>
                <li><a style="color:white" href="grafik-detail"><i class="icon-bar-chart"></i><span>Grafik</span> </a> </li>
                <li class="dropdown">
                    <a style="color:white" href="javascript:;" class="dropdown-toggle" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-location-arrow"></i><span>Input</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        @if(session('user_level') == 3)
                        <a class="dropdown-item" href="{{route('data-biro')}}">
                            <i class="icon-file text-gray-400"></i>
                            Data Biro
                        </a>
                        @elseif(session('user_level') == 4)
                            <a class="dropdown-item" href="{{route('data-biro-input')}}">
                                <i class="icon-file text-gray-400"></i>
                                Data Biro
                            </a>
                        @endif
                    </div>
                </li>
                @if(session('user_level') == 3)
                <li><a style="color:white" href="data-biro-cabang"><i class="icon-sitemap"></i><span>Cabang</span> </a> </li>
                <li><a style="color:white" href="data-akun-cabang"><i class="icon-user"></i><span>Tambah Akun</span> </a> </li>
                @endif
            </ul>
            @endif
        </div>
    </div>
</div>
