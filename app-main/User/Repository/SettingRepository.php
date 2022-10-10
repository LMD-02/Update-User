<?php

namespace AppMain\User\Repository;



use AppMain\User\Models\User;
use AppMain\User\Models\UserSetting;

class SettingRepository
{

    protected $setting;

    public function __construct(UserSetting $setting)
    {
        $this->setting = $setting;
    }
    public function findByUserId($userId)
    {
        return $this->setting->query()->where('user_id', $userId)->get();
    }
    public function update($id,$data){
        return $this->setting->find($id)->update($data);
    }
}
