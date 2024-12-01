<!-- resources/views/Userdashboard/product/editPType.blade.php -->
@extends('layouts.user-dashboard')
@section('main-section')
<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Update Product Type</h4>
<form action="{{ url('Update/ProductType', $ProductType->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="Type_name">Product Type :</label>
        <input type="text" name="Type_name" class="form-control" value="{{ $ProductType->Type_name }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{url('/product/Type')}}" class="btn btn-light mr-2">Cancel</a> 
</form>
     </div>
  </div>
</div>

@endsection
