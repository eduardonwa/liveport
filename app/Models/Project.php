<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description', 
        'display_date',
        'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}