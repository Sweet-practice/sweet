<?php

use Illuminate\Database\Seeder;
use App\OrderDetails;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 11; $i++){
        DB::table('order_details')->insert([
        'order_id' => $i,
        'sweet_id' => $i,
        'sweet_name' => 'お菓子'.$i,
        'amout' => '1',
        'price' => '56'.$i,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        ]);
      }
    }
}
