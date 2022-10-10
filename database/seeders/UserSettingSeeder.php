<?php

namespace Database\Seeders;

use AppMain\User\Models\UserSetting;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
        $setting = ([
                    "privacy-interested" => false,
                    "privacy-location" => true,
                    "privacy-demographic" => false,
                    "advertising-interested" => true,
                    "survey-participate" => false,
                ]);

        for ($i = 1; $i <= 3; $i++) {
            $arr[] = [
                'user_id' => $i,
                'setting' => json_encode($setting),
            ];

        }
        UserSetting::insert($arr);
    }
}
