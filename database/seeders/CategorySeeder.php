<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\QuizCategory;
use App\Models\QuizSubCategory;
use App\Models\SubCategory;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\QuizTopic;
use App\Models\QuizChapter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      //
        $category = [
            ['id' => '1','category' => 'Banking','slugid'=>'wer434fd','image'=>'python.jpg'],
            ['id' => '2','category' => 'Railway','slugid'=>'werg55634','image'=>'django.jpg'],
            ['id' => '3','category'=>'SSC','slugid'=>'wesfr0fd74','image'=>'laravel.jpg'],
            ['id' => '4','category'=>'MTS','slugid'=>'wesfr0fd34','image'=>'django.jpg'],
            ['id' => '5','category'=>'NEET','slugid'=>'wesfr2erd34','image'=>'python.jpg'],
            ['id' => '6','category'=>'UPSC','slugid'=>'wesfr2erd3j','image'=>'laravel.jpg'],
            ['id' => '7','category'=>'UPSC NDA','slugid'=>'435sfr2erd34','image'=>'python.jpg'],
            ['id' => '8','category'=>'IBPS','slugid'=>'435sfr2erda4','image'=>'django.jpg'],
           
            
         ];
         Category::insert($category);

        $subcategory = [
            ['id' => '1','category_id'=>'1','subcategory' => 'BankPO','slugid'=>'we00434fd','image'=>'django.jpg'],
            ['id' => '2','category_id'=>'1','subcategory' => 'Clerk','slugid'=>'werg1q634','image'=>'laravel.jpg'],
            ['id' => '3','category_id'=>'2','subcategory' => 'TT','slugid'=>'wec44fd','image'=>'django.jpg'],
            ['id' => '4','category_id'=>'2','subcategory' => 'Junior Manager','slugid'=>'wer4b5634','image'=>'python.jpg'],
            ['id' => '5','category_id' => '3','subcategory'=>'Assistent Officer','slugid'=>'wesqzfd74','image'=>'python.jpg'],
            ['id' => '6','category_id' => '3','subcategory'=>'Sub Inspector','slugid'=>'wesf90hd34','image'=>'laravel.jpg'],
            ['id' => '7','category_id' => '4','subcategory'=>'Chowkidar','slugid'=>'wesvnmfd74','image'=>'laravel.jpg'],
            ['id' => '8','category_id' => '4','subcategory'=>'Junior Gestetner Operator','slugid'=>'wesxsdfd34','image'=>'django.jpg'],
            ['id' => '9','category_id' => '5','subcategory'=>'MBBS','slugid'=>'wesfanmrd34','image'=>'django.jpg'],
            ['id' => '10','category_id' => '5','subcategory'=>'Physian','slugid'=>'wesf1zbrd3j','image'=>'laravel.jpg'],
            ['id' => '11','category_id' => '6','subcategory'=>'Cardologist','slugid'=>'westrerd34','image'=>'django.jpg'],
            ['id' => '12','category_id' => '6','subcategory'=>'MS','slugid'=>'wes58rd3j','image'=>'laravel.jpg'],
            ['id' => '13','category_id' => '7','subcategory'=>'DM','slugid'=>'435synrd34','image'=>'django.jpg'],
            ['id' => '14','category_id' => '7','subcategory'=>'BDO','slugid'=>'435fh1rda4','image'=>'laravel.jpg'],
            ['id' => '15','category_id' => '8','subcategory'=>'	UCO Bank ','slugid'=>'435sedc2erda4','image'=>'laravel.jpg'],
            ['id' => '16','category_id' => '8','subcategory'=>'	Indian Bank ','slugid'=>'43wq1erda4','image'=>'django.jpg'],
           
            
         ];
         SubCategory::insert($subcategory);


         $quizcat = [
            ['id' => '1','name' => 'sssw','slugid'=>'wef4fd','image'=>'python.jpg'],
            ['id' => '2','name' => 'Railwayq','slugid'=>'wegg5634','image'=>'django.jpg'],
            ['id' => '3','name'=>'SSCx','slugid'=>'wrjh0fd74','image'=>'laravel.jpg'],
            ['id' => '4','name'=>'MTSd','slugid'=>'wryr34','image'=>'django.jpg'],
            ['id' => '5','name'=>'NEETdr','slugid'=>'wed34','image'=>'python.jpg'],
            ['id' => '6','name'=>'UPSCty','slugid'=>'wbvb2erd3j','image'=>'laravel.jpg'],
            ['id' => '7','name'=>'UPSC NDAb','slugid'=>'tr2erd34','image'=>'python.jpg'],
            ['id' => '8','name'=>'IBPSv','slugid'=>'43herda4','image'=>'django.jpg'],
           
            
         ];
         QuizCategory::insert($quizcat);

         $quizsubcat = [
            ['id' => '1','quiz_categories'=>'1','name' => 'BankPOq','slugid'=>'we220rtf34fd','image'=>'django.jpg'],
            ['id' => '2','quiz_categories'=>'1','name' => 'Clerkf','slugid'=>'werft7tf1q634','image'=>'laravel.jpg'],
            ['id' => '3','quiz_categories'=>'2','name' => 'TTgfg','slugid'=>'wertf464fd','image'=>'django.jpg'],
            ['id' => '4','quiz_categories'=>'2','name' => 'Juniorfgg Manager','slugid'=>'werr35tf5634','image'=>'python.jpg'],
            ['id' => '5','quiz_categories' => '3','name'=>'Assistffgent Officer','slugid'=>'rtfs45qzfd74','image'=>'python.jpg'],
            ['id' => '6','quiz_categories' => '3','name'=>'Sub Infggspector','slugid'=>'wesfr56tfhd34','image'=>'laravel.jpg'],
            ['id' => '7','quiz_categories' => '4','name'=>'Chowkidfgar','slugid'=>'wesvrt65ffd74','image'=>'laravel.jpg'],
            ['id' => '8','quiz_categories' => '4','name'=>'Junffffffior  Operator','slugid'=>'wertfs65dfd34','image'=>'django.jpg'],
            ['id' => '9','quiz_categories' => '5','name'=>'MBfgBS','slugid'=>'wertfanm566rd34','image'=>'django.jpg'],
            ['id' => '10','quiz_categoies' => '5','name'=>'Phyfgsian','slugid'=>'wertf541zbrd3j','image'=>'laravel.jpg'],
           
           
            
         ];
         QuizSubCategory::insert($quizsubcat);

         $chapter = [
            ['id' => '1','quiz_sub_categories'=>'1','name' => 'Noun','slugid'=>'wvqwf34fd',],
            ['id' => '2','quiz_sub_categories'=>'1','name' => 'Pronoun','slugid'=>'werereqw634',],
            ['id' => '3','quiz_sub_categories'=>'2','name' => 'Algebra','slugid'=>'wqw634',],
            ['id' => '4','quiz_sub_categories'=>'2','name' => 'Variable','slugid'=>'wqw6tye34',],
            
           
            
         ];
      QuizChapter::insert($chapter);


      $topic = [
         ['id' => '1','quiz_chapters'=>'1','name' => 'proper noun','slugid'=>'wuyf34fd',],
         ['id' => '2','quiz_chapters'=>'1','name' => 'Personal pronoun','slugid'=>'wlkeqw634',],
         
        
         
      ];
   QuizTopic::insert($topic);
       
          

      

         
        $sub = [
            ['id' => '1','sub_name' => 'Math','image' => 'putin.png','slugid'=>'wvf34fd',],
            ['id' => '2','sub_name' => 'English','image' => 'table.png','slugid'=>'weqw634',],
            
           
            
         ];
       Subject::insert($sub);

       $topic = [
        ['id' => '1','subject_id' => '1','topic_name' => 'Algebra',],
        ['id' => '2','subject_id' => '1','topic_name' => 'SetTheory',],
        ['id' => '3','subject_id' => '2','topic_name' => 'Noun',],
        ['id' => '4','subject_id' => '2','topic_name' => 'Artical',],
        ['id' => '5','subject_id' => '2','topic_name' => 'Tense',],
        
       
        
     ];
   Topic::insert($topic);

      
   
    }
}
