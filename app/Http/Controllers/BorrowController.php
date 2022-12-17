<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $books = Book::where('status', '0')->get();

        return view('borrows', compact('books'));
    }

    public function borrow($id) {
        $book = Book::findOrFail($id);

        $book->update([
            'status' => '3',
            'user_id' => Auth::user()->id
        ]);

        return redirect('/');
    }
    
    public function accept($id) {
        $book = Book::findOrFail($id);

        $book->update([
            'status' => '1',
            'loan_date' => Carbon::now()->format('Y-m-d H:i:s'),
            'loan_due' => Carbon::now()->addDays(7)->format('Y-m-d H:i:s')
        ]);

        return redirect('/');
    }
    
    public function cancel($id) {
        $book = Book::findOrFail($id);

        $book->update([
            'status' => '0',
            'user_id' => null,
            'loan_date' => null,
            'loan_due' => null
        ]);

        return redirect('/');
    }

    public function log() {
        $users = User::all();
        return view('log', compact('users'));
    }

    public function mybook() {
        $books = Book::where('user_id', Auth::id())->get();
        // $books = Book::all(); //ambil semua buku di table books
        return view('mybook', compact('books'));
    }
}
