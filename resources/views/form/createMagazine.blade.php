@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">        
            <div class="col-md-8">
                <h1>Create Magazine</h1>
                <form action="{{ route('magazines.store') }}" method="POST"> 
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description"></textarea>
                    </div>
                    <input type="submit" value="Save" class="btn btn-outline-dark">
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- action itu formnya ke function mana di controller, method itu post, get, put, dll --}}