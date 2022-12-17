<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all(); //ambil semua buku di table books
        return view('home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.createBook'); //method pasti get, dia balikin view yang mana
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Book::create([
            'name' => $request->name, //yang kiri itu field db, yang kanan name dari input form
            'description' => $request->description,
            'genre' => $request->genre,
            'status' => '0'
        ]);

        return redirect('/'); // method pasti bukan get, ga punya view jadi harus redirect ke view tertentu habis selesai jalanin semua function
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id); //cari buku yang id nya sesuai parameter

        return view('form.editBook', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->update([
            'name' => $request->name, //yang kiri itu field db, yang kanan name dari input form
            'description' => $request->description,
            'genre' => $request->genre,
            'status' => $request->status,
            'loan_date' => $request->loan_date,
            'loan_due' => $request->loan_due,
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect("/");
    }
}
