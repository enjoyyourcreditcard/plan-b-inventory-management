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
        $user = $this->user->with('warehouse')->get();
        return $user;
    }

    public function handleStoreUser($request)
    {
        $data = $request->validate([
            'name' => 'required',
            'regional' => 'required',
            'warehouse_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'nik' => '',
            'no_telp' => 'required',
            'status' => '',
        ]);

        $data['status'] = 'active';

        $user = $this->user->create($data);
        return ($user);
    }

    public function handleUpdateUser($request)
    {
        $data = $this->user->find($request->id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'regional' => $request->regional,
            'warehouse_id' => $request->warehouse_id,
            'nik' => $request->nik,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
        ]);

        // return ('Data user has been updated');
        return ($data);
    }

    public function handleStatus($id)
    {
        $user = $this->user->find($id);
        if ($user->status == 'active') {
            $user->status = 'deactive';
            $user->save();
            return $user;
        } else {
            $user->status = 'active';
            $user->save();
            return $user;
        }
    }

}
