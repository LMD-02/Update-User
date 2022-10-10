<?php

namespace Workable\User\Http\Controllers;


use App\Http\Controllers\Controller;
use AppMain\User\Services\NotificationService;
use AppMain\User\Services\UserService;
use Illuminate\Http\Request;
use Workable\User\Http\Requests\UpdateProfileRequest;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(){
        return $this->userService->getInfo();
    }

}
