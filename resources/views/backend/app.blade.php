<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboarde</title>
    <link href="{{asset('assets/vendor/fontawesome/css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/fontawesome/css/solid.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/fontawesome/css/brands.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/master.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/flagiconcss/css/flag-icon.min.css')}}" rel="stylesheet">
    @section('external-css')
    @endsection
    @yield('external-css')
    <script>
            const deviceType = () => {
                const ua = navigator.userAgent;
                if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
                    return "tablet";
                    alert("Silahkan gunakan PC untuk tampilan lebih baik")
                }
                else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)) {
                    return "Mobile";
                    alert("Silahkan gunakan PC untuk tampilan lebih baik")
                } else{
                    return "Dekstop";
                }
            };
    </script>
</head>
<body>
<div class="wrapper">
    <nav id="sidebar" class="active">
        <div class="sidebar-header">
            <img width="40px" src="{{asset('wahana.gif')}}" alt="bootraper logo" class="app-logo">
        </div>
        <ul class="list-unstyled components text-secondary">
            <li>
                <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Dashboard</a>
            </li>

            <li>
                <a href="#uielementsmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i> Data Master &nbsp;<i class="fa fa-arrow-circle-down"></i></a>
                <ul class="collapse list-unstyled" id="uielementsmenu">
                    <li>
                        <a href="{{route('admin.wartawan')}}"><i class="fas fa-angle-right"></i> Wartawan</a>
                    </li>
                    <li>
                        <a href="{{route('admin.berita')}}"><i class="fas fa-angle-right"></i> Berita</a>
                    </li>
                    <li>
                        <a href="{{route('admin.wilayah')}}"><i class="fas fa-angle-right"></i> Wilayah</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="{{route('admin.wartawan')}}"><i class="fas fa-file"></i>Rekap</a>
            </li>
        </ul>
    </nav>
    <div id="body" class="active">
        <!-- navbar navigation component -->
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <button type="button" id="sidebarCollapse" class="btn btn-light">
                <i class="fas fa-bars"></i><span></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <div class="nav-dropdown">
                            <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> <span style="font-weight: bold;">{{session()->get('nama')}}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                <ul class="nav-list">
                                    <li><a href="{{route('logout')}}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end of navbar navigation -->
       <div class="content">
            @yield('content')
       </div>
    </div>
</div>
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/chartsjs/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard-charts.js')}}"></script>
@section('jsbottom')
@endsection()
@yield('jsbottom')
<script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>
