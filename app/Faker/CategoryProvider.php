<?php

namespace App\Faker;

use Faker\Provider\Base;

class CategoryProvider extends Base
{
    protected static $usedCategories = [];

    protected static $categories = [
        ['en' => 'Fiction', 'ar' => 'روايات'],
        ['en' => 'Non-Fiction', 'ar' => 'غير روائية'],
        ['en' => 'Science Fiction', 'ar' => 'خيال علمي'],
        ['en' => 'Fantasy', 'ar' => 'خيال'],
        ['en' => 'Mystery & Thriller', 'ar' => 'غموض وإثارة'],
        ['en' => 'Biography & Memoir', 'ar' => 'سير ذاتية ومذكرات'],
        ['en' => 'Self-Help', 'ar' => 'تنمية ذاتية'],
        ['en' => 'Children\'s Books', 'ar' => 'كتب الأطفال'],
        ['en' => 'History', 'ar' => 'تاريخ'],
        ['en' => 'Cookbooks', 'ar' => 'كتب الطبخ'],
        ['en' => 'Poetry', 'ar' => 'شعر'],
        ['en' => 'Romance', 'ar' => 'رومانسية'],
        ['en' => 'Horror', 'ar' => 'رعب'],
        ['en' => 'Graphic Novels & Comics', 'ar' => 'روايات مصورة وكوميك'],
        ['en' => 'Religion & Spirituality', 'ar' => 'دين وروحانيات'],
        ['en' => 'Art & Photography', 'ar' => 'فن وتصوير'],
        ['en' => 'Travel', 'ar' => 'سفر'],
        ['en' => 'Health & Fitness', 'ar' => 'صحة ولياقة'],
        ['en' => 'Science & Technology', 'ar' => 'علوم وتقنية'],
        ['en' => 'Business & Economics', 'ar' => 'أعمال واقتصاد'],
        ['en' => 'Philosophy', 'ar' => 'فلسفة'],
        ['en' => 'Music', 'ar' => 'موسيقى'],
        ['en' => 'Politics', 'ar' => 'سياسة'],
        ['en' => 'Law', 'ar' => 'قانون'],
        ['en' => 'Psychology', 'ar' => 'علم النفس'],
        ['en' => 'Education', 'ar' => 'تعليم'],
        ['en' => 'Computing', 'ar' => 'حوسبة'],
        ['en' => 'Environment', 'ar' => 'بيئة'],
        ['en' => 'Nature', 'ar' => 'طبيعة'],
        ['en' => 'Sports', 'ar' => 'رياضة'],
        ['en' => 'Fashion', 'ar' => 'موضة'],
        ['en' => 'Art History', 'ar' => 'تاريخ الفن'],
        ['en' => 'Cultural Studies', 'ar' => 'دراسات ثقافية'],
        ['en' => 'Architecture', 'ar' => 'هندسة معمارية'],
        ['en' => 'Graphic Design', 'ar' => 'تصميم جرافيكي'],
        ['en' => 'Social Sciences', 'ar' => 'علوم اجتماعية'],
        ['en' => 'Technology', 'ar' => 'تقنية'],
        ['en' => 'Marketing', 'ar' => 'تسويق'],
        ['en' => 'Journalism', 'ar' => 'صحافة'],
        ['en' => 'Photography', 'ar' => 'تصوير'],
        ['en' => 'Theater', 'ar' => 'مسرح'],
        ['en' => 'Poetry', 'ar' => 'شعر'],
        ['en' => 'Short Stories', 'ar' => 'قصص قصيرة'],
        ['en' => 'Mythology', 'ar' => 'أساطير'],
        ['en' => 'Classics', 'ar' => 'كلاسيكيات'],
        ['en' => 'Anthropology', 'ar' => 'أنثروبولوجيا'],
        ['en' => 'Sociology', 'ar' => 'سوسيولوجيا'],
        ['en' => 'Geography', 'ar' => 'جغرافيا'],
        ['en' => 'Astrology', 'ar' => 'فلك'],
        ['en' => 'Linguistics', 'ar' => 'لسانيات'],
        ['en' => 'Travel Guides', 'ar' => 'دليل السفر'],
        ['en' => 'Adventure', 'ar' => 'مغامرة'],
        ['en' => 'Fantasy Literature', 'ar' => 'أدب الخيال'],
        ['en' => 'Dystopian Fiction', 'ar' => 'خيال ديستوبي'],
        ['en' => 'Satire', 'ar' => 'سخرية'],
        ['en' => 'Humor', 'ar' => 'فكاهة'],
        ['en' => 'True Crime', 'ar' => 'جريمة حقيقية'],
        ['en' => 'Urban Fiction', 'ar' => 'أدب حضري'],
        ['en' => 'Young Adult', 'ar' => 'شبابي'],
        ['en' => 'Children\'s Literature', 'ar' => 'أدب الأطفال'],
        ['en' => 'Historical Fiction', 'ar' => 'رواية تاريخية'],
        ['en' => 'Graphic Novels', 'ar' => 'روايات مصورة'],
        ['en' => 'Romantic Fiction', 'ar' => 'أدب رومانسي'],
        ['en' => 'Literary Fiction', 'ar' => 'أدب أدبي'],
    ];


    public function uniqueCategoryName()
    {
        $available = array_filter(static::$categories, function ($category) {
            return !in_array($category['en'], static::$usedCategories);
        });

        if (empty($available)) {
            // throw new \Exception("No unique categories left.");
            static::$usedCategories = [];  // Reset the used categories
            $available = static::$categories;  // Reset the available categories
        }

        $category = static::randomElement($available);
        static::$usedCategories[] = $category['en'];

        return [
            'en' => $category['en'],
            'ar' => $category['ar']
        ];
    }

    public function uniqueCategoryNameEn()
    {
        $available = array_diff(array_column(static::$categories, 'en'), static::$usedCategories);

        if (empty($available)) {
            throw new \Exception("No unique categories left.");
        }

        $category = static::randomElement($available);
        static::$usedCategories[] = $category;

        return $category;
    }
    public function uniqueCategoryNameAr()
    {
        $available = array_diff(array_column(static::$categories, 'ar'), static::$usedCategories);

        if (empty($available)) {
            throw new \Exception("No unique categories left.");
        }

        $category = static::randomElement($available);
        static::$usedCategories[] = $category;

        return $category;
    }
}
