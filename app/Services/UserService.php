<?php

namespace App\Services;


use App\Models\User;

class UserService
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function handleAllUserApi($req)
    {
        $user = $this->user->all();
        return $user;
    }

    public function handleDeactive($id)
    {
        $user = $this->user->find($id);
        $user->status = 'deactive';
        $user->save();
        return "oke";
    }

}
