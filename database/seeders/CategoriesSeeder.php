<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Fiction',
                'description' => 'Books that contain stories created from the imagination.',
            ],
            [
                'name' => 'Non-Fiction',
                'description' => 'Books that are based on real events and facts.',
            ],
            [
                'name' => 'Science Fiction',
                'description' => 'Books that explore futuristic concepts and advanced technology.',
            ],
            [
                'name' => 'Fantasy',
                'description' => 'Books that contain magical elements and fantastical worlds.',
            ],
        ]);
    }
}
