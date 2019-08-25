<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title') - Inventory Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/admin/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('/admin/')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('/admin/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- select2 -->
    <!-- <link href="{{asset('/public/select2/select2.min.css')}}" rel="stylesheet"> -->

    <!-- Morris Charts CSS -->
    <link href="{{asset('/admin/')}}/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom Fonts -->
    <!-- <link rel="icon" href="{{asset('/public/admin/images/educationIcon.png')}}"> -->
    <!-- <script src="{{asset('/public/admin/tinymce/js/tinymce/tinymce.min.js')}}"></script> -->
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <!-- <script>tinymce.init({ selector:'textarea' });</script> -->
<style>
    tr:nth-child(even) {background-color:#c299ff;}
    tbody{
        color:black;
        font-size:16px; 
    }
   #page-wrapper{
       background-image:linear-gradient(antiquewhite , ivory);
   }
   .btn {
    background-image: linear-gradient(to bottom right, rgba(255,255,255,0.5), rgba(255,255,255,0.2) 40%, rgba(0,0,0,0.15) 60%, rgba(0,0,0,0.05));
    background-repeat: repeat-x;
    transition: 1s;
    border-radius: 50px;
    text-align: center;
    }

.btn:hover {
    background-position: right center;
    color: black;
    
    box-shadow: 5px 5px 18px #888888;
    background-image: linear-gradient(to top left, rgba(255,255,255,0.5), rgba(255,255,255,0.2), rgba(0,0,0,0.15), rgba(0,0,0,0.05)); 
    }
.table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border-bottom-color: black;
    }
    </style>

</head>

<body>

    <div id="wrapper" >

        <!-- Navigation -->
        @include('adminDashboard.includes.header')
        @include('adminDashboard.includes.menu')
        

        
        @yield('mainContent')
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- <script src="{{asset('/public/admin/')}}/vendor/jquery/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('/admin/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('/admin/')}}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    {{-- <script src="{{asset('/public/admin/')}}/vendor/raphael/raphael.min.js"></script> --}}
    {{-- <script src="{{asset('/public/admin/')}}/vendor/morrisjs/morris.min.js"></script> --}}
    {{-- <script src="{{asset('/public/admin/')}}/data/morris-data.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script> --}}
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('/admin/')}}/dist/js/sb-admin-2.js"></script>

    <!-- select2 -->
    <!-- <script src="{{asset('/public/select2/select2.min.js')}}"></script> -->
    <!-- <script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script> -->
<script>setTimeout(function() {
    $('.session').fadeOut('fast');
}, 3000)</script>

@yield('scripts')

</body>

</html>
