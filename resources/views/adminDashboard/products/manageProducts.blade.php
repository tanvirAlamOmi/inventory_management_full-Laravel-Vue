
@extends('adminDashboard.master')

@section('title')
    Manage Product
@endsection

@section('mainContent')

<div id="page-wrapper"><br>
<h3 class="text-center text-primary">Product List</h3>
<h3 class="text-center text-success session">{{Session::get('message')}}</h3>
<h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 
<hr/>
    <div class="row">
      <div class="col-lg-12">
        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
            
       @role('admin|data entry')
       <a href="/products/create" class="btn btn-success btn-block"> <span class="fa fa-plus"></span><b> Create Product</b></a>
       @endrole
        <table class="table table-hover table-bordered">
            <thead style="background-color:#7528e7; color:floralwhite">
                <tr>
                    <hr>
                    <th>SL.</th>
                    <th>Name </th>
                    <th>Category</th>
                    {{-- <th>Description</th> --}}
                    <th>Image</th>
                    <th>Price</th>
                    <th>Code</th>
                    <th>Bar Code</th>
                    <th>Status</th>
                    <th>Action</th> 
                </tr>
            </thead>
<tbody>
  @php
      $i = 1;
  @endphp

@foreach($products as $product)
<tr>
    <td>{{$i++}}</td>
    <td>{!!$product->name!!} </td>
    <td>{!! $product->category_name !!}</td>
    {{-- <td>{!!$product->description!!} </td> --}}
    <td><img src="{{asset($product->image)}}" alt="" height="80" width="60"></td> 
    <td>{!!$product->price!!} </td>
    <td>{!!$product->code!!} </td>
    <td>{!!$product->barCode!!} </td>
    <td>{{$product->is_published == 1 ? 'Published' : 'Unpublished'}} </td>
                    
    <td>
      @role('admin|data entry')
      <a class="btn btn-success" href="{{url('/products/edit/'.$product->id)}}" title="Edit">
        <span class="fa fa-pencil-square-o">  </span>
      </a>
      <a class="btn btn-danger" href="{{url('/products/delete/'.$product->id)}}" title="Delete" onclick="return confirm('Are you sure?')">
        <span class="fa fa-trash-o">  </span>
      </a>
      @endrole
      <a class="btn btn-info" href="{{url('/products/view/'.$product->id)}}"  title="View Details">
        <span class="fa fa-info-circle"></span>
      </a>          
    </td>
</tr>
@endforeach
            </tbody>
        </table>
        <hr>
            {{$products->links()}}
        </div>
      </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection