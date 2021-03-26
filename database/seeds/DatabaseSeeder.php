<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SweetsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(PointsTableSeeder::class);
    }
}
