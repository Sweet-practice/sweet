<?php

use Illuminate\Database\Seeder;
use App\Order;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 11; $i++){
        DB::table('orders')->insert([
        'user_id' => $i,
        'status' => '1',
        'postage' => '540',
        'total_price' => '990'.$i,
        'total_point' => '100',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        ]);
      }
    }
}
