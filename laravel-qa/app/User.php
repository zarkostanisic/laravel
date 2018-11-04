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

        if($voteQuestions->where('votable_id', $question->id)->exists()){
            $voteQuestions->updateExistingPivot($question, ['vote' => $vote]);
        }else{
            $voteQuestions->attach($question, ['vote' => $vote]);
        }

        $question->load('votes');
        $upVotes = (int)$question->upVotes()->sum('vote');
        $downVotes = (int)$question->downVotes()->sum('vote');

        $question->votes_count = $upVotes + $downVotes;

        $question->save();
    }

    public function voteAnswer(Answer $answer, $vote){
        $voteAnswers = $this->voteAnswers();

        if($voteAnswers->where('votable_id', $answer->id)->exists()){
            $voteAnswers->updateExistingPivot($answer, ['vote' => $vote]);
        }else{
            $voteAnswers->attach($answer, ['vote' => $vote]);
        }

        $answer->load('votes');
        $upVotes = (int)$answer->upVotes()->sum('vote');
        $downVotes = (int)$answer->downVotes()->sum('vote');

        $answer->votes_count = $upVotes + $downVotes;

        $answer->save();
    }
}
