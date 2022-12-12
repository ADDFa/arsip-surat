<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = ['id'];

    public function credential()
    {
        return $this->hasOne(Credential::class, 'user_id');
    }
}
