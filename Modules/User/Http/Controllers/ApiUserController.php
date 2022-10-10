<?php

namespace Workable\User\Http\Controllers;


use App\Http\Controllers\Controller;
use AppMain\User\Services\UserService;
use Workable\User\Http\Requests\UpdateNotificationRequest;
use Workable\User\Http\Requests\UpdatePasswordRequest;
use Workable\User\Http\Requests\UpdateProfileRequest;
use Workable\User\Http\Requests\UpdateSettingRequest;


class ApiUserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function updateProfile(UpdateProfileRequest $request){
         return  $this->userService->updateProfile($request);
    }
    public function updatePassword(UpdatePasswordRequest $request){
        return  $this->userService->updatePassword($request);
    }
    public function updateNotification(UpdateNotificationRequest $request){
        return $this->userService->updateNotification($request);
    }
    public function updateSetting(UpdateSettingRequest $request){
        return $this->userService->updateSetting($request);
    }

}
