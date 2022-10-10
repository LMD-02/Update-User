<?php

namespace AppMain\User\Services;
use AppMain\User\Models\User;
use AppMain\User\Repository\NotificationRepository;
use AppMain\User\Repository\SettingRepository;
use AppMain\User\Repository\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;
use Workable\User\Http\Controllers\ResponseTrait;


class UserService
{
    use ResponseTrait;

    public function __construct(UserRepository $userRepository, SettingRepository $settingRepository, NotificationRepository $notificationRepository)
    {
        $this->userRepository = $userRepository;
        $this->settingRepository = $settingRepository;
        $this->notificationRepository = $notificationRepository;
    }

    public function getInfo()
    {
        $userId = 1;
        $info = $this->userRepository->findById($userId);
        $setting = $this->settingRepository->findByUserId($userId)->pluck('setting');
        $noti = $this->notificationRepository->findByUserId($userId)->pluck('notification');
        $info['setting'] = (array) json_decode($setting[0]);
        $info['notification'] =(array) json_decode($noti[0]);
        return view('user::index',[
            'user' => $info,
        ]);
    }

    public function updateProfile(Request $request) : JsonResponse
    {
        try{
            $image = $request->file('avatar');
            $data = $request->except(['avatar', 'user_id','_token']);
            $userId = 1;
            if($image){
                $files  = File::allFiles(public_path('/images/avatars/'));
                $avatarName = time().'.'.$userId.'.'.$image->getClientOriginalExtension();
                $data['avatar'] = $avatarName;
                $image->move(public_path('images/avatars'), $avatarName);
                foreach($files as $file){
                    $imgUid = explode( '.',$file->getFilename())[1];
                    if($imgUid == $userId && $file->getFilename !== $avatarName){
                        $path = $file->getPathname();
                        File::delete($path);
                    }
                }
            }
    //        $userId = $request->user_id;
            $this->userRepository->update($userId, $data);
            return $this->successResponse('','Update profile successfully');
        }
        catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function updatePassword(Request $request) : JsonResponse
    {
        $userId = 1;
        $user = $this->userRepository->findById($userId);
        if ((Hash::check($request->get('old_password'), $user->password))) {
            $data['password'] = Hash::make($request['new_password']);
            $this->userRepository->update($userId, $data);
            return $this->successResponse('','Password changed successfully');
        }
        return $this->errorResponse('Old password is incorrect', 400);
    }

    public function updateNotification(Request $request) : JsonResponse {
        $userId = 1;
        $name = $request->get('name');
        $value = $request->get('value');
        $value  =  $value == 'true' ? true : false;

        $noti = $this->notificationRepository->findByUserId($userId)->pluck('notification','id');
        $id = $noti->keys()[0];
        $listNoti = ((array) json_decode($noti->values()[0]));
        $listNoti[$name] = $value;
        $data['notification'] = json_encode($listNoti);
        $this->notificationRepository->update($id, $data);
        return $this->successResponse('','Update setting successfully');
    }

    public function updateSetting(Request $request) : JsonResponse {
        $userId = 1;
        $name = $request->get('name');
        $value = $request->get('value');
        $value  =  $value == 'true' ? true : false;
        $setting = $this->settingRepository->findByUserId($userId)->pluck('setting','id');
        $id = $setting->keys()[0];
        $listSetting = ((array) json_decode($setting->values()[0]));
        $listSetting[$name] = $value;
        $data['setting'] = json_encode($listSetting);
        $this->settingRepository->update($id, $data);
        return $this->successResponse('','Update setting successfully');
    }
}

