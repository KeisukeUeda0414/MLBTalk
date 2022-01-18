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
            'id' => '1',
            'team_name' => 'Arizona Diamondbacks',
            'team_color' => '#a71930'
        ],
        
        [
            'id' => '2',
            'team_name' => 'Atlanta Braves',
            'team_color' => '#0b233f'
        ],
        
        [
            'id' => '3',
            'team_name' => 'Baltimore Orioles',
            'team_color' => '#df4500'
        ],
        
        [
            'id' => '4',
            'team_name' => 'Boston Red Sox',
            'team_color' => '#bd3039'
        ],
        
        [
            'id' => '5',
            'team_name' => 'Chicago Cubs',
            'team_color' => '#0d3386'
        ],
        
        [
            'id' => '6',
            'team_name' => 'Chicago White Sox',
            'team_color' => '#000000'
        ],
        
        [
            'id' => '7',
            'team_name' => 'Cinicinnati Reds',
            'team_color' => '#c6001f'
        ],
        
        [
            'id' => '8',
            'team_name' => 'Cleveland Guardians',
            'team_color' => '#002b5b'
        ],
        
        [
            'id' => '9',
            'team_name' => 'Colorado Rockies',
            'team_color' => '#33006f'
        ],
        
        [
            'id' => '10',
            'team_name' => 'Detroit Tigers',
            'team_color' => '#0c2c56'
        ],
        
        [
            'id' => '11',
            'team_name' => 'Houston Astros',
            'team_color' => '#f4720e'
        ],
        
        [
            'id' => '12',
            'team_name' => 'Kansas City Royals',
            'team_color' => '#004586'
        ],
        
        [
            'id' => '13',
            'team_name' => 'Los Angeles Angels',
            'team_color' => '#ba0021'
        ],
        
        [
            'id' => '14',
            'team_name' => 'Los Angeles Dogers',
            'team_color' => '#00599c'
        ],
        
        [
            'id' => '15',
            'team_name' => 'Miami Marlins',
            'team_color' => '#1094c8'
        ],
        
        [
            'id' => '16',
            'team_name' => 'Milwaukee Brewers',
            'team_color' => '#10284b'
        ],
        
        [
            'id' => '17',
            'team_name' => 'Minnesota Twins',
            'team_color' => '#002b5b'
        ],
        
        [
            'id' => '18',
            'team_name' => 'New York Mets',
            'team_color' => '#ff590e'
        ],
        
        [
            'id' => '19',
            'team_name' => 'New York Yankees',
            'team_color' => '#122347'
        ],
        
        [
            'id' => '20',
            'team_name' => 'Oakland Athletics',
            'team_color' => '#003831'
        ],
        
        [
            'id' => '21',
            'team_name' => 'Philadelphia Phillies',
            'team_color' => '#e81827'
        ],
        
        [
            'id' => '22',
            'team_name' => 'Pittsburgh Pirates',
            'team_color' => '#be8a18'
        ],
        
        [
            'id' => '23',
            'team_name' => 'San Diego Padres',
            'team_color' => '#ffc426'
        ],
        
        [
            'id' => '24',
            'team_name' => 'San Fransisco Giants',
            'team_color' => '#fd5a1e'
        ],
        
        [
            'id' => '25',
            'team_name' => 'Seattle Mariners',
            'team_color' => '#019480'
        ],
        
        [
            'id' => '26',
            'team_name' => 'St.Louis Cardinals',
            'team_color' => '#c41e39'
        ],
        
        [
            'id' => '27',
            'team_name' => 'Tampa Bay Rays',
            'team_color' => '#082c5b'
        ],
        
        [
            'id' => '28',
            'team_name' => 'Texas Rangers',
            'team_color' => '#003277'
        ],
        
        [
            'id' => '29',
            'team_name' => 'Toronto Blue Jays',
            'team_color' => '#114a8e'
        ],
        
        [
            'id' => '30',
            'team_name' => 'Washington Nationals',
            'team_color' => '#aa0002'
        ]
        
        
        
    ]);
    }
}
