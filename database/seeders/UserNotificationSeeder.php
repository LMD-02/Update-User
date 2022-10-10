<?php

namespace Database\Seeders;

use AppMain\User\Models\UserNotification;
use AppMain\User\Models\UserSetting;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
//        $faker = Factory::create('vi_VN');
        $notification = ([
            "notification-like-listing" => false,
            "notification-email" => true,
            "notification-mobile-app" => false,
            "interested-all-noti" => true,
            "interested-email" => true,
            "interested-mobile-app" => false,
            "community-all-noti" => true,
            "community-new-post" => true,
            "community-recommended-group" => false,
            "community-email" => true,
            "community-mobile-app" => true,
            "all-noti" => false,
            "adverting-partners" => true,
            "email" => true,
            "mobile-app" => true,
            "sms" => false,
            "chat" => true,
        ]);
        $notification = json_encode($notification);
        for ($i = 1; $i <= 3; $i++) {
            $arr[] = [
                'user_id' => $i,
                'notification' => $notification
            ];

        }
        UserNotification::insert($arr);
    }
}
