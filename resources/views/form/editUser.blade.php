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
                            @if ($user->role == '0')
                                <option value="0" @if ($book->genre == '0') selected @endif>selected>Admin</option>
                                <option value="1" @if ($book->genre == '1') selected @endif>>User</option>
                            @else
                                <option value="0">Admin</option>
                                <option value="1" selected>User</option>
                            @endif
                        </select>
                    </div>
                    <input type="submit" value="Save" class="btn btn-outline-dark">
                </form>
            </div>
        </div>
    </div>
@endsection