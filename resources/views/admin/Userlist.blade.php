@extends('layouts.admin-dashboard')
@section('main-section')
<div class="section-header">
            <h1>User List</h1>
</div>
<table id="myTable">
        <thead>
            <tr>
               <th>Sr No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                                <!-- Edit button -->
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    
                    <!-- Delete button -->
                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
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