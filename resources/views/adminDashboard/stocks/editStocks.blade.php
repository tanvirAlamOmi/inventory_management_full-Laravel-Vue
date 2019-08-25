@extends('adminDashboard.master')

@section('title')
    Edit Stock
@endsection

@section('mainContent')

<br>
<div id="page-wrapper"><br>
    <h3 class="text-center text-primary"> Edit Stock</h3>
    <hr>
<div class="row">
        <div class="col-lg-12">
                <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
                <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 

        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">

            <form method="POST" action="/stocks/update" class="form-horizontal" name="editStockForm" >
                @csrf

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
            {{-- <input name="category" value="{!!$stocks->category!!}" type="text" class="form-control" required="" > --}}
            <select class="form-control"  id="category_id" name="category_id">
                <option value="1.2">...Select Category... </option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>
            <input name="id" value="{!!$stocks->id!!}" type="hidden" class="form-control" required="">
            </div>
          </div>
         
          <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">product</label>
                    <div class="col-sm-10">
                        {{-- <input name="product" value="{!!$stocks->product!!}" type="text" class="form-control" required=""> --}}
                        <select class="form-control"  id="product_id"  name="product_id">
                            <option value="1.2">...Select Product... </option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}" data-val="{{$product->category_id}}" >{{$product->name}}</option>
                                @endforeach
                        </select>
                    </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">vendor</label>
                <div class="col-sm-10">
                    {{-- <input name="vendor" value="{!!$stocks->vendor!!}" type="text" class="form-control" required=""> --}}
                    <select class="form-control" name="vendor_id">
                        <option value="1.2">...Select Vendor... </option>
                            @foreach($vendors as $vendor)
                                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                            @endforeach
                    </select>
                </div>
         </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">quantity_type</label>
                <div class="col-sm-10">
                    <select class="form-control" name="quantity_type_id">
                        <option value="1.2">...Select Quantity Type... </option>
                            @foreach($quantity_types as $quantity_type)
                                <option value="{{$quantity_type->id}}">{{$quantity_type->quantity_type}}</option>
                            @endforeach
                    </select>
                    {{-- <input name="quantity_type" value="{!!$stocks->quantity_type!!}" type="text" class="form-control" required=""> --}}
                </div>
      </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Stock Quantity</label>
        <div class="col-sm-10">
            <input name="stock_quantity" value="{!!$stocks->stock_quantity!!}"  type="number" step="1.0"  class="form-control" required="">
        </div>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Buying Price</label>
        <div class="col-sm-10">
            <input name="buying_price" value="{!!$stocks->buying_price!!}"  type="number" step="0.25"  class="form-control" required="">
        </div>
</div>
{{-- <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">selling_price</label>
        <div class="col-sm-10">
            <input name="selling_price" value="{!!$stocks->selling_price!!}" type="text" class="form-control" required="">
        </div>
</div> --}}


          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                <select class="form-control" name="is_available">
                    {{-- <option value="1.2">...Select Publication Status... </option> --}}
                    <option value="1">Available</option>
                    <option value="2">Unavailable</option>
                </select>
            </div>
          </div><hr>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-block btn-success" name="sub">Save Stock</button>
            </div>
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <a type="submit" class="btn btn-block btn-danger" href="/stocks/manage" name="sub">Cancel</a>
            </div>
          </div>

        </form>
        </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('#category_id').change(function() {
    var $options = $('#product_id')
        .val('')
        .find('option')
        .show();
    if (this.value != '1.2')
        $options
        .not('[data-val="' + this.value + '"],[data-val=""]')
        .hide();
    })
</script>
<script>
        document.forms['editStockForm'].elements['is_available'].value={{$stocks->is_available}}
        document.forms['editStockForm'].elements['category_id'].value={{$stocks->category_id}}
        document.forms['editStockForm'].elements['product_id'].value={{$stocks->product_id}}
        document.forms['editStockForm'].elements['vendor_id'].value={{$stocks->vendor_id}}
        document.forms['editStockForm'].elements['quantity_type_id'].value={{$stocks->quantity_type_id}}
</script>

@endsection