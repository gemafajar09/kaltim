@if(session('user_id') == '')
    <script>
        window.location='/';
    </script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard - Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <link href="{{asset('/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/calendar.css')}}" rel="stylesheet">
    <link href="{{asset('/css/pages/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<style>
    body{
        background-image: url("{{asset('/img/bgg.jpg')}}");
        background-size:cover;
        background-repeat: no-repeat;
        background-attachment: fixed; 
        width: 100%;
    }
</style>
<body>
    @include('backend.template.component.script')
    <!-- navbar -->
    @include('backend.template.component.navbar')
    {{-- menu --}}
    @include('backend.template.component.menu')
    <!-- content -->
    <div class="main">
        <div class="main-inner">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- footer --}}
    @include('backend.template.component.footer')
    {{-- script --}}
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
</body>
</html>
