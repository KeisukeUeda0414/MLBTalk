<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
    \DB::table('teams')->insert([
        
         [
            'id' => '4',
            'team_name' => 'Boston Red Sox',
            
         ],
     
    ]);
    }
}
