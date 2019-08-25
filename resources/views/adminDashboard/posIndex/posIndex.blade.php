
@extends('adminDashboard.master')
<meta name="csrf-token" content="{{csrf_token()}}">
@section('title')
    Pos System
@endsection

@section('mainContent')

<div id="page-wrapper">
    <div class="row" >
        <div id="app">
            <pos-index></pos-index>
            <pos-calculation></pos-calculation>
        </div>       
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
    <script>
      
    </script>
@endsection