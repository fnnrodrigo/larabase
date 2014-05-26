<?php

class Feedback extends \Eloquent {

    protected $fillable = ['full_name','email', 'topic', 'message_body'];

    // The DB table for this model is explicitly set, by default Elequonet would assume the DB table would be 'feedbacks' (plural)
    protected $table = 'feedback';

    public static $rules = [
        'full_name' => 'required|min:3',
        'message_body' => 'required|min:10',
        'topic' => 'required|min:3',
        'email' => 'required|email',
    ];

    public static function validate($data){
        return Validator::make($data, static::$rules);
    }


}