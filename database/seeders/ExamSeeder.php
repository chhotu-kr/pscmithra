<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exam;
class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          
        $exam = [
            ['id' => '1','examname' => 'Mock Test','slugid'=>'wer43434',],
            ['id' => '2','examname' => 'Quiz','slugid'=>'wesfr3434',],
            ['id' => '3','examname' => 'Live Exam','slugid'=>'wesfr34fd34',],
            ['id' => '4','examname' => 'Course Quiz','slugid'=>'wevb3434',],
            
         ];
 
         Exam::insert($exam);
 
    }
}
