@extends('adminDashboard.master')

@section('title')
    Add Category
@endsection

@section('mainContent')

<br>
<div id="page-wrapper"><br>
    <h3 class="text-center text-primary"> Add Category</h3>
    <hr>
<div class="row">
        <div class="col-lg-12">
                <h3 class="text-center text-success session">{{Session::get('message')}}</h3>
                <h3 class="text-center text-danger session">{{Session::get('message2')}}</h3> 

        <div class="well" style="box-shadow: 0 5px 15px rgba(0,0,0,.5">
            <form method="POST" action="/categories/store" class="form-horizontal" >
                @csrf

            <div class="form-group">
                <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Category Name</label>
                    <div class="col-sm-10">
                    <input name="name" type="text" class="form-control" required="">
                    </div>
            </div>
          <div class="form-group">
            <label for="inputEmail3"  class="col-md-2 col-form-label text-md-right">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" cols="30" rows="10" type="text" class="form-control" required=""></textarea>
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
                <button type="submit" class="btn btn-block btn-success" name="sub">Save Category</button>
            </div>
            <hr>
            <div class="col-sm-offset-2 col-sm-10">
                <a type="submit" class="btn btn-block btn-danger" href="/categories/manage" name="sub">Cancel</a>
            </div>
          </div>
        </form>
        </div>
        </div>
    </div>
</div>

<script>

</script>

@endsection