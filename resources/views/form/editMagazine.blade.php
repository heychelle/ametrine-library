@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">        
            <div class="col-md-8">
                <h1>Edit Magazine</h1>
                <form action="{{ route('magazines.update', $magazine->id) }}" method="POST"> 
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $magazine->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description">{{ $magazine->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" id="" class="form-select">
                            <option value="0" @if ($magazine->genre == '0') selected @endif>Available</option>
                            <option value="1" @if ($magazine->genre == '1') selected @endif>Borrowed</option>
                            <option value="2" @if ($magazine->genre == '2') selected @endif>Due</option>
                            <option value="3" @if ($magazine->genre == '3') selected @endif>Booked</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loan Date</label>
                        <input type="date" class="form-control" name="loan_date" value="{{ $magazine->loan_date }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loan Due</label>
                        <input type="date" class="form-control" name="loan_due" value="{{ $magazine->loan_due }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Review</label>
                        <input type="text" class="form-control" name="review" value="{{ $magazine->users->review}}">
                    </div> --}}
                    <input type="submit" value="Save" class="btn btn-outline-dark">
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- action itu formnya ke function mana di controller, method itu post, get, put, dll --}}