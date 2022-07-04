<?php

namespace App\Models;

use App\Models\Motion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    public function motions(){
        return $this->hasMany(Motion::class);
    }
}
