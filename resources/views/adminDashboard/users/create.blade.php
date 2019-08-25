@extends('adminDashboard.master')

@section('title')
    Add User
@endsection

@section('mainContent')

<br>
<div id="page-wrapper"><br>
    <h3 class="text-center text-primary"> Add User</h3>
    <hr>
<div class="row">
        <div class="col-lg-12">
                <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
                <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3>   

        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
            {{-- <form method="POST" action="{{ route('register') }}"> --}}
            <form method="POST" action="/users/store" class="form-horizontal" >
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right">User Role</label>
                        <div class="col-md-6">
                            <select class="form-control" name="role">
                                <option value="1.2">...Select Status... </option>
                                <option value="1">Admin</option>
                                <option value="2">Data Entry</option>
                                <option value="3">Operator</option>
                            </select>
                        </div>
                </div>
                <hr>
                <div class="form-group row mb-0">
                    <div class="col-md-4"></div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                <div class="form-group row mb-0">

                    <div class="col-md-4"></div>
                    <div class="col-md-6 offset-md-4">
                        <a type="submit" class="btn btn-block btn-danger" href="/users/manage" name="sub">Cancel</a>
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