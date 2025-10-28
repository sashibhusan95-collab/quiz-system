<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function scopeWithQuiz($query){
        return $query->join('quizzes','records.quiz_id','=','quizzes.id')
        ->select('quizzes.*','records.*');
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
