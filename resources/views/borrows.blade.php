@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-10">
            <h1>Borrow Request</h1>
            {{-- <h5>Magazine is not allowed to be borrowed</h5> --}}
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->name }}</td>
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
                                <button type="button" data-bs-toggle="modal" data-bs-target="#borrowModal" data-bs-id="{{ $book->id }}" class="btn btn-outline-primary">Borrow</button>
                                <div class="modal fade" id="borrowModal" tabindex="-1" aria-labelledby="borrowModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Borrow Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to borrow this book?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="/borrow/{{ $book->id }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Borrow</button>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
