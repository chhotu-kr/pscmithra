<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exam;
use App\Models\Study;
use App\Models\StudymetrialCategory;
use App\Models\StudymetrialChapter;

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
         $smca = [
            ['id' => '1','name' => 'IAS','image' => 'moj.png','slugid'=>'wvm24fd',],
            ['id' => '2','name' => 'MBA','image' => 'laravel.png','slugid'=>'qeqw634',],
            
            
         ];
         StudymetrialCategory::insert($smca);
         $chapter = [
            ['id' => '1','name' => 'Hindi','sm_categories_id' => '1','slugid'=>'wvrfv4fd',],
            ['id' => '2','name' => 'English','sm_categories_id' => '1','slugid'=>'wvm2xfd',],
            ['id' => '3','name' => 'GK','sm_categories_id' => '1','slugid'=>'wty24fd',],
            ['id' => '4','name' => 'BusinessStudy','sm_categories_id' => '2','slugid'=>'qvgw634',],
            ['id' => '5','name' => 'Accounts','sm_categories_id' => '2','slugid'=>'qeqfr34',],
            ['id' => '6','name' => 'EPS','sm_categories_id' => '2','slugid'=>'qtyw634',],
            
            
         ];
         StudymetrialChapter::insert($chapter);
         $sm = [
            ['id' => '1','slugid'=>'wvrfv4fd','sm_categories_id' => '1','name'=>'new','sm_chapters_id' => '1','content' => '`<h4>London is the capital city of England</h4>`',],
            ['id' => '2','slugid'=>'wvm2xfd','sm_categories_id' => '1','name'=>'new1','sm_chapters_id' => '1','content' => '`<h4>Each HTML heading has a default size</h4>`',],
            ['id' => '3','slugid'=>'wty24fd','sm_categories_id' => '2','name'=>'new2','sm_chapters_id' => '2','content' => '`<h4>It is important to use headings to show the document structure</h4>`',],
            ['id' => '4','slugid'=>'qvgw634','sm_categories_id' => '2','name'=>'new3','sm_chapters_id' => '2','content' => '`<h4>It is important to use headings to show the document structure</h4>`',],
            // ['id' => '5','slugid'=>'qeqfr34','sm_categories_id' => '2','sm_chapters_id' => '1',],
            // ['id' => '6','slugid'=>'qtyw634','sm_categories_id' => '2','sm_chapters_id' => '1',],
            
            
         ];
         Study::insert($sm);
    }
}
