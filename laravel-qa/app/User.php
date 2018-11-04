<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // DB RELATIONS

    // one to many
    public function questions(){
        return $this->hasMany(Question::class);
    }

    // one to many
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    // many to many
    public function favourites(){
        return $this->belongsToMany(Question::class, 'favourites')->withTimestamps();
    }

    // many to many polymorphic

    public function voteQuestions(){
        return $this->morphedByMany(Question::class, 'votable');
    }

     public function voteAnswers(){
        return $this->morphedByMany(Answer::class, 'votable');
    }

    // END DB RELATIONS

    // GETTERS

    public function getUrlAttribute(){
        //return route('users.show', $this->id);
        return '#';
    }

    public function getAvatarAttribute(){
        $email = $this->email;
        $default = "https://ui-avatars.com/api/" . $this->name . '/40';
        $size = 40;

        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;;
    }
    // END GETTERS

    public function voteQuestion(Question $question, $vote){
        $voteQuestions = $this->voteQuestions();

        $this->_vote($voteQuestions, $question, $vote); 
    }

    public function voteAnswer(Answer $answer, $vote){
        $voteAnswers = $this->voteAnswers();

        $this->_vote($voteAnswers, $answer, $vote);   
    }

    private function _vote($relationship, $model, $vote){
        if($relationship->where('votable_id', $model->id)->exists()){
            $relationship->updateExistingPivot($model, ['vote' => $vote]);
        }else{
            $relationship->attach($model, ['vote' => $vote]);
        }

        $model->load('votes');
        $upVotes = (int)$model->upVotes()->sum('vote');
        $downVotes = (int)$model->downVotes()->sum('vote');

        $model->votes_count = $upVotes + $downVotes;

        $model->save();
    }
}
