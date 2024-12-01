@extends('layouts.user-dashboard')
@section('main-section')

 
  <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Product</h4>
                  </div>
                <form class="forms-sample" action="{{url('Update/Product' , $product->id)}}" method="post">
                  @csrf
                  <div class="card-body">                                   
                   
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" class="form-control" name="Product_name" required         value="{{ $product->Product_name }}">
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                      <label>Date of Manufacture:</label>
                     
                      <input type="date" class="form-control" id="exampleInputPassword2" value="{{ $product->manufacture_date}}"placeholder="Date of Manufacture" name="manufacture_date" min="{{ date('Y-m-d') }}" required>
                    </div>   
                    <div class="col-md-4">
                    <label>Product Type</label>       
                    <select class="form-control select2" name="PType_id">
                    
                      @foreach ($ProductTypes as $p)
                          <option value="{{ $p->id }}" {{ $p->id == $product->PType_id ? 'selected' : '' }}>
                         {{ $p->Type_name }}
                         </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-md-4">
                    <label>Product Category</label>
                    <select class="form-control select2 " name="category_id">
                     @foreach ($productcategory as $c)
                     <option value="{{ $c->id }}" {{ $c->id == $product->category_id ? 'selected' : '' }}>
                       {{ $c->category_name }}
                       </option>
                     @endforeach
                   </select>
                   </div>
                    </div>
                    
                    <div class="form-group mt-3">
                      <label>Product Description</label>
                      <input  id="" value="{{ $product->Product_desc }}" name="Product_desc" class="form-control"  placeholder="Product Details,......" style="height: 130px;" required  ></input>
                    </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-primary mr-2">Update</button>  
                    
                     <a href="{{url('/List/product')}}" class="btn btn-light mr-2">Cancel</a>               
                    </div>  
                    </form>
                  </div>
                </div>
</div>

@endsection
