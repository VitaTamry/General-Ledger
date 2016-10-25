<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($role)
    {
       if($this->role()->where('name',$role)->first()){
        return true;
       }
    }

    public function updateRole($role_id,$user_id)
    {
        var_dump(User::where('id', $id)->update(array('role_id' => '$role_id')));

        

    }



    public function invoices()
    {
        return $this->hasMany('App\Invoice','user_id','id');
    }
      public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
