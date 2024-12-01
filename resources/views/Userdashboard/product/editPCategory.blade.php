<!-- resources/views/Userdashboard/product/editPCategory.blade.php -->
@extends('layouts.user-dashboard')
@section('main-section')
<div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Category</h4>
<form action="{{ url('Update/ProductCategory', $pcategory->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="category_name">Category Name:</label>
        <input type="text" name="category_name" class="form-control" value="{{ $pcategory->category_name }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{url('/product/category')}}" class="btn btn-light mr-2">Cancel</a> 
</form>
</div>
  </div>
</div>
@endsection
