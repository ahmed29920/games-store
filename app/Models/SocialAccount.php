<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class SocialAccount extends Model
{
    use HasFactory;

    protected $fillable = ['provider_name' , 'provider_id'];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
