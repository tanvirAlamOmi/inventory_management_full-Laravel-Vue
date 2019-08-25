@extends('adminDashboard.master')

@section('title')
    Add Product
@endsection

@section('mainContent')

<br>
<div id="page-wrapper"><br>
    <h3 class="text-center text-primary"> Add Product</h3>
    <hr>
<div class="row">
    <div class="col-lg-12">
            <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
            <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 

        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">

            {!! Form::open(['url'=>'/products/store','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
            {{csrf_field()}}
            <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Product Name</label>
                    <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" required="">
                    </div>
            </div>
            <div class="form-group">
            <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" cols="30" rows="10" maxlength="200" type="text" class="form-control"  required=""></textarea>
                </div>
            </div> 

          <div class="form-group">
            <label for="inputPassword3" class="col-md-2 col-form-label text-md-right">Category</label>
            <div class="col-sm-10">
                <select class="form-control" name="category_id">
                    <option value="1.2">...Select Category... </option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div> 
            </div>

            <div class="form-group">
                <label for="file" class="col-md-2 col-form-label text-md-right">Image</label>
                <div class="col-sm-10">
                    <input name="image" style="padding:0px" type="file" class="btn btn-primary btn-lg float-left" accept="image/*" required="">
                </div>
            </div>
          
            <div class="form-group">
               <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Price</label>
                <div class="col-sm-10">
                    <input name="price" type="number" step="0.25" class="form-control" required="">
                </div>
             </div>
            <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Code</label>
                    <div class="col-sm-10">
                        <input name="code" type="text" class="form-control" required="">
                    </div>
            </div>
          
            <div class="form-group">
                <label for="inputPassword3"  class="col-md-2 col-form-label text-md-right">Status</label>
                <div class="col-sm-10">
                  <select class="form-control" name="is_published">
                      {{-- <option value="1.2">...Select Status... </option> --}}
                      <option value="1">Published</option>
                       <option value="0">Unpublished</option>
                 </select>
                </div>
            </div><hr>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-block btn-success" name="sub">Save Product</button>
                </div>
                <hr>
                <div class="col-sm-offset-2 col-sm-10">
                    <a type="submit" class="btn btn-block btn-danger" href="/products/manage" name="sub">Cancel</a>
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
</div>

<script>

</script>

@endsection