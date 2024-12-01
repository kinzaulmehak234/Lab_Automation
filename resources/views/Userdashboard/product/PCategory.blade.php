@extends('layouts.user-dashboard')
@section('main-section')
@if(session('success'))
     <div class="alert alert-info">
        {{session('success')}}
     </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

    </div>
@endif
@if(session('DeleteProductC'))
     <div class="alert alert-danger">
        {{session('DeleteProductC')}}
     </div>
@endif
@if (session('Update'))
    <div class="alert alert-success">
        {{ session('Update') }}
    </div>
@endif
<div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product Category</h4>
                    
                    <form class="forms-sample" action="{{url('/product/category')}}" method="post">
                    @csrf
                      <div class="form-group row ">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label ">Category Name:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control " id="exampleInputUsername2" placeholder="Enter Product Category" name="name">
                        </div>
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2 ">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Category List</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead >
                          <tr >
                            <th>#</th>
                            <th>Name </th>
                            <th>Action </th>
                          </tr>
                        </thead>
                        <tbody >
                        @foreach ($productcategory as $c)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$c->category_name}}</td>
                            <td>

                              <a  href="{{url('Edit/ProductCategory',$c->id)}}"  class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                              <a  href="{{url('Delete/ProductCategory',$c->id)}}"class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" ><i class="fas fa-trash"></i></a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>              
@endsection