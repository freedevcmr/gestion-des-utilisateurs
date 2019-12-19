<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //un role appartient a plusieurs utilisateurs
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
