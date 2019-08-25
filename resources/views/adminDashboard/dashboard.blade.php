@extends('adminDashboard.master')
<style>
.imgCss{
    display: block;
    margin-left: auto;
    margin-right: auto;
    padding-top:9px
}
div.polaroid {
  width: auto%;
  background-image:linear-gradient(gold ,white);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
  height:150px;
  border-style: groove;
  border-radius:250px;
}
.imgCss{
    display: block;
    margin-left: auto;
    margin-right: auto;
    padding-top:9px
}
div.polaroid {
  width: auto%;
  background-image:radial-gradient(white,gold);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
  height:150px;
  border-style: groove;
  border-radius:250px;
}

div.polaroid:hover{

    background-position: right center;
    background-image:radial-gradient(gold ,white);
    box-shadow: 5px 10px 18px #888888;
}

</style>

@section('title')
    Dashboard
@endsection

@section('mainContent')
<div id="page-wrapper"  style="background-image: linear-gradient(antiquewhiteantiquewhiteantiquewhite, ivory)">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            
                <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
                <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 
                <div class="col-lg-12" style="padding-top:50px">
                    <div class="col-lg-1">

                    </div>
                    <div class="col-lg-10 polaroid">
                        <a href="{{route('posIndex.view')}}">
                            <img class="imgCss" src="http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/128/Actions-list-add-icon.png" alt="POS">
                        </a>
                    </div>
                    <div class="col-lg-1">

                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
            </div>
     </div>
                     
     <script>
        
     </script>
@endsection