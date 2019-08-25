@extends('adminDashboard.master')

@section('title')
    Add Vendor
@endsection

@section('mainContent')

<br>
<div id="page-wrapper"><br>
    <h3 class="text-center text-primary"> Add Vendor</h3>
    <hr>
<div class="row">
        <div class="col-lg-12">
                <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
                <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3>   

        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
            {{-- <form method="POST" action="{{ route('register') }}"> --}}
            <form method="POST" action="/vendors/store" class="form-horizontal" >
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-10">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Phone No.') }}</label>

                    <div class="col-md-10">
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>

                    <div class="col-md-10">
                        <textarea id="address" type="text" cols="10" rows="5" maxlength="200" class="form-control" name="address" value="{{ old('address') }}" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
                        <label for="role" class="col-md-2 col-form-label text-md-right">Vendor Role</label>
                        <div class="col-md-10">
                            <select class="form-control" name="role">
                                {{-- <option value="1.2">...Select Status... </option> --}}
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                </div>
                <hr>
                <div class="form-group row mb-0">
                    <div class="col-md-2"></div>
                    <div class="col-md-10 offset-md-4">
                        <button type="submit" class="btn btn-success btn-block">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
                <div class="form-group row mb-0">

                    <div class="col-md-2"></div>
                    <div class="col-md-10 offset-md-4">
                        <a type="submit" class="btn btn-block btn-danger" href="/vendors/manage" name="sub">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<script>

</script>

@endsection