@extends('layouts.admin-dashboard')

@section('main-section')
<div class="section-header">
            <h1>Manage Tests<s</h1>
</div>


    @if(session('success'))
        <div class="alert alert-danger">{{ session('success') }}</div>
    @endif

    <table id="myTable"style="font-size: 13px;" class="display">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Test ID</th>
                <th>Product ID</th>
                <th>Test Type</th>
                <th>Test Result</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tests as $index => $test)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $test->Test_id }}</td>
                    <td>{{ $test->product_id }}</td>
                    <td>{{ $test->T_type }}</td>
                    <td>{{ $test->result }}</td>
                    <td>
                        <form action="{{ route('admin.deleteTest', $test->id) }}" method="POST" style="display:inline;">
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
