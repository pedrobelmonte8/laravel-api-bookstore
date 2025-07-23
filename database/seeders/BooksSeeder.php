<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'published_date' => '1925-04-10',
                'isbn' => '9780743273565',
                'category_id' => 2, // Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'A Brief History of Time',
                'author' => 'Stephen Hawking',
                'published_date' => '1988-04-01',
                'isbn' => '9780553380163',
                'category_id' => 1, // Non-Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dune',
                'author' => 'Frank Herbert',
                'published_date' => '1965-08-01',
                'isbn' => '9780441013593',
                'category_id' => 4, // Science Fiction
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'published_date' => '1937-09-21',
                'isbn' => '9780547928227',
                'category_id' => 5, // Fantasy
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
