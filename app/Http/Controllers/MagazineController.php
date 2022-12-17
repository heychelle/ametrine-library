<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagazineController extends Controller
{
    // Middleware kalo belum login ga bisa akses
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
        $magazines = Magazine::all(); //ambil semua buku di table books
        return view('magazine', compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.createMagazine'); //method pasti get, dia balikin view yang mana
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Magazine::create([
            'name' => $request->name, //yang kiri itu field db, yang kanan name dari input form
            'description' => $request->description,
            'status' => '0'
        ]);

        return redirect("magazines"); // method pasti bukan get, ga punya view jadi harus redirect ke view tertentu habis selesai jalanin semua function
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
        $magazine = Magazine::findOrFail($id); //cari buku yang id nya sesuai parameter

        return view('form.editMagazine', compact('magazine'));
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

        $magazine = Magazine::findOrFail($id);

        $magazine->update([
            'name' => $request->name, //yang kiri itu field db, yang kanan name dari input form
            'description' => $request->description,
            'status' => $request->status,
            'loan_date' => $request->loan_date,
            'loan_due' => $request->loan_due,
            'review' => $request->user_id->review,
        ]);

        // $magazine->reviews()->create(['review' => 'blah for topic', 'user_id' => Auth::id()]);


        return redirect("magazines");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magazine = Magazine::findOrFail($id);
        $magazine->delete();

        return redirect("magazines");
    }
}
