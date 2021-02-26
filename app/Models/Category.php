<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function series()
    {
        return $this->belongsToMany(Serie::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->as('category_user')
        ->withTimestamps();
    }
}
