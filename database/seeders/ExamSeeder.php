<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exam;
use App\Models\Examination;
use App\Models\QuizExamination;
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
            ['id' => '4','examname' => 'Course Quiz','slugid'=>'wevb343tr4',],
            
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


            ['id' => '1','slugid'=>'wvrfv4fd','name'=>'content','sm_categories_id' => '1','sm_chapters_id' => '1','content' => '<html>

            <body>
            
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6>Heading 6</h6>
            
            </body>
            </html>
            ',],

            ['id' => '2','slugid'=>'wvm2xfd','name'=>'audio','sm_categories_id' => '1','sm_chapters_id' => '1','content' => '<html>
            <body>
            
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6>Heading 6</h6>
            
            </body>
            </html>',],

            ['id' => '3','slugid'=>'wty24fd','name'=>'video','sm_categories_id' => '2','sm_chapters_id' => '2','content' => '<html>

            <body>
            
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6>Heading 6</h6>
            
            </body>
            </html>',],

            ['id' => '4','slugid'=>'qvgw634','name'=>'pdf','sm_categories_id' => '2','sm_chapters_id' => '2','content' => '<html>

            <body>
            
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            <h4>Heading 4</h4>
            <h5>Heading 5</h5>
            <h6>Heading 6</h6>
            
            </body>
            </html>'],

            
         ];
         Study::insert($sm);

         // $examination=[
         //   ['id'=>'1','category_id'=>'1','subcategory_id'=>'1','exam_name'=>'ACEE','slugid'=>'asdf123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //   ['id'=>'2','category_id'=>'1','subcategory_id'=>'1','exam_name'=>'AIEED','slugid'=>'lkj123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //   ['id'=>'3','category_id'=>'1','subcategory_id'=>'1','exam_name'=>'ATMA','slugid'=>'lkjh123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //   ['id'=>'4','category_id'=>'1','subcategory_id'=>'1','exam_name'=>'APPSC','slugid'=>'lkjhG123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'60','isFree'=>'true','type'=>'not'],
         //   ['id'=>'5','category_id'=>'2','subcategory_id'=>'2','exam_name'=>'NTPC','slugid'=>'asdfg123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'live'],
         //   ['id'=>'6','category_id'=>'2','subcategory_id'=>'2','exam_name'=>'RRB GROUPD','slugid'=>'a2d3fg123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'60','isFree'=>'true','type'=>'live'],
         //   ['id'=>'7','category_id'=>'2','subcategory_id'=>'2','exam_name'=>'RRBJE','slugid'=>'QW123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'60','isFree'=>'true','type'=>'live'],
         //   ['id'=>'8','category_id'=>'2','subcategory_id'=>'2','exam_name'=>'RRBALP','slugid'=>'QWer123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //   ['id'=>'9','category_id'=>'3','subcategory_id'=>'3','exam_name'=>'SSCGD','slugid'=>'QWer123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //   ['id'=>'10','category_id'=>'3','subcategory_id'=>'3','exam_name'=>'SSC CHSL','slugid'=>'QWerT1203','marks'=>'200','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //   ['id'=>'11','category_id'=>'3','subcategory_id'=>'3','exam_name'=>'SSC CPO','slugid'=>'QrT1203','marks'=>'200','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'false','type'=>'live'],
         //   ['id'=>'12','category_id'=>'4','subcategory_id'=>'4','exam_name'=>'CSE','slugid'=>'QUY1203','marks'=>'150','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'false','type'=>'live'],
         //   ['id'=>'13','category_id'=>'4','subcategory_id'=>'4','exam_name'=>'CAT','slugid'=>'QRV1203','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'live'],
         //   ['id'=>'14','category_id'=>'4','subcategory_id'=>'4','exam_name'=>'CDS','slugid'=>'QTYU12','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'live'],
         //   ['id'=>'15','category_id'=>'4','subcategory_id'=>'4','exam_name'=>'ESE','slugid'=>'QTYxcU12','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //   ['id'=>'16','category_id'=>'4','subcategory_id'=>'4','exam_name'=>'IBPS PO','slugid'=>'LKJxcU12','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //   ['id'=>'17','category_id'=>'4','subcategory_id'=>'4','exam_name'=>'IBPS SO','slugid'=>'ZXCcU12','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //   ['id'=>'18','category_id'=>'5','subcategory_id'=>'5','exam_name'=>'JEE','slugid'=>'lkhgfcU12','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //   ['id'=>'19','category_id'=>'5','subcategory_id'=>'5','exam_name'=>'JEE MAIN','slugid'=>'FRTfcU12','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //   ['id'=>'20','category_id'=>'5','subcategory_id'=>'5','exam_name'=>'JEE ADV','slugid'=>'FRTfcU12','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         // ];

         // Examination::insert($examination);

         // $quizexamination=[
         //    ['id'=>'1','quiz_categories_id'=>'1','quiz_sub_categories_id'=>'1','quiz_chapters_id'=>'1','quiz_topics_id'=>'1','exam_name'=>'ACEE','slugid'=>'asdf123','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //    ['id'=>'2','quiz_categories_id'=>'1','quiz_sub_categories_id'=>'1','quiz_chapters_id'=>'1','quiz_topics_id'=>'1','exam_name'=>'AIEED','slugid'=>'lkj123','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //    ['id'=>'3','quiz_categories_id'=>'1','quiz_sub_categories_id'=>'1','quiz_chapters_id'=>'1','quiz_topics_id'=>'1','exam_name'=>'ATMA','slugid'=>'lkjh123','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //    ['id'=>'4','quiz_categories_id'=>'1','quiz_sub_categories_id'=>'1','quiz_chapters_id'=>'1','quiz_topics_id'=>'1','exam_name'=>'APPSC','slugid'=>'lkjhG123','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'60','isFree'=>'true','type'=>'not'],
         //    ['id'=>'5','quiz_categories_id'=>'2','quiz_sub_categories_id'=>'2','quiz_chapters_id'=>'2','quiz_topics_id'=>'2','exam_name'=>'NTPC','slugid'=>'asdfg123','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'live'],
         //    ['id'=>'6','quiz_categories_id'=>'2','quiz_sub_categories_id'=>'2','quiz_chapters_id'=>'2','quiz_topics_id'=>'2','exam_name'=>'RRB GROUPD','slugid'=>'a2d3fg123','marks'=>'100','noQues'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'60','isFree'=>'true','type'=>'live'],
         //    ['id'=>'7','quiz_categories_id'=>'2','quiz_sub_categories_id'=>'2','quiz_chapters_id'=>'2','quiz_topics_id'=>'2','exam_name'=>'RRBJE','slugid'=>'QW123','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'60','isFree'=>'true','type'=>'live'],
         //    ['id'=>'8','quiz_categories_id'=>'2','quiz_sub_categories_id'=>'2','quiz_chapters_id'=>'2','quiz_topics_id'=>'2','exam_name'=>'RRBALP','slugid'=>'QWer123','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //    ['id'=>'9','quiz_categories_id'=>'3','quiz_sub_categories_id'=>'3','quiz_chapters_id'=>'3','quiz_topics_id'=>'3','exam_name'=>'SSCGD','slugid'=>'QWer123','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //    ['id'=>'10','quiz_categories_id'=>'3','quiz_sub_categories_id'=>'3','quiz_chapters_id'=>'3','quiz_topics_id'=>'3','exam_name'=>'SSC CHSL','slugid'=>'QWerT1203','marks'=>'200','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'true','type'=>'live'],
         //    ['id'=>'11','quiz_categories_id'=>'3','quiz_sub_categories_id'=>'3','quiz_chapters_id'=>'3','quiz_topics_id'=>'3','exam_name'=>'SSC CPO','slugid'=>'QrT1203','marks'=>'200','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'false','type'=>'live'],
         //    ['id'=>'12','quiz_categories_id'=>'4','quiz_sub_categories_id'=>'4','quiz_chapters_id'=>'4','quiz_topics_id'=>'4','exam_name'=>'CSE','slugid'=>'QUY1203','marks'=>'150','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'80','isFree'=>'false','type'=>'live'],
         //    ['id'=>'13','quiz_categories_id'=>'4','quiz_sub_categories_id'=>'4','quiz_chapters_id'=>'4','quiz_topics_id'=>'4','exam_name'=>'CAT','slugid'=>'QRV1203','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'live'],
         //    ['id'=>'14','quiz_categories_id'=>'4','quiz_sub_categories_id'=>'4','quiz_chapters_id'=>'4','quiz_topics_id'=>'4','exam_name'=>'CDS','slugid'=>'QTYU12','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'live'],
         //    ['id'=>'15','quiz_categories_id'=>'4','quiz_sub_categories_id'=>'4','quiz_chapters_id'=>'4','quiz_topics_id'=>'4','exam_name'=>'ESE','slugid'=>'QTYxcU12','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //    ['id'=>'16','quiz_categories_id'=>'4','quiz_sub_categories_id'=>'4','quiz_chapters_id'=>'4','quiz_topics_id'=>'4','exam_name'=>'IBPS PO','slugid'=>'LKJxcU12','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //    ['id'=>'17','quiz_categories_id'=>'4','quiz_sub_categories_id'=>'4','quiz_chapters_id'=>'4','quiz_topics_id'=>'4','exam_name'=>'IBPS SO','slugid'=>'ZXCcU12','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //    ['id'=>'18','quiz_categories_id'=>'5','quiz_sub_categories_id'=>'5','quiz_chapters_id'=>'5','quiz_topics_id'=>'5','exam_name'=>'JEE','slugid'=>'lkhgfcU12','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //    ['id'=>'19','quiz_categories_id'=>'5','quiz_sub_categories_id'=>'5','quiz_chapters_id'=>'5','quiz_topics_id'=>'5','exam_name'=>'JEE MAIN','slugid'=>'FRTfcU12','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //    ['id'=>'20','quiz_categories_id'=>'5','quiz_sub_categories_id'=>'5','quiz_chapters_id'=>'5','quiz_topics_id'=>'5','exam_name'=>'JEE ADV','slugid'=>'FRTfcU12','marks'=>'100','noquizques'=>'100','rightmarks'=>'1','wrongmarks'=>'1','time_duration'=>'70','isFree'=>'true','type'=>'not'],
         //  ];
 
         //  QuizExamination::insert($quizexamination);
    }
}
