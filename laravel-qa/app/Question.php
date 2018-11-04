<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model 
{
    use VotableTrait;
    
	protected $fillable = [
		'title',
		'body'
	];

    // RELATIONS

    // one to one
    public function user(){
    	return $this->belongsTo(User::class);
    }

    // one to many
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    //many to many
    public function favourites(){
        return $this->belongsToMany(User::class, 'favourites')->withTimestamps();
    }

    // END RELATIONS

    // SETTERS
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
    // END SETTERS

    // GETTERS
    public function getUrlAttribute(){
    	return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute(){
    	return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute(){
    	if($this->answers_count > 0){
    		if($this->best_answer_id) {
    			return 'answer_accepted';
    		}

			return 'answered';
		}

		return 'unanswered';
    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    public function acceptBestAnswer(Answer $answer){
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function isFavourited(){
     return $this->favourites()->where('user_id', auth()->id())->count() > 0;
    }

    public function getIsFavouritedAttribute(){
        return $this->isFavourited();
    }

    public function getFavouritesCountAttribute(){
        return $this->favourites()->count();
    }
    // END GETTERS

}
