
@extends('adminDashboard.master')

@section('title')
    Manage Damage Stock
@endsection

@section('mainContent')

<div id="page-wrapper"><br>
    <h3 class="text-center text-primary">Stock Damage List</h3>
    <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
    <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 
<hr/>
    <div class="row">
      <div class="col-lg-12">
        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
            {{-- @role('admin|data entry') --}}
                <a type="submit" class="btn btn-success btn-block" href="/damageStocks/create" ><span class="fa fa-plus"></span><b> Create Stock</b></a>
            {{-- @endrole --}}
        <table class="table table-hover table-bordered">
            <thead style="background-color:#7528e7; color:floralwhite">
                <tr>
                    <hr>
                    <th>SL.</th>
                    <th>Category </th>
                    <th>Product</th>
                    <th>Damaged Quantity</th>
                    <th>Quantity Type</th>
                    <th>Damage Reason</th>
                    <th>Updated Date</th>
                  {{-- @role('admin|data entry')   --}}
                    <th>Action</th> 
                  {{-- @endrole --}}
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp

                @foreach($damageStocks as $damageStock)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{!!$damageStock->category_name!!} </td>
                    <td>{!!$damageStock->products_name!!} </td>
                    <td>{!!$damageStock->damaged_quantity!!} </td>
                    <td>{!!$damageStock->quantity_type!!} </td>
                    <td>{!!$damageStock->cause!!} </td>
                    <td>{!!Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $damageStock->updated_at)->format('d-M-y')!!}</td>
                   {{-- @role('admin|data entry') --}}
                    <td>
                        <a class="btn btn-success" href="{{url('/damageStocks/edit/'.$damageStock->id)}}" title="Edit">
                            <span class="fa fa-pencil-square-o">  </span>
                        </a>
                        <a class="btn btn-danger" href="{{url('/damageStocks/delete/'.$damageStock->id)}}" title="Delete" onclick="return confirm('Are you sure?')">
                            <span class="fa fa-trash-o">  </span>
                        </a>
                    </td>
                    {{-- @endrole --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
            {{$damageStocks->links()}}
        </div>
      </div>
    </div>
</div>

@endsection