<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserNotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'notification' => [
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
            ],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
