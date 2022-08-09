<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Subject;
use App\Models\Topic;
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
