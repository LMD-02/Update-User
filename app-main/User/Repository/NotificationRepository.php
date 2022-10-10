<?php

namespace AppMain\User\Repository;



use AppMain\User\Models\UserNotification;

class NotificationRepository
{

    protected $noti;

    public function __construct(UserNotification $noti)
    {
        $this->noti = $noti;
    }
    public function findByUserId($userId)
    {
        return $this->noti->query()->where('user_id', $userId)->get();
    }
    public function update($id,$data){
        return $this->noti->find($id)->update($data);
    }
}
