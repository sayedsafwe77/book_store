<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseUrl = 'https://gutendex.com/books';
        $page = 1;
        $totalPages = 1000;
        $maxNameLength = 255;

        while ($page <= $totalPages) {
            $response = Http::get($baseUrl, [
                'page' => $page,
            ]);

            if ($response->successful()) {
                $books = $response->json('results');
                foreach ($books as $bookData) {
                    if (!isset($bookData['title']) || !isset($bookData['authors'])) {
                        continue;
                    }
                    $title = mb_strimwidth($bookData['title'], 0, $maxNameLength, '');

                    $image = $bookData['formats']['image/jpeg'] ?? null;
                    $description = $bookData['subjects'] ? implode(', ', $bookData['subjects']) : 'No description available.';
                    $slug = Str::slug($title);
                    $quantity = random_int(1, 50);
                    $rate = round(mt_rand(30, 50) / 10, 1);
                    $publishYear = $bookData['download_count'] ? date('Y') - random_int(0, 100) : null;
                    $price = random_int(10, 100);
                    $isAvailable = (bool)random_int(0, 1);

                    $category = Category::inRandomOrder()->first();
                    $publisher = Publisher::inRandomOrder()->first();
                    $author = Author::inRandomOrder()->first();

                    $book = Book::create([
                        'name' => $title,
                        'description' => $description,
                        'slug' => $slug,
                        'quantity' => $quantity,
                        'rate' => $rate,
                        'publish_year' => $publishYear,
                        'price' => $price,
                        'is_available' => $isAvailable,
                        'category_id' => $category ? $category->id : null,
                        'publisher_id' => $publisher->id,
                        'author_id' => $author->id,
                    ]);
                    if($image){
                        $book->addMediaFromUrl($image)->toMediaCollection('image');
                    }
                }
            } else {
                $this->command->error("Failed to fetch data for page $page.");
                break;
            }

            $page++;
        }

        $this->command->info("Books from $page pages seeded successfully!");
    }
}
