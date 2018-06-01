<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body','user_id'];
    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class)->withTimestamps();
    }
}
