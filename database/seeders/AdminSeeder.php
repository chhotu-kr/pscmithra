<?php

namespace Database\Seeders;
use App\Models\{User,Admin,Role,Permission};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'contact' => '6209460649',
            'password' => bcrypt('12345678'),
            'slugid' =>'21eraxyade79z'
        ];

        User::create($user);

        $admin = [
            [ 'name' => 'admin', 'email' => 'admin@gmail.com', 'contact' => '9534843305',
            'password' => bcrypt('password'),'slugid' =>'356eiuxyade89w'],

            [ 'name' => 'Editor', 'email' => 'editor@gmail.com', 'contact' => '6209460649',
            'password' => bcrypt('password'),'slugid' =>'34erret65ydre',],

            [ 'name' => 'Author', 'email' => 'author@gmail.com', 'contact' => '9263096585',
            'password' => bcrypt('password'),'slugid' =>'34errxyade89w'],
            
           
           
        ];

        Admin::insert($admin);

        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author'],
        ]);

       Permission::insert([
            ['name'=>'Add Post','slug'=>'add-post'],
            ['name'=>'Delete Post','slug'=>'delete-post'],
           
            ['name'=>'Add Question','slug'=>'add-question'],
            ['name'=>'Delete Question','slug'=>'delete-question'],
            ['name'=>'Edit Question','slug'=>'edit-question'],
            ['name'=>'View Question','slug'=>'view-question'],

            ['name'=>'Add examination','slug'=>'add-examination'],
            ['name'=>'Delete examination','slug'=>'delete-examination'],
            ['name'=>'Edit examination','slug'=>'edit-examination'],
            ['name'=>'View examination','slug'=>'view-examination'],

            ['name'=>'Add category','slug'=>'add-category'],
            ['name'=>'Delete category','slug'=>'delete-category'],
            ['name'=>'Edit category','slug'=>'edit-category'],
            ['name'=>'View category','slug'=>'view-category'],
           

            ['name'=>'Add subcategory','slug'=>'add-subcategory'],
            ['name'=>'Delete subcategory','slug'=>'delete-subcategory'],
            ['name'=>'Edit subcategory','slug'=>'edit-subcategory'],
            ['name'=>'View subcategory','slug'=>'view-subcategory'],

            ['name'=>'Add subject','slug'=>'add-subject'],
            ['name'=>'Delete subject','slug'=>'delete-subject'],
            ['name'=>'Edit subject','slug'=>'edit-subject'],
            ['name'=>'View subject','slug'=>'view-subject'],

            ['name'=>'Add topic','slug'=>'add-topic'],
            ['name'=>'Delete topic','slug'=>'delete-topic'],
            ['name'=>'Edit topic','slug'=>'edit-topic'],
            ['name'=>'View topic','slug'=>'view-topic'],

            ['name'=>'Add product','slug'=>'add-topic'],
            ['name'=>'Delete product','slug'=>'delete-product'],
            ['name'=>'Edit product','slug'=>'edit-product'],
            ['name'=>'View product','slug'=>'view-product'],
           
        ]);

        //Assign Role
        Admin::whereId(1)->first()->roles()->attach([1]);
        Admin::whereId(2)->first()->roles()->attach([2]);
         Admin::whereId(3)->first()->roles()->attach([3]);
       // Role has permission 
         Role::whereId(1)->first()->permissions()->attach([1,2]);
         Role::whereId(2)->first()->permissions()->attach([1]);
         Role::whereId(3)->first()->permissions()->attach([1]);
    }
}
