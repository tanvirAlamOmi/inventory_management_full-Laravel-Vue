
@extends('adminDashboard.master')

@section('title')
    Manage Category
@endsection

@section('mainContent')

<div id="page-wrapper"><br>
    <h3 class="text-center text-primary">Category List</h3>
    <hr>
    <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
    <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 
<hr/>
    <div class="row">
      <div class="col-lg-12">
        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
            {{-- @role('admin|data entry') --}}
                <a type="submit" class="btn btn-success btn-block" href="/categories/create" ><span class="fa fa-plus"></span><b> Create Category</b></a>
            {{-- @endrole --}}
        <table class="table table-hover table-bordered">
            <thead style="background-color:#7528e7; color:floralwhite">
                <tr>
                    <hr>
                    <th>SL.</th>
                    <th>Name </th>
                    <th>Description</th>
                    <th>Status</th>
                  {{-- @role('admin|data entry') --}}
                    <th>Action</th>
                     {{-- @endrole --}}
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp

                @foreach($categories as $category)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{!!$category->name!!} </td>
                    <td>{!!$category->description!!} </td>
                    <td>{{$category->is_published == 1 ? 'Published' : 'Unpublished'}} </td>
                   {{-- @role('admin|data entry') --}}
                    <td>
                        <a class="btn btn-success" href="{{url('/categories/edit/'.$category->id)}}" title="Edit">
                            <span class="fa fa-pencil-square-o">  </span>
                        </a>
                        <a class="btn btn-danger" href="{{url('/categories/delete/'.$category->id)}}" title="Delete" onclick="return confirm('Are you sure?')">
                            <span class="fa fa-trash-o">  </span>
                        </a>
                    </td>
                    {{-- @endrole --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
            {{$categories->links()}}
        </div>
      </div>
    </div>
</div>

@endsection