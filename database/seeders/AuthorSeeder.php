<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Pdf;
use App\Models\Course;
use App\Models\Language;
use App\Models\LiveTest;
use App\Models\QuizCategory;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Author::factory()->times(20)->create();
        Pdf::factory()->times(20)->create();
        //  Course::factory()->times(20)->create();
        // QuizCategory::factory()->times(10)->create();
        // Language::factory()->times(10)->create();
        LiveTest::factory()->times(10)->create();
        
    }
}
