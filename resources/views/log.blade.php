@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-10">
            <h1>Log</h1>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Books Status</th>
                        <th>Borrowed Books</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->books as $book)
                                <li>
                                    @if ($book->status == 0)
                                        Available
                                    @elseif ($book->status == 1)
                                        Borrowed
                                    @elseif ($book->status == 2)
                                        Due
                                    @elseif ($book->status == 3)
                                        Booked
                                    @endif
                                </li>
                                @endforeach
                                </td>
                            <td>
                            @foreach ($user->books as $book)
                                <li>{{ $book->name }} (due: {{ $book->loan_due }})</li>
                            @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
@endsection