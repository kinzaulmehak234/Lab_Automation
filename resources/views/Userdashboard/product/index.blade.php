@extends('layouts.user-dashboard')
@section('main-section')
@if(session('DeleteProduct'))
    
     <div class="alert alert-danger alert-has-icon">
        <div class="alert-icon"></div>
          <div class="alert-body">
          
            {{session('DeleteProduct')}}
          </div>
     </div>
@endif
<div class="section-header d-flex justify-content-between">
            <h1>Product List</h1>
            <a  href="{{url('/insert/product')}}"class="btn btn-primary mr-2">+ Add Product</a>  
</div>


                    <table id="myTable" class="display" style="font-size: 13px;">
                      <thead>
                       <tr>
                            <th>#</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>Date of Manufacture</th>
                            <th>Product Category </th>                         
                            <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                       @foreach ($product as $p)
                         <tr>
                         <td>{{ $loop->iteration }}</td>
                          <td>{{$p->product_id}}</td>
                          <td>{{$p->Product_name}}</td>
                          <td>{{$p->PType_id}}</td>
                          <td>{{$p->manufacture_date }}</td>
                          <td>{{$p->category_id}}</td>
                          <td>
                            <a href="{{url('/Edit/Product',$p->id)}}"  class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"  href="{{url('/Delete/product',$p->id)}}" ><i class="fas fa-trash"></i></a>
                          </td>
                         </tr>
                     @endforeach
                     </tbody>
                    </table>

@endsection