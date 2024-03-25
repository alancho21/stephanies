<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->morphedToMany(User::class, 'imageable');
        //morphTo significa  "transformado a"
    }

    public function imageable(){
        return $this->morphTo();
    }
}
