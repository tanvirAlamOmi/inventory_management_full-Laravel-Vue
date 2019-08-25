@extends('adminDashboard.master')

@section('title')
    Edit Product
@endsection

@section('mainContent')

<br>
<div id="page-wrapper"><br>
    <h3 class="text-center text-primary"> Edit Product</h3>
    <hr>
<div class="row">
        <div class="col-lg-12">
                <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
                <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3>  

        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">

            {{-- <form method="POST" action="/products/update" class="form-horizontal" name="editProductForm" >
                @csrf --}}
                {!! Form::open(['url'=>'/products/update','method'=>'POST', 'name'=>"editProductForm" ,'class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                {{csrf_field()}}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input name="name" value="{!!$products->name!!}" type="text" class="form-control" required="" >
                        <input name="id" value="{!!$products->id!!}" type="hidden" class="form-control" required="">
                    </div>
            </div>
         
          <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">description</label>
                    <div class="col-sm-10">
                        <input name="description" value="{!!$products->description!!}" type="text" class="form-control" required="">
                    </div>
          </div>

          

          {{-- <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input name="image" type="file" class="form-control" id="tan" accept="image/*">
                    <td><img src="{{asset($products->image)}}" alt="" height="220" width="160"></td> 
                </div>
          </div> --}}


          {{-- <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                    <input name="category_id" value="{!!$products->category_id!!}" type="text" class="form-control" required="">
                </div>
            </div> --}}


            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Category</label>
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
                <label for="file" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input name="image" style="padding:10px 0px" type="file" class="btn btn-primary btn-lg float-left" accept="image/*" required="">
                   <hr>
                    <td><img src="{{asset($products->image)}}" alt="" height="220" width="160"></td> 
                    <hr>
                </div>
            </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">price</label>
                <div class="col-sm-10">
                    <input name="price" value="{!!$products->price!!}" type="text" class="form-control" required="" >
                </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">code</label>
                <div class="col-sm-10">
                    <input name="code" value="{!!$products->code!!}" type="text" class="form-control" required="" >
                </div>
        </div>
 

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                <select class="form-control" name="is_published">
                    {{-- <option value="1.2">...Select Publication Status... </option> --}}
                    <option value="1">Published</option>
                    <option value="2">Unpublished</option>
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

        {{-- </form> --}}

        {!! Form::close() !!}
        </div>
        </div>
    </div>
</div>


<script>
        document.forms['editProductForm'].elements['is_published'].value={{$products->is_published}}
        document.forms['editProductForm'].elements['category_id'].value={{$products->category_id}}
</script>

@endsection