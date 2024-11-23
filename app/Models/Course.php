<?php

namespace App\Models;

use App\Helpers\CoreHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $casts = [
        'thumbnails' => 'array',
        'video' => 'array',
        'objectives' => 'array',
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function progresses()
    {
        return $this->belongsToMany(Progress::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id')->withPivot('status')->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

    public function scopeNotEnrolled($query, $user = null)
    {
        if ($user) {
            return $query->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }
    }

    public function zoomMeetings()
    {
        return $this->hasMany(ZoomMeeting::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rating()
    {
        return CoreHelper::ratingFinder($this->id);
    }
}
