<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
    \DB::table('users')->insert([
        
        [
            'id' => '4',
            'name' => 'Ueda',
            'email' => 'ueda0414@gmail.com',
            'password' => 'ueda@0414'
        ],
        
        [
            'id' => '5',
            'name' => 'Ohtani',
            'email' => 'ohtani0414@gmail.com',
            'password' => 'ohtani@0414'
        ],
        
        [
            'id' => '6',
            'name' => 'Yamada',
            'email' => 'yamada0414@gmail.com',
            'password' => 'yamada@0414'
        ],

     
        
        
        
    ]);
    }
}
