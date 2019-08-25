
@extends('adminDashboard.master')
@section('title')
    Current Stock
@endsection

@section('mainContent')

<div id="page-wrapper"><br>
    <h3 class="text-center text-primary">Current Stock List</h3>
    <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
    <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 
<hr/>
    <div class="row">
      <div class="col-lg-12">
        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
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
           <br>
       
        <table class="table table-hover table-bordered">
            <thead style="background-color:#7528e7; color:floralwhite">
                <tr>
                    <hr>
                    <th>SL.</th>
                    <th>Category </th>
                    <th>Product</th>
                    <th>Current Quantity</th>
                    <th>Quantity Type</th>
                    {{-- <th>Status</th> --}}
                    <th>Updated Date</th>
                </tr>
            </thead>
            <tbody id="table_id">
                @php
                    $i = 1;
                @endphp

                @foreach($products as $product)
                <tr  data-val="{{$product->category_id}}" data-valu="{{$product->id}}">
                    <td>{{$i++}}</td>
                    <td>{!!$product->category_name!!} </td>
                    <td>{!!$product->name!!} </td>
                    <td>{!!$product->current_stock!!} </td>
                    <td>{!!$product->quantiy_type!!} </td>
                    {{-- <td>{{$product->is_available == 1 ? 'Available' : 'Unavailable'}} </td> --}}
                    <td>{!!Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->updated_at)->format('d-M-y')!!}</td>
                  
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