<?php

namespace AppMain\User\Repository;



use AppMain\User\Models\User;

class UserRepository
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function findById($id)
    {
        return $this->user->query()->find($id);
    }
    public function update($id, $data)
    {
        return $this->user->query()->where('id', $id)->update($data);
    }

}
