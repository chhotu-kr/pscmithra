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
            ['id' => '1','category' => 'Banking','slugid'=>'wer434fd',],
            ['id' => '2','category' => 'Railway','slugid'=>'werg55634',],
            ['id' => '3','category'=>'SSC','slugid'=>'wesfr0fd74',],
            ['id' => '4','category'=>'MTS','slugid'=>'wesfr0fd34',],
            ['id' => '5','category'=>'NEET','slugid'=>'wesfr2erd34',],
            ['id' => '6','category'=>'UPSC','slugid'=>'wesfr2erd3j',],
            ['id' => '7','category'=>'UPSC NDA','slugid'=>'435sfr2erd34',],
            ['id' => '8','category'=>'IBPS','slugid'=>'435sfr2erda4',],
           
            
         ];
         Category::insert($category);

        $subcategory = [
            ['id' => '1','category_id'=>'1','subcategory' => 'BankPO','slugid'=>'we00434fd',],
            ['id' => '2','category_id'=>'1','subcategory' => 'Clerk','slugid'=>'werg1q634',],
            ['id' => '3','category_id'=>'2','subcategory' => 'TT','slugid'=>'wec44fd',],
            ['id' => '4','category_id'=>'2','subcategory' => 'Junior Manager','slugid'=>'wer4b5634',],
            ['id' => '5','category_id' => '3','subcategory'=>'Assistent Officer','slugid'=>'wesqzfd74',],
            ['id' => '6','category_id' => '3','subcategory'=>'Sub Inspector','slugid'=>'wesf90hd34',],
            ['id' => '7','category_id' => '4','subcategory'=>'Chowkidar','slugid'=>'wesvnmfd74',],
            ['id' => '8','category_id' => '4','subcategory'=>'Junior Gestetner Operator','slugid'=>'wesxsdfd34',],
            ['id' => '9','category_id' => '5','subcategory'=>'MBBS','slugid'=>'wesfanmrd34',],
            ['id' => '10','category_id' => '5','subcategory'=>'Physian','slugid'=>'wesf1zbrd3j',],
            ['id' => '11','category_id' => '6','subcategory'=>'Cardologist','slugid'=>'westrerd34',],
            ['id' => '12','category_id' => '6','subcategory'=>'MS','slugid'=>'wes58rd3j',],
            ['id' => '13','category_id' => '7','subcategory'=>'DM','slugid'=>'435synrd34',],
            ['id' => '14','category_id' => '7','subcategory'=>'BDO','slugid'=>'435fh1rda4',],
            ['id' => '15','category_id' => '8','subcategory'=>'	UCO Bank ','slugid'=>'435sedc2erda4',],
            ['id' => '16','category_id' => '8','subcategory'=>'	Indian Bank ','slugid'=>'43wq1erda4',],
           
            
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
