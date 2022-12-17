<?php

namespace Database\Seeders;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //genre: 0-> fantasy, 1-> mystery, 2-> horror
        //status: 0-> avail, 1-> borrowed, 2-> due, 3->booked

        $book = new Book();
        $book->user_id = 1;
        $book->name = 'Harry Potter';
        $book->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s';
        $book->genre = '0';
        $book->status = '2';        
        $book->loan_date = Carbon::now()->format('Y-m-d H:i:s');
        $book->loan_due = Carbon::parse('2022-12-16');
        $book->save();

        $book = new Book();
        $book->name = 'Sherlock';
        $book->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s';
        $book->genre = '1';
        $book->status = '0';
        $book->save();

        $book = new Book();
        $book->user_id = 2;
        $book->name = 'Annabelle';
        $book->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s';
        $book->genre = '3';
        $book->status = '3';
        $book->save();
    }
}
