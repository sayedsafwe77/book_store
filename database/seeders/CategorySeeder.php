<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => json_encode(['en' => 'Politics', 'ar' => 'السياسة']),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode(['en' => 'Economy', 'ar' => 'الاقتصاد']),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode(['en' => 'Sports', 'ar' => 'الرياضة']),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode(['en' => 'Cars', 'ar' => 'السيارات']),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode(['en' => 'Technology', 'ar' => 'التكنولوجيا']),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode(['en' => 'Natural Sciences', 'ar' => 'العلوم الطبيعية']),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode(['en' => 'Religions', 'ar' => 'الأديان']),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode(['en' => 'Sciences', 'ar' => 'العلوم']),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode(['en' => 'Geology', 'ar' => 'علم الأرض']),
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}