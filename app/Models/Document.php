<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'documents', 'department_id'];

    protected $casts = [
        'documents' => 'array',
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
