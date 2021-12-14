<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowsUsers extends Model
{
    protected $fillable = ['user_id', 'following_id'];

    use HasFactory;
}
