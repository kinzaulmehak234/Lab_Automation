@extends('layouts.user-dashboard')
@section('main-section')

@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

    </div>
@endif
  <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Product</h4>
                  </div>
                <form class="forms-sample" action="{{url('/insert/product')}}" method="post">
                  @csrf
                  <div class="card-body">                                   
                    <div class="form-group">
                      <label>Product Id</label>
                      <input type="text" class="form-control" name="product_id"                     value="{{ $productId}}" readonly>
                    </div>
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" class="form-control" name="Product_name" required>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                      <label>Date of Manufacture:</label>
                      <!-- <input type="date" class="form-control datepicker"name="manufacture_date" min="{{ date('Y-m-d') }}" required> -->
                      <input type="date" class="form-control" id="exampleInputPassword2" placeholder="Date of Manufacture" name="manufacture_date" min="{{ date('Y-m-d') }}" required>
                    </div>            
                    <div class="col-md-3">
                      <label>Product Type</label>
                      <select class="form-control select2" name="PType_id">
                      @foreach ($ProductTypes as $p)
                      <option  value="{{$p->id }}">{{$p->Type_name}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label>Product Category</label>
                      <select class="form-control select2" name="category_id">

                      @foreach ($productcategory as $c)
                      <option value="{{ $c->id }}" >{{$c->category_name}}</option>
                      @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                    <label>Status</label>
                    <select class="form-control select2" name="status">
                        <option value="pending">Pending</option>
                        <option value="testing">Testing</option>
                        <option value="approved">Approved</option>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group mt-3">
                      <label>Product Description</label>
                      <textarea  id="" name="Product_desc" class="form-control" rows="4" placeholder="Product Details,......" required ></textarea>
                    </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-primary mr-2">Submit</button>  
                    
                     <a href="{{url('/List/product')}}" class="btn btn-light mr-2">Cancel</a>               
                    </div>  
                    </form>
                  </div>
                </div>
</div>

@endsection
