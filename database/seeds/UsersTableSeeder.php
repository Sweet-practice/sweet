<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'id' => '1',
        'name' => 'あ',
        'birth' => '2000-01-01',
        'email' => 'email@co.jp',
        'address' => '神奈川県',
        'delete_flug' => '2',
        'password' => bcrypt('test1234'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        ]);

        factory(User::class, 10)->create();
    }
}
