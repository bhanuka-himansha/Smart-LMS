<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomMeeting extends Model
{
    use HasFactory;

    // Fillable Properties
    protected $fillable = [
        'course_id',
        'zoom_meeting_title',
        'zoom_meeting_id',
        'zoom_meeting_url',
        'zoom_meeting_password',
        'start_time',
    ];

    // Relationships
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
