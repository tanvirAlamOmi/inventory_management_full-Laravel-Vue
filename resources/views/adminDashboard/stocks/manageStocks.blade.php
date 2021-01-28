
@extends('adminDashboard.master')

@section('title')
    Manage Stock
@endsection

@section('mainContent')

<div id="page-wrapper"><br>
    <h3 class="text-center text-primary">Stock List</h3>
    <hr>
    <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
    <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3>  
    <div class="row">
      <div class="col-lg-12">
        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
            {{-- @role('admin|data entry') --}}
                <a type="submit" class="btn btn-success btn-block" href="/stocks/create" ><span class="fa fa-plus"></span><b> Create Stock</b></a>
            {{-- @endrole --}}
            <hr>

            <div class="col-md-6">
                <select  class="selectpicker form-control" data-style="btn-primary"  id="category_id" name="category_id">
                    <option value="0">...Select category... </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select  class="selectpicker form-control" data-style="btn-primary" id="product_id" name="product_id">
                    <option value="0">...Select product... </option>
                        @foreach($products as $product)
                            <option value="{{$product->id}}" >{{$product->name}}</option>
                        @endforeach
                </select>
            </div>
            <hr>

        <table class="table table-hover table-bordered">
            <thead style="background-color:#7528e7; color:floralwhite">
                <tr>
                    <hr>
                    <hr>
                    <th>SL.</th>
                    <th>Category </th>
                    <th>Product</th>
                    <th>Vendor</th>
                    <th>Stock Quantity</th>
                    <th>Quantity Type</th>
                    <th>Buying Price</th>
                    <th>Status</th>
                    <th>Stocked By</th>
                    <th>Updated Date</th>
                  {{-- @role('admin|data entry')  --}}
                   <th>Action</th> 
                   {{-- @endrole --}}
                </tr>
            </thead>
            <tbody id="table_id">
                @php
                    $i = 1;
                @endphp

                @foreach($stocks as $stock)
                <tr   data-val="{{$stock->category_id}}" data-valu="{{$stock->product_id}}">
                    <td>{{$i++}}</td>
                    <td>{!!$stock->category_name!!} </td>
                    <td>{!!$stock->products_name!!} </td>
                    <td>{!!$stock->vendor!!} </td>
                    <td>{!!$stock->stock_quantity!!} </td>
                    <td>{!!$stock->quantity_type!!} </td>
                    <td>{!!$stock->buying_price!!} </td>
                    <td>{{$stock->is_available == 1 ? 'Available' : 'Unavailable'}} </td>
                    <td>{!! $stock->user_name !!}</td>
                    <td>{!!Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $stock->updated_at)->format('d-M-y')!!}</td>
                   {{-- @role('admin|data entry') --}}
                    <td>
                        <a class="btn btn-success" href="{{url('/stocks/edit/'.$stock->id)}}" title="Edit">
                            <span class="fa fa-pencil-square-o">  </span>
                        </a>
                        <a class="btn btn-danger" href="{{url('/stocks/delete/'.$stock->id)}}" title="Delete" onclick="return confirm('Are you sure?')">
                            <span class="fa fa-trash-o">  </span>
                        </a>
                    </td>
                    {{-- @endrole --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
            {{$stocks->links()}}
        </div>
      </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
{{-- category filter --}}
    <script>
        $('#category_id').change(function() {
        var $options = $('#table_id')
            .val('')
            .find('tr')
            .show();
        if (this.value != '0')
            $options
            .not('[data-val="' + this.value + '"],[data-val=""]')
            .hide();
        })
    </script>
{{-- end of category filter --}}
{{-- product filter --}}
    <script>
        $('#product_id').change(function() {
        var $options = $('#table_id')
            .val('')
            .find('tr')
            .show();
        if (this.value != '0')
            $options
            .not('[data-valu="' + this.value + '"],[data-valu=""]')
            .hide();
        })
    </script>
{{-- end of product filter --}}
@endsection