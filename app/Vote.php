<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Vote extends Model
{
    protected $events = [
        'created' => Vote::class,
        'updated' => Vote::class
    ];
    protected $fillable = [
        'user_id',
        'answer_id',
        'question_id',
        'vote'
    ];
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function answer() {
        return $this->belongsTo('App\Answer');
    }

    public static function vote($user_id, $id, $vote, $column) {
        $voted = Vote::where('user_id', $user_id)->where($column, $id)->first();
        if (isset($voted->vote) && $voted->vote == $vote)  {
            Vote::destroy($voted->id);
            $ajax_response = array('status' => 'success','msg' => "Vote nullified on $column $id");
        } else {
            Vote::updateOrCreate([$column => $id,'user_id' => $user_id],['vote' => $vote]);
            $ajax_response = array('status' => 'success','msg' => "Vote cast on $column $id");
        }
        return $ajax_response;
    }
}

