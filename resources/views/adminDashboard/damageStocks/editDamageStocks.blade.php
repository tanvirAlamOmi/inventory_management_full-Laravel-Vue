@extends('adminDashboard.master')

@section('title')
    Edit Damage Stock
@endsection

@section('mainContent')

<br>
<div id="page-wrapper"><br>
    <h3 class="text-center text-primary"> Edit Damage Stock</h3>
    <hr>
<div class="row">
        <div class="col-lg-12">
                <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
                <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3>   

        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">

            <form method="POST" action="/damageStocks/update" class="form-horizontal" name="editDamageStockForm" >
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
            <input name="id" value="{!!$damageStocks->id!!}" type="hidden" class="form-control" required="">
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
    <label for="inputEmail3" class="col-sm-2 control-label">Damaged Stock Quantity</label>
        <div class="col-sm-10">
            <input name="damaged_quantity" value="{!!$damageStocks->damaged_quantity!!}"  type="number" step="1.0"  class="form-control" required="">
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
    <label for="inputEmail3" class="col-sm-2 control-label">Reason For</label>
        <div class="col-sm-10">
            <input name="cause" value="{!!$damageStocks->cause!!}" cols="10" rows="5" maxlength="200" type="text"  class="form-control" required="">
        </div>
</div>
{{-- <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">selling_price</label>
        <div class="col-sm-10">
            <input name="selling_price" value="{!!$stocks->selling_price!!}" type="text" class="form-control" required="">
        </div>
</div> --}}


          <<hr>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-block btn-success" name="sub">Save Stock</button>
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
    $('#category_id').change(function() {
    var $options = $('#product_id')
        .val('')
        .find('option')
        .show();
    if (this.value != '0')
        $options
        .not('[data-val="' + this.value + '"],[data-val=""]')
        .hide();
    })
</script>
<script>
        document.forms['editDamageStockForm'].elements['category_id'].value={{$damageStocks->category_id}}
        document.forms['editDamageStockForm'].elements['product_id'].value={{$damageStocks->product_id}}
        document.forms['editDamageStockForm'].elements['quantity_type_id'].value={{$damageStocks->quantity_type_id}}
</script>

@endsection