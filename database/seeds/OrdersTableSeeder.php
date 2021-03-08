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
        DB::table('orders')->insert([
        'user_id' => '1',
        'sweet_id' => '1',
        'status' => '1',
        'postage' => '540',
        'total_price' => '990',
        ]);
    }
}
