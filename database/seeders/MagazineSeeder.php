<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Magazine;
use Carbon\Carbon;

class MagazineSeeder extends Seeder
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

        $magazine = new Magazine();
        $magazine->user_id = 1;
        $magazine->name = 'Bobo';
        $magazine->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s';
        $magazine->status = '2';        
        $magazine->loan_date = Carbon::now()->format('Y-m-d H:i:s');
        $magazine->loan_due = Carbon::parse('2022-12-16');
        $magazine->save();

        $magazine = new Magazine();
        $magazine->name = 'Donald duck';
        $magazine->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s';
        $magazine->status = '0';
        $magazine->save();

        $magazine = new Magazine();
        $magazine->user_id = 2;
        $magazine->name = 'Vogue';
        $magazine->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s';
        $magazine->status = '3';
        $magazine->save();
    }
}
