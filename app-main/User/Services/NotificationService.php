<?php

namespace AppMain\User\Services;
use AppMain\User\Repository\NotificationRepository;
use Illuminate\Http\Request;


class NotificationService
{
    public function __construct(NotificationRepository $noti)
    {
        $this->noti = $noti;
    }

}

