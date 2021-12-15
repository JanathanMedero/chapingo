<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'image', 'subtitle', 'body', 'publish'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
