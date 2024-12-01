@extends('layouts.admin-dashboard')

@section('main-section')
<div class="section-header">
            <h1>Manage Products</h1>
</div>

  

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="myTable"style="font-size: 13px;" class="display">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Type</th>
                <th>Date of Manufacture</th>
                <th>Product Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->Product_name }}</td>
                    <td>{{ $product->PType_id }}</td>
                    <td>{{ $product->manufacture_date }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ ucfirst($product->status) }}</td>
                    <td class="d-flex">
                    <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" >
                     @csrf
                      @method('PATCH')
                      <button type="submit" class="btn btn-success btn-action mr-2"  data-toggle="tooltip" title="Approve"> <i class="fas fa-check-circle"></i></button>
                    </form>

                        <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
