<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function permissionCan($permission)
    {
        $user_id = Auth::user()->id;
        $permission = Permission::where('name', $permission)->first();
        if ($permission === null) {
            return false;
        }

        $user_permission = UserPermission::where('user_id', $user_id)->where('permission_id', $permission->id)->first();
        return $user_permission !== null;
    }

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'status',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function grfs()
    {
        return $this->hasMany(Grf::class);
    }
    public function grfInbound()
    {
        return $this->hasMany(GrfInbound::class);
    }
    public function requester()
    {
        return $this->hasMany(Request::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
