<?php

namespace AppMain\User\Services;
use AppMain\User\Repository\NotificationRepository;
use AppMain\User\Repository\SettingRepository;
use Illuminate\Http\Request;


class SettingService
{
    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
    }

}

