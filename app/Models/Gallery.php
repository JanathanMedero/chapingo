<?php

namespace App\Models;

use App\Models\Notice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['notice_id', 'image'];

    public $timestamps = false;

    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }

}
