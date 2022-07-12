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
        ];

        User::create($user);

        $admin = [
            [ 'name' => 'admin', 'email' => 'admin@gmail.com', 'contact' => '9534843305',
            'password' => bcrypt('password'),],

            [ 'name' => 'Editor', 'email' => 'editor@gmail.com', 'contact' => '6209460649',
            'password' => bcrypt('password'),],

            [ 'name' => 'Author', 'email' => 'author@gmail.com', 'contact' => '9263096585',
            'password' => bcrypt('password'),],
            
           
           
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
