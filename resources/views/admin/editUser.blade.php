@extends('layouts.admin-dashboard')

@section('main-section')
<div class="section-header">
    <h1>Edit User</h1>
</div>
<form action="{{ route('admin.user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <input type="text" name="role" value="{{ $user->role }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update User</button>
    <a href="{{url('/admin/userlist')}}" class="btn btn-light">Cancel</a>
</form>
@endsection
