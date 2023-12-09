<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frameworks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'year',
    ];

    public function userFrameworks()
    {
        return $this->belongsTo(User::class);
    }
}
