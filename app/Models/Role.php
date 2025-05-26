<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // Relasi ke users (optional)
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
