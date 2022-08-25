<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\SecondQuestion;
use App\Models\Language;
class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $question = [
            ['id' => '1','subject_id'=>'1','topic_id'=>'1','name' => 'Sk','rightans'=>'option1','slugid'=>'wpqwd',],
            ['id' => '2','subject_id'=>'1','topic_id'=>'2','name' => 'Dk','rightans'=>'option4','slugid'=>'wertq634',],
            ['id' => '3','subject_id'=>'2','topic_id'=>'3','name' => 'Rk','rightans'=>'option1','slugid'=>'wqawxzsd',],
            ['id' => '4','subject_id'=>'2','topic_id'=>'4','name' => 'Rk','rightans'=>'option1','slugid'=>'wqawxzsd',],
            ['id' => '5','subject_id'=>'2','topic_id'=>'5','name' => 'Rk','rightans'=>'option2','slugid'=>'wqawxzsd',],
            // ['id' => '4','subject_id'=>'2','topic_id'=>'4','name' => 'Tk','rightans','slugid'=>'oip4fd',],
            // ['id' => '5','subject_id'=>'2','topic_id'=>'5','name' => 'Tk','rightans','slugid'=>'oip4fd',],
           
           
           
            
         ];
         Question::insert($question);

         $lang=[
            ['id'=>'1','languagename'=>'English','slugid'=>'e3455',],
            ['id'=>'2','languagename'=>'Hindi','slugid'=>'e3rt455',],
            ['id'=>'3','languagename'=>'Bangla','slugid'=>'e34hj55',],
            ['id'=>'4','languagename'=>'Urdu','slugid'=>'e345bn5',],
            ['id'=>'5','languagename'=>'Telgu','slugid'=>'e3q45w5',],
            ['id'=>'6','languagename'=>'French','slugid'=>'e3k4j55',],
            ['id'=>'7','languagename'=>'Nepali','slugid'=>'e3l45o5',],
         ];

         Language::insert($lang);

        $secquestion = [
            ['id' => '1','language_id'=>'1','question_id'=>'1','question'=>'What was the last phase in the poem?
            ','direction'=>'adfdwedlh','explanation'=>'lkjxcasdf','option1' => 'after her mother died','option2'=>'after she grown up','option3'=>'None of the above','option4'=>' after her mother grown up','slugid'=>'xzs23',],
            ['id' => '2','language_id'=>'1','question_id'=>'2','question'=>'The Chairman is ill and we will have to the meeting for a few days','direction'=>'adflh','explanation'=>'lasdf','option1' => 'Put on','option2'=>'Put of','option3'=>'Put away','option4'=>'Put off','slugid'=>'mnc908',],
            ['id' => '3','language_id'=>'1','question_id'=>'3','question'=>'What Epithet literary device was used in the poem?','direction'=>'adfdderlh','explanation'=>'lkjioasdf','option1' => 'Terribly transient','option2'=>' Through their','option3'=>'Both wry','option4'=>'Put off','slugid'=>'lkj34',],
            ['id' => '4','language_id'=>'1','question_id'=>'4','question'=>'What is the meaning of the word ‘wry’?','direction'=>'adfdxch','explanation'=>'lkjwqf','option1' => 'ironic','option2'=>'sad','option3'=>'Both wry','option4'=>' None of the above','slugid'=>'weq40d',],
            ['id' => '5','language_id'=>'1','question_id'=>'5','question'=>'After how many years did her mother laugh on seeing the photograph?','direction'=>'yetee','explanation'=>'wubvcn','option1' => 'twenty-one','option2'=>'twenty-three','option3'=>' twelve','option4'=>' None of the above','slugid'=>'wpq12wd',],
            // ['id' => '2','language_id'=>'1','question_id'=>'2','question'=>'The Chairman is ill and we will have to the meeting for a few days','name' => 'Dk','rightans','slugid'=>'wertq634',],
            // ['id' => '3','language_id'=>'2','question_id'=>'3','question'=>'The Chairman is ill and we will have to the meeting for a few days','name' => 'Rk','rightans','slugid'=>'wqasd',],
            // ['id' => '4','language_id'=>'2','question_id'=>'4','question'=>'The Chairman is ill and we will have to the meeting for a few days','name' => 'Tk','rightans','slugid'=>'oip4fd',],
            // ['id' => '5','language_id'=>'3','question_id'=>'5','question'=>'The Chairman is ill and we will have to the meeting for a few days','name' => 'Tk','rightans','slugid'=>'oip4fd',],
           
           
           
            
         ];
         SecondQuestion::insert($secquestion);
    }
}
