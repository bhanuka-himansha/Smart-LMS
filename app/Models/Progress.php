<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'student_id',
        'progress',
        'started_at',
        'ended_at',
        'status',
    ];

    protected $dates = [
        'started_at',
        'ended_at'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
