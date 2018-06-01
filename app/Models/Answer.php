<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id','votes_count', 'question_id','body'];

    public function questions()
    {
        return $this->belongsTo(Question::class)->withTimestamps();
        //return $this->belongsToMany(Topic::class)->withTimestamps();
    }
}
