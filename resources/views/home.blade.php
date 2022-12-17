@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-10">
            <h1>Books</h1>
            @if (Auth::user()->role == '0')
                <a href="{{ route('books.create') }}" class="btn btn-outline-success">Create</a>
            @endif
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Borrower</th>
                        <th>Description</th>
                        <th>Genre</th>
                        <th>Status</th>
                        <th>Loan Date</th>
                        <th>Loan Due</th>
                        @if (Auth::user()->role == '0')
                            <th>Action</th>
                        @endif
                        @if (Auth::user()->role == '0')
                            <th>Request</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->name }}</td>
                            <td>
                                @if (!empty($book->users->name))
                                    {{ $book->users->name }}
                                @endif
                            </td>
                            <td>{{ $book->description }}</td>
                            <td>
                                @if ($book->genre == 0)
                                    Mystery
                                @elseif ($book->genre == 1)
                                    Fantasy
                                @else
                                    Horror 
                                @endif
                            </td>
                            <td>
                                @if ($book->status == 0)
                                    Available
                                @elseif ($book->status == 1)
                                    Borrowed
                                @elseif ($book->status == 2)
                                    Due
                                @else
                                    Booked 
                                @endif
                            </td>
                            <td>{{ $book->loan_date }}</td>
                            <td>{{ $book->loan_due }}</td>
                            @if (Auth::user()->role == '0')
                            <td>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-warning">Edit</a>  
                                <button type="button" class="btn btn-outline-danger mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>                               
                            </td>
                            @endif
                            @if (Auth::user()->role == '0')
                            <td>
                                @if ($book->status == "3")
                                <button type="button" data-bs-toggle="modal" data-bs-target="#acceptModal" data-bs-id="{{ $book->id }}" class="btn btn-outline-primary">Accept</button>
                                <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Accept Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to accept this borrow request?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="/accept/{{ $book->id }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Accept</button>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#cancelModal" data-bs-id="{{ $book->id }}" class="btn btn-outline-danger mt-1">Cancel</button>
                                <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cancel Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to cancel this borrow request?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="/cancel/{{ $book->id }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif                                
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure to delete this book?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
