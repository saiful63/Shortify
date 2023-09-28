<?php

namespace Database\Seeders;

use App\Models\UrlShrotner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrlShrotnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url_data = [
          [
            'user_id'=>1,
            'count'=>1,
            'url'=>'https://www.google.com/',
            'code'=>'asfg'
          ],
          [
            'user_id'=>2,
            'count'=>2,
            'url'=>'https://www.amazon.com/',
            'code'=>'krt'
          ],
          [
            'user_id'=>3,
            'count'=>1,
            'url'=>'https://www.facebook.com/',
            'code'=>'dgr'
          ],
        ];

        foreach($url_data as $data){
            UrlShrotner::create($data);
        }
    }
}
