<?php

use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 5; $i++){
        DB::table('rooms')->insert([
          'user_id' => $i,
          'shop_id' => '1',
        ]);
      }
    }
}
