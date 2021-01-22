<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li><a href="{{route('home')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-list-alt"></i><span>Reports</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="report-polres">
                            <i class="icon-file text-gray-400"></i>
                            Report Polres
                        </a>
                        <a class="dropdown-item" href="report-biro">
                            <i class="icon-file text-gray-400"></i>
                            Report Biro
                        </a>
                    </div>
                </li>
                <li><a href="grafik-detail"><i class="icon-bar-chart"></i><span>Grafik</span> </a> </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" id="userDropdown" role="button"
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
                <li><a href="#"><i class="icon-user"></i><span>Polres</span> </a></li>
                <li><a href="biro-partner"><i class="icon-sitemap"></i><span>Biro</span> </a> </li>
            </ul>
        </div>
    </div>
</div>
