@extends('adminDashboard.master')

@section('title')
    Add Damage Stock
@endsection

@section('mainContent')

<br>
<div id="page-wrapper"><br>
    <h3 class="text-center text-primary"> Add Damage Stock</h3>
    <hr>
<div class="row">
        <div class="col-lg-12">
                <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
                <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3>   

        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
            
            <form method="POST" action="/damageStocks/store" class="form-horizontal" >
                @csrf

            <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Category</label>
                    <div class="col-sm-10">
                    {{-- <input name="category" type="text" class="form-control" required=""> --}}
                    <select class="form-control"  id="category" name="category">
                        <option value="1.2">...Select Category... </option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                    </select>
                    </div>
            </div>
          <div class="form-group">
            <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Product</label>
                <div class="col-sm-10">
                    {{-- <input name="product" type="text" class="form-control" required=""> --}}
                    <select class="form-control"  id="product"  name="product_id">
                        <option value="1.2">...Select Product... </option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}" data-val="{{$product->category_id}}" >{{$product->name}}</option>
                            @endforeach
                    </select>
                </div>
          </div>
          
          {{-- <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Vendor</label>
                    <div class="col-sm-10">
                       
                        <select class="form-control" name="vendor">
                            <option value="1.2">...Select Vendor... </option>
                                @foreach($vendors as $vendor)
                                    <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                @endforeach
                        </select>
                    </div>
            </div> --}}
          
            <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Damaged Quantity</label>
                    <div class="col-sm-10">
                        <input name="damaged_quantity"  type="number" step="1.0" class="form-control" required="">
                    </div>
            </div>
          
            <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Quantity Type</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="quantity_type_id">
                        <option value="1.2">...Select Quantity Type... </option>
                            @foreach($quantity_types as $quantity_type)
                                <option value="{{$quantity_type->id}}">{{$quantity_type->quantity_type}}</option>
                            @endforeach
                    </select>
                    </div>
            </div>

            {{-- <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Initial Stock</label>
                    <div class="col-sm-10">
                        <input name="initial_stock" cols="30" rows="10" type="number" step="1.0"  class="form-control" required="">
                    </div>
            </div>
           --}}

          
            <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Damage Reason</label>
                    <div class="col-sm-10">
                        <textarea name="cause" cols="10" rows="5" maxlength="200"  type="text"  class="form-control" required=""></textarea>
                    </div>
            </div>
          
            {{-- <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Selling Price</label>
                    <div class="col-sm-10">
                        <input name="selling_price" cols="30" rows="10"type="number" step="0.25"  class="form-control" required="">
                    </div>
            </div> --}}
          
          
            {{-- <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Product</label>
                    <div class="col-sm-10">
                        <textarea name="description" cols="30" rows="10" type="text" class="form-control" required=""></textarea>
                    </div>
            </div> --}}
                                                                                                                                                          
          
          {{-- <div class="form-group">
            <label for="inputPassword3"  class="col-md-2 col-form-label text-md-right">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="is_available">
                        <option value="1.2">...Select Status... </option>
                        <option value="1">Available</option>
                        <option value="0">Unavailable</option>
                    </select>
                </div>
          </div>--}}
          <hr> 
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-block btn-success" name="sub">Save Damage Stock</button>
            </div>
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <a type="submit" class="btn btn-block btn-danger" href="/damageStocks/manage" name="sub">Cancel</a>
            </div>
          </div>
        </form>
        </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$('#category').change(function() {
  var $options = $('#product')
    .val('')
    .find('option')
    .show();
  if (this.value != '0')
    $options
    .not('[data-val="' + this.value + '"],[data-val=""]')
    .hide();
})
</script>

@endsection