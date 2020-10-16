<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'subject_id', 'title', 'slug', 'description'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
