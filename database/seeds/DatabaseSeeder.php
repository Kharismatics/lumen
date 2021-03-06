<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->freeEmail,
                'phone' => $faker->e164PhoneNumber,
                'address' => $faker->address,
                'password' => DB::raw('md5("admin")'),
                // 'api_token' => DB::raw('md5("admin")'),
                'api_token' => base64_encode(Str::random(40)),
                'created_at' => Carbon::now(),  
                'created_by' => 1,              
            ]);
        }

        DB::table('categories')->insert([
            [
                'name' => 'bag',
                'description' => 'bag',
                'created_at' => Carbon::now(),
                'created_by' => 1,
            ],
            [
                'name' => 'wallet',
                'description' => 'wallet',
                'created_at' => Carbon::now(),
                'created_by' => 1,
            ],
        ]);
        
        foreach (range(1, 10) as $index) {
            DB::table('products')->insert(
                [
                    'name' => $faker->countryCode, 
                    'category_id' => $faker->numberBetween($min = 1, $max = 2),
                    'unique_code' => $faker->shuffle('123456abc'),
                    'base_price' => $faker->numberBetween($min = 50000, $max =100000),
                    'price' => $faker->numberBetween($min = 150000, $max =200000),
                    'description' => 'tes',
                    'created_at' => Carbon::now(),
                    'created_by' => 1,
                ]
            );
        }

        foreach (range(1, 50) as $index) {
            DB::table('stocks')->insert(
                [
                    'product_id' => $faker->numberBetween($min = 1, $max = 10),
                    'quantity' => $faker->numberBetween($min = 1, $max = 5),
                    'in_out' => $faker->numberBetween($min = 1, $max = 2),
                    'created_at' => "".$faker->numberBetween($min = 2018, $max = 2018)."-".$faker->month($max = 'now')."-".$faker->numberBetween($min = 1, $max = 28),
                    'created_by' => 1,
                ]
            );
        }

        foreach (range(1, 250) as $index) {
            DB::table('transactions')->insert(
                [
                    'product_id' => $faker->numberBetween($min = 1, $max = 10),
                    'user_id' => $faker->numberBetween($min = 1, $max = 10),
                    // 'transaction_date' => "".$faker->numberBetween($min = 2018, $max = 2020)."-".$faker->month($max = 'now')."-01",
                    'transaction_date' => "".$faker->numberBetween($min = 2018, $max = 2020)."-".$faker->month($max = 'now')."-".$faker->numberBetween($min = 1, $max = 28),
                    'quantity' => $faker->numberBetween($min = 1, $max = 3),
                    'discount' => $faker->numberBetween($min = 2000, $max = 3000),
                    'shipping_cost' => $faker->numberBetween($min = 5000, $max = 30000),
                    'description' => 1,
                    'remark' => 1,
                    'transaction_status' => $faker->numberBetween($min = 1, $max = 3),
                    'created_at' => Carbon::now(),
                    'created_by' => 1,
                ]
            );
        }
    }
}
