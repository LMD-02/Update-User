<?php

namespace Database\Seeders;

use AppMain\User\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
        $faker = Factory::create();
//        $faker = Factory::create('vi_VN');
        for ($i = 1; $i <= 3; $i++) {
            $arr[] = [
                'username' => $faker->unique()->userName,
                'password' => bcrypt('password'.$i),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => '0123456'. rand(0,9) . rand(0, 9) . rand(0, 9),
                'avatar' => $faker->imageUrl(640, 480, 'people'),
                'gender' => rand(0, 3),
                'birthday' => $faker->date(),
                'country' => $faker->country,
                'region' => $faker->state,
                'city' => $faker->city,
                'bio' => $faker->text(200),
            ];

        }
        User::insert($arr);
    }
}
