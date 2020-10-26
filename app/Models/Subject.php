<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function notes()
    {
        return $this->hasMany(Note::class, 'subject_id');
    }
}
