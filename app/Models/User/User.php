<?php

namespace App\Models\User;

/**
 * Description of User
 *
 * @author james
 */
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable {
    use AuthenticatableTrait;
    
    protected $fillable = ['firstName', 'surname', 'email', 'avatar', 'password'];
    
    protected $hidden = ['password', 'remember_token', 'api_token'];
    
    public function todo()
    {
       return hasMany('App\Models\Todo|Todo');
    }

    public function getAuthIdentifier() {
        
    }

    public function getAuthIdentifierName() {
        
    }

    public function getAuthPassword() {
        
    }

    public function getRememberToken() {
        
    }

    public function getRememberTokenName() {
        
    }

    public function setRememberToken($value) {
        
    }

}
