<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Http::get('https://fakerapi.it/api/v1/books?_quantity=100');
        
        if($books->ok()){
            Book::insert($books->json()['data']);
        }
    }
}
