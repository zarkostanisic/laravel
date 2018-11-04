<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use VotableTrait;

    protected $fillable = [
        'body',
        'user_id'
    ];

    // RELATIONS

    // one to one
    public function user(){
    	return $this->belongsTo(User::class);
    }

    // one to one
    public function question(){
    	return $this->belongsTo(Question::class);
    }

    // END RELATIONS

    // GETTERS
    public function getCreatedDateAttribute(){
    	return $this->created_at->diffForHumans();
    }

    public function getBodyHtmlAttribute(){
        return clean(\Parsedown::instance()->text($this->body));    }

    public function getStatusAttribute(){
        return $this->id == $this->question->best_answer_id ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute(){
        return $this->isBest();
    }

    public function isBest(){
        return $this->id == $this->question->best_answer_id;
    }

    // END GETTERS

    public static function boot(){
    	parent::boot();

    	static::created(function($answer){
    		$answer->question->increment('answers_count');
    		$answer->question->save();
    	});

        static::deleted(function($answer){
            $question = $answer->question;

            $question->decrement('answers_count');

            // if($question->best_answer_id == $answer->id) {
            //     $question->best_answer_id = NULL;
            // }

            $question->save();
        });

    	// static::saved(function($answer){
    	// 	echo 'Answer saved\n';
    	// });
    }
}
