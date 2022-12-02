<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handleAllUserApi($req)
    {
        $user = $this->user->with('warehouse', 'vendor')->get();
        return $user;
    }

    public function handleGetUser($id)
    {
        $data = $this->user->find($id);
        return $data;
    }

    public function handleStoreUser($request)
    {
        $data = $request->validate([
            'name' => 'required',
            'regional' => 'required',
            'warehouse_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'pin' => 'required|numeric|min_digits:4|max_digits:4',
            'role' => 'required',
            'nik' => '',
            'no_telp' => 'required',
            'status' => '',
            'vendor_id' => '',
            'is_vendor' => '',
        ]);

        $data['password'] = Hash::make($request->password);
        if ($request->is_vendor != null) {
            $data['is_vendor'] = 1;
            $data['vendor_id'] = $request->vendor_id;
        } else {
            $data['is_vendor'] = 0;
            $data['vendor_id'] = null;
        }

        $data['status'] = 'active';

        $user = $this->user->create($data);
        return ($user);
    }

    public function handleUpdateUser($request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'regional' => 'required',
            'warehouse_id' => 'required',
            'email' => 'required',
            'pin' => 'required|numeric|min_digits:4|max_digits:4',
            'role' => 'required',
            'nik' => '',
            'no_telp' => 'required',
            'status' => '',
            'vendor_id' => '',
            'is_vendor' => '',
        ]);

        // $data = $this->user->find($request->id)->update([
        //     'name' => $request->name,
        //     'regional' => $request->regional,
        //     'warehouse_id' => $request->warehouse_id,
        //     'email' => $request->email,
        //     'role' => $request->role,
        //     'nik' => $request->nik,
        //     'no_telp' => $request->no_telp,
        //     'vendor_id' => $request->vendor_id,
        //     'password' => $request->password,
        //     'pin' => $request->pin,
        // ]);

        $data = $this->user->find($request->id)->update($validatedData);

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
