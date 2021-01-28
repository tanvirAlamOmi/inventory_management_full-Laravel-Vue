
@extends('adminDashboard.master')

@section('title')
    Manage User
@endsection

@section('mainContent')

<div id="page-wrapper"><br>
    <h3 class="text-center text-primary">User List</h3>
    <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
    <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 
    <hr>
<!--<div class="container">-->
    <div class="row">
      <div class="col-lg-12">
        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
        <table class="table table-hover table-bordered">
            <thead style="background-color:#7528e7; color:floralwhite">
                <tr>
                    <hr>
                    <th>SL.</th>
                    <th>User </th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User Role</th>
                    {{-- @role('admin')  --}}
                    <th>Action</th>
                    {{-- @endrole --}}
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp

                @foreach($users as $user)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{!!$user->name!!} </td>
                    <td>{!!$user->email!!} </td>
                    {{-- <td>{!!$user->password!!} </td> --}}
                    <td>--password--</td>
                    <td><?php
                            if ($user->role == 1 ) {
                                echo 'admin';
                            }
                            elseif ($user->role == 2) {
                                echo 'Data Entry';
                            }
                            elseif ($user->role == 3) {
                                echo 'Operator';
                            }?>
                        </td>
                   {{-- @role('admin') --}}
                    <td>
                        <a class="btn btn-success" href="{{url('/users/edit/'.$user->id)}}" title="Edit">
                            <span class="fa fa-pencil-square-o">  </span>
                        </a>
                        <a class="btn btn-danger" href="{{url('/users/delete/'.$user->id)}}" title="Delete" onclick="return confirm('Are you sure?')">
                            <span class="fa fa-trash-o">  </span>
                        </a>
                    </td>
                    {{-- @endrole --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
            {{$users->links()}}
        </div>
      </div>
    </div>
</div>
<!--</div>-->

@endsection