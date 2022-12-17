@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">        
            <div class="col-md-8">
                <h1>Edit Book</h1>
                <form action="{{ route('books.update', $book->id) }}" method="POST"> 
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $book->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description">{{ $book->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genre</label>
                        <select name="genre" id="" class="form-select">
                            <option value="0" @if ($book->genre == '0') selected @endif>Mystery</option>
                            <option value="1" @if ($book->genre == '1') selected @endif>Fantasy</option>
                            <option value="2" @if ($book->genre == '2') selected @endif>Horror</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" id="" class="form-select">
                            <option value="0" @if ($book->status == '0') selected @endif>Available</option>
                            <option value="1" @if ($book->status == '1') selected @endif>Borrowed</option>
                            <option value="2" @if ($book->status == '2') selected @endif>Due</option>
                            <option value="3" @if ($book->status == '3') selected @endif>Booked</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loan Date</label>
                        <input type="date" class="form-control" name="loan_date" value="{{ $book->loan_date }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loan Due</label>
                        <input type="date" class="form-control" name="loan_due" value="{{ $book->loan_due }}">
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Review</label>
                        <input type="text" class="form-control" name="review" value="{{ $book->users->review}}">
                    </div> --}}
                    <input type="submit" value="Save" class="btn btn-outline-dark">
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- action itu formnya ke function mana di controller, method itu post, get, put, dll --}}