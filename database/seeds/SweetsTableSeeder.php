<?php

use Illuminate\Database\Seeder;
use App\Sweet;
use Faker\Factory as Faker;

class SweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 11; $i++){
        DB::table('sweets')->insert([
          'name' => 'パピコ'.$i,
          'category_id' => '1',
          'stock' => '20',
          'point' => '20',
          'status' => '1',
          'introduction' => 'アイスです。aisudesu.',
          'price' => '200',
          'allergy' => 'アレルギー',
          'path' => 'path',
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
        ]);
      }
    }
}
