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
            'team_jpname' => 'ダイヤモンドバックス',
            'team_color' => '#a71930'
        ],
        
        [
            'id' => '2',
            'team_name' => 'Atlanta Braves',
            'team_jpname' => 'ブレーブス',
            'team_color' => '#0b233f'
        ],
        
        [
            'id' => '3',
            'team_name' => 'Baltimore Orioles',
            'team_jpname' => 'オリオールズ',
            'team_color' => '#df4500'
        ],
        
        [
            'id' => '4',
            'team_name' => 'Boston Red Sox',
            'team_jpname' => 'レッドソックス',
            'team_color' => '#c50d33'
        ],
        
        [
            'id' => '5',
            'team_name' => 'Chicago Cubs',
            'team_jpname' => 'カブス',
            'team_color' => '#0d3386'
        ],
        
        [
            'id' => '6',
            'team_name' => 'Chicago White Sox',
            'team_jpname' => 'ホワイトソックス',
            'team_color' => '#000000'
        ],
        
        [
            'id' => '7',
            'team_name' => 'Cinicinnati Reds',
            'team_jpname' => 'レッズ',
            'team_color' => '#c6001f'
        ],
        
        [
            'id' => '8',
            'team_name' => 'Cleveland Guardians',
            'team_jpname' => 'ガーディアンズ',
            'team_color' => '#19375e'
        ],
        
        [
            'id' => '9',
            'team_name' => 'Colorado Rockies',
            'team_jpname' => 'ロッキーズ',
            'team_color' => '#33006f'
        ],
        
        [
            'id' => '10',
            'team_name' => 'Detroit Tigers',
            'team_jpname' => 'タイガース',
            'team_color' => '#0c2c56'
        ],
        
        [
            'id' => '11',
            'team_name' => 'Houston Astros',
            'team_jpname' => 'アストロズ',
            'team_color' => '#f4720e'
        ],
        
        [
            'id' => '12',
            'team_name' => 'Kansas City Royals',
            'team_jpname' => 'ロイヤルズ',
            'team_color' => '#004586'
        ],
        
        [
            'id' => '13',
            'team_name' => 'Los Angeles Angels',
            'team_jpname' => 'エンゼルス',
            'team_color' => '#ba0021'
        ],
        
        [
            'id' => '14',
            'team_name' => 'Los Angeles Dogers',
            'team_jpname' => 'ドジャース',
            'team_color' => '#00599c'
        ],
        
        [
            'id' => '15',
            'team_name' => 'Miami Marlins',
            'team_jpname' => 'マーリンズ',
            'team_color' => '#1094c8'
        ],
        
        [
            'id' => '16',
            'team_name' => 'Milwaukee Brewers',
            'team_jpname' => 'ブリュワーズ',
            'team_color' => '#10284b'
        ],
        
        [
            'id' => '17',
            'team_name' => 'Minnesota Twins',
            'team_jpname' => 'ツインズ',
            'team_color' => '#002b5b'
        ],
        
        [
            'id' => '18',
            'team_name' => 'New York Mets',
            'team_jpname' => 'メッツ',
            'team_color' => '#ff590e'
        ],
        
        [
            'id' => '19',
            'team_name' => 'New York Yankees',
            'team_jpname' => 'ヤンキース',
            'team_color' => '#122347'
        ],
        
        [
            'id' => '20',
            'team_name' => 'Oakland Athletics',
            'team_jpname' => 'アスレチックス',
            'team_color' => '#003831'
        ],
        
        [
            'id' => '21',
            'team_name' => 'Philadelphia Phillies',
            'team_jpname' => 'フィリーズ',
            'team_color' => '#e81827'
        ],
        
        [
            'id' => '22',
            'team_name' => 'Pittsburgh Pirates',
            'team_jpname' => 'パイレーツ',
            'team_color' => '#be8a18'
        ],
        
        [
            'id' => '23',
            'team_name' => 'San Diego Padres',
            'team_jpname' => 'パドレス',
            'team_color' => '#a98f40'
        ],
        
        [
            'id' => '24',
            'team_name' => 'San Fransisco Giants',
            'team_jpname' => 'ジャイアンツ',
            'team_color' => '#fd5a1e'
        ],
        
        [
            'id' => '25',
            'team_name' => 'Seattle Mariners',
            'team_jpname' => 'マリナーズ',
            'team_color' => '#019480'
        ],
        
        [
            'id' => '26',
            'team_name' => 'St.Louis Cardinals',
            'team_jpname' => 'カージナルス',
            'team_color' => '#c41e39'
        ],
        
        [
            'id' => '27',
            'team_name' => 'Tampa Bay Rays',
            'team_jpname' => 'レイズ',
            'team_color' => '#082c5b'
        ],
        
        [
            'id' => '28',
            'team_name' => 'Texas Rangers',
            'team_jpname' => 'レンジャーズ',
            'team_color' => '#003277'
        ],
        
        [
            'id' => '29',
            'team_name' => 'Toronto Blue Jays',
            'team_jpname' => 'ブルージェイズ',
            'team_color' => '#114a8e'
        ],
        
        [
            'id' => '30',
            'team_name' => 'Washington Nationals',
            'team_jpname' => 'ナショナルズ',
            'team_color' => '#aa0002'
        ]
        
        
        
    ]);
    }
}
