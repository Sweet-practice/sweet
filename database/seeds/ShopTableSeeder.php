<?php

use Illuminate\Database\Seeder;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'id' => '1',
            'name' => 'お菓子',
            'address' => '神奈川県',
            'email' => 'email.shop@co.jp',
            'password' => bcrypt('shop1234'),
            'open_time' => '12:00',
            'close_time' => '18:00',
            'holiday' => '火曜日',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }
}
