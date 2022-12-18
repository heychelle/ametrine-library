@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">        
            <div class="col-md-8">
                <h1>Edit User</h1>
                <form action="{{ route('users.update', $user->id) }}" method="POST"> 
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" id="" class="form-select">
                            <option value="0" @if ($user->role == '0') selected @endif>Admin</option>
                            <option value="1" @if ($user->role == '1') selected @endif>User</option>
                        </select>
                    </div>
                    <input type="submit" value="Save" class="btn btn-outline-dark">
                </form>
            </div>
        </div>
    </div>
@endsection