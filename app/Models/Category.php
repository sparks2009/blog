<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Category extends Model
{
    use HasFactory;

    public function posts(){

        return $this->hasMany(Post::class);
    }

}
