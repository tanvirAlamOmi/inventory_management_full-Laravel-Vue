@extends('adminDashboard.master')

@section('title')
    Edit User
@endsection

@section('mainContent')

<br>
<div id="page-wrapper"><br>
    <h3 class="text-center text-primary"> Edit User</h3>
    <hr>
<div class="row">
        <div class="col-lg-12">
                <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
                <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 

        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">

            <form method="POST" action="/users/update" class="form-horizontal" name="editUserForm">
            {{csrf_field()}}

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
            <input name="name" value="{!!$users->name!!}" type="text" class="form-control" required="" >
            <input name="id" value="{!!$users->id!!}" type="hidden" class="form-control" required="">
            </div>
          </div>
         
          <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" value="{!!$users->email!!}" type="text" class="form-control" required="">
                    </div>
          </div>

          

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input name="password" type="text" class="form-control" required="" >
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">User Role</label>
            <div class="col-sm-10">
                <select class="form-control" name="role">
                    <option value="1.2">...Select Publication Status... </option>
                    <option value="1">Admin</option>
                    <option value="2">Data Entry</option>
                    <option value="3">Operator</option>
                </select>
            </div>
          </div><hr>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-block btn-success" name="sub">Save User</button>
            </div>
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                    <a type="submit" class="btn btn-block btn-danger" href="/users/manage" name="sub">Cancel</a>
                </div>
          </div>

        </form>
        </div>
        </div>
    </div>
</div>


<script>
        document.forms['editUserForm'].elements['role'].value={{$users->role}}
</script>

@endsection