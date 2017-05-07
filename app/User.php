<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','cedula','telefono','email', 'password', 'tipo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function solicituds()
    {
        return $this->hasMany('App\Models\solicitud');
    }

    public function contratos()
    {
        return $this->hasMany('App\Models\contrato');
    }

    public static $rules = [
        'email' => 'required',
    ];

    public function admin()
    {
        return $this->type === "Admin";
    }

    public function vendedor()
    {
        return $this->type === "Vendedor";
    }

    public function cobrador()
    {
        return $this->type === "Cobrador";
    }
}
