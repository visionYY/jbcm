<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dx_order')->insert([
            'title' => str_random(10),
            'user_id' => rand(1,10000),
            'couser_id' => rand(1,100),
            'price' => rand(99,9999),
            'status' => rand(0,1),
            'pay_time' => date('Y-m-d H:i:s',time()),
        ]);
    }
}
