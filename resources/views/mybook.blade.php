@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-10">
            <h1>My Book</h1>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Genre</th>
                        <th>Loan Date</th>
                        <th>Loan Due</th>
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
                            <td>{{ $book->loan_date }}</td>
                            <td>{{ $book->loan_due }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
