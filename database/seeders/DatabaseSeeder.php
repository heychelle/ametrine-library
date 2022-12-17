<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Magazine;
use App\Models\Book;
use App\Models\Review;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $faker = Faker::create();

        // foreach ((range(1, 20)) as $index) {
        //     $post = Book::create([
        //         'name' => $faker->unique()->name
        //     ]);
    
        //     $post = Magazine::create([
        //         'name' => $faker->unique()->name
        //     ]);
    
        //     $post = Review::create([
        //         'name' => $faker->unique()->name
        //     ]);
    
        // }
    
        // foreach ((range(1, 3)) as $index) {
        //     DB::table('reviews')->insert(
        //         [
        //             'id' => rand(1, 20),
        //             'user_id' => rand(1, 3),
        //             'reviewable' => rand(0, 1) == 1 ? 'App\Book' : 'App\Magazine'
        //         ]
        //     );
    
        // }

        $this->call([
            UserSeeder::class,
            BookSeeder::class,
            MagazineSeeder::class,
        ]);
    }
}
